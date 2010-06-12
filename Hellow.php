<?php 
 include("bd.php"); 

if (isset($_GET["id"])){                            
/*id-файла или ссылки в базе данных */
  $id = $_GET["id"];
   /*Проверяем является ли  переменная числом */
   if  (!preg_match("|^[\d]+$|",$id)){
   exit("<p>Не  верный формат запроса! Проверьте URL!</p>");
   }
}

if (isset($id)){
/*Делаем выборку из базы данных о нужном файле*/
$result=mysql_query("SELECT count,url FROM download
WHERE id='$id'",$db);
 

  if (!$result){
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом
администратору<br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}
 

  /*Если информация о файле имеется в базее данных, вытаскиваем её*/
if (mysql_num_rows($result) > 0){

/*извлекает результирующий ряд как ассоциативный массив*/
$myrow=mysql_fetch_array($result);
/* Получаем из базы данных url-адрес файла */
$link = $myrow["url"];
/*Получаем из базы данных общее количество закачек и прибавляем к
этому числу единицу*/
$count = $myrow["count"] + 1;
/*Обновляем информацию в базе данных*/
$update = mysql_query("UPDATE download SET  count='$count'
WHERE id='$id'",$db);

  /* Переход по ссылке для скачивания */
echo "<html><head><meta http-equiv='Refresh' content='0;
URL=$link'></head></html>";
exit();
}
else {
echo "<p>Информация по запросу не может быть извлечена.
В таблице нет файлов для скачивания!</p>";
exit();
}
}
else {
echo "Вы не выбрали файл для скачивания";
}
 

?>