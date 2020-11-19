<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    $mysqli = new mysqli('localhost', 'team09', 'team09', 'team09');
    $mysqli->query('SET NAMES utf8');
    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $query="select * from member where user_email='$email' and user_pw = md5('$password')";
    $query="select * from member where user_email='$email' and user_pw = '$password'";
    $result=mysqli_query($mysqli,$query);
    $row=mysqli_fetch_array($result);
    if(!empty($row['user_email'])){
        $_SESSION['user_email'] = $row['user_email'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_pw'] = $row['user_pw'];
        $_SESSION['user_id'] = $row['user_id'];
        echo("<script>location.href='./MyPage.php';</script>");
    }else{
        echo"<script>alert('Please check your email and password.');history.back();</script>";
    }
?>