<?php 
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email']; 
$password = $_SESSION['user_pw'];
$newPassword = $_POST['pw'];

$conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
$sql = "UPDATE member set user_pw='$newPassword' where user_id = '$user_id';";
mysqli_query($conn, $sql); 
session_destroy();
echo "<script>alert('Your password is modified'); location.href='Main.php';</script>";
?>