
<?php



$state_population['CA'] = 343434;
$state_population['WY'] = 25252525;
$state_population['TR'] = 363636;

ksort ($state_population);

foreach ($state_population as $state => $population){

$population = number_format ($population);
echo "$state: $population.<br>";
$n = count($state_population);
echo $n;





}
?>