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
    $username = $_POST['username'];
    if(isset($email) && isset($password) && isset($username)){
        $query="select email from member where user_email='$email'";
        $result=mysqli_query($mysqli, $query);
        $re = mysqli_fetch_array($result);
        if(!empty($re)){
	        echo ("<script>alert(\"이메일이 이미 등록되어 있습니다!\");history.back()</script>");
        }else{
            $query="insert into member(user_email,user_pw, user_name) values('$email', '$password', '$username')";
	        $result=mysqli_query($mysqli, $query);
	        if($result){
		        echo("<script>location.href='Login.php'; </script>");
    	    }else{
		        echo"<script>alert('에러 발생');history.back();</script>";
	        }
        }
    }else{
        echo"<script>alert('필수 항목이 입력되지 않았습니다!');history.back();</script>";
    }
?>