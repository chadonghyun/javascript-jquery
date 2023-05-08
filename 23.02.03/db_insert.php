<?php
$name = $_POST['name'];
$num = $_POST['num'];
$sms = $_POST['sms'];
$email = $_POST['email'];
$region = $_POST['region'];
$car = $_POST['car'];
$own_car = $_POST['own_car'];
$datetime = $_POST['datetime'];


$mysql_host = 'localhost';
$mysql_user = 'kcdh29';
$mysql_password = 'ckzkckzk2457#';
$mysql_db = 'kcdh29';



$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if(!$conn){
  die('연결실패:'.mysqli_connet_error());
}
$query = "INSERT INTO test_drive VALUES (0, '$name', '$num', '$sms', '$email', '$region', '$car', '$own_car', '$datetime')";

$result = mysqli_query($conn, $query);//조회결과값을 변수에 담는다.

if($result)
echo '입력완료';
else {
  echo '입력 ㄴㄴ';
  echo $query;
}
?>