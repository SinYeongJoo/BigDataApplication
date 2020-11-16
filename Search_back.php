<?php
session_start();
$prevPage = $_SERVER['HTTP_REFERER'];   // prevPage 변수에 이전 페이지 변수를 저장함
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='1234';
$mysql_db='cafe';
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");

$cafe_id = $_POST['cafe_id'];
$query="select * from rating where cafe_id = '$cafe_id'";
$result=mysqli_query($mysqli,$query);
$row=mysqli_fetch_array($result);
$rating_num = $row['rating_num'];
$rating_sum = $row['rating_sum'];
$rating_one = $row['rating_one'];
$rating_two = $row['rating_two'];
$rating_three = $row['rating_three'];
$rating_four = $row['rating_four'];
$rating_five = $row['rating_five'];

if($_POST['star_value'] == 1){
    $rating_num = $rating_num + 1; 
    $rating_sum = $rating_sum + 1; 
    $rating_one = $rating_one + 1;
}elseif($_POST['star_value'] == 2){
    $rating_num = $rating_num + 1; 
    $rating_sum = $rating_sum + 2; 
    $rating_two = $rating_two + 1;
}elseif($_POST['star_value'] == 3){
    $rating_num = $rating_num + 1; 
    $rating_sum = $rating_sum + 3; 
    $rating_three = $rating_three + 1;
}elseif($_POST['star_value'] == 4){
    $rating_num = $rating_num + 1; 
    $rating_sum = $rating_sum + 4; 
    $rating_four = $rating_four + 1;
}elseif($_POST['star_value'] == 5){
    $rating_num = $rating_num + 1; 
    $rating_sum = $rating_sum + 5; 
    $rating_five = $rating_five + 1;
}

$query2 = "UPDATE rating SET cafe_id = '$cafe_id', rating_num = '$rating_num', 
rating_sum = '$rating_sum', rating_one = '$rating_one', rating_two = '$rating_two', 
rating_three = '$rating_three', rating_four = '$rating_four', rating_five = '$rating_five' 
WHERE cafe_id = '$cafe_id';";
mysqli_query($conn, $query2);
$conn->close();

header('location:'.$prevPage);   // 원래 페이지로 이동시킴

?>