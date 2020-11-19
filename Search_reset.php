<?php
session_start();
$prevPage = $_SERVER['HTTP_REFERER'];   // prevPage 변수에 이전 페이지 변수를 저장함
$conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");

$cafe_id = $_POST['cafe_id'];
$query="delete from rating where cafe_id = '$cafe_id'";
mysqli_query($conn, $query);

$query2="insert into rating(cafe_id, rating_num, rating_sum, rating_one, rating_two, rating_three, rating_four, rating_five) values ('$cafe_id', 0, 0, 0, 0, 0, 0, 0)";
mysqli_query($conn, $query2);
$conn->close();

header('location:'.$prevPage);  

?>