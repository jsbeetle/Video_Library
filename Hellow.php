<?php 
 include("bd.php"); 

if (isset($_GET["id"])){                            
/*id-����� ��� ������ � ���� ������ */
  $id = $_GET["id"];
   /*��������� �������� ��  ���������� ������ */
   if  (!preg_match("|^[\d]+$|",$id)){
   exit("<p>��  ������ ������ �������! ��������� URL!</p>");
   }
}

if (isset($id)){
/*������ ������� �� ���� ������ � ������ �����*/
$result=mysql_query("SELECT count,url FROM download
WHERE id='$id'",$db);
 

  if (!$result){
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ����
��������������<br> <strong>��� ������:</strong></p>";
exit(mysql_error());
}
 

  /*���� ���������� � ����� ������� � ����� ������, ����������� �*/
if (mysql_num_rows($result) > 0){

/*��������� �������������� ��� ��� ������������� ������*/
$myrow=mysql_fetch_array($result);
/* �������� �� ���� ������ url-����� ����� */
$link = $myrow["url"];
/*�������� �� ���� ������ ����� ���������� ������� � ���������� �
����� ����� �������*/
$count = $myrow["count"] + 1;
/*��������� ���������� � ���� ������*/
$update = mysql_query("UPDATE download SET  count='$count'
WHERE id='$id'",$db);

  /* ������� �� ������ ��� ���������� */
echo "<html><head><meta http-equiv='Refresh' content='0;
URL=$link'></head></html>";
exit();
}
else {
echo "<p>���������� �� ������� �� ����� ���� ���������.
� ������� ��� ������ ��� ����������!</p>";
exit();
}
}
else {
echo "�� �� ������� ���� ��� ����������";
}
 

?>