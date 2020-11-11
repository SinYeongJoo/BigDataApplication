<!-- 수정필요 -->
<?php
  header('Content-Type: text/html; charset=utf-8');
?>
<?php session_start();
$mysqli = new mysqli('localhost', 'root', '1234', 'tripwith');
$mysqli->query('SET NAMES utf8');
    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    }
    $email = $_POST['email'];
    $password =$_POST['password'];

    $sql="select * from member where email='$email' and password = md5('$password')";
    $result=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($result);
     if(!empty($row['email'])){
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['Age'] = $row['age'];
        $_SESSION['Gender'] = $row['gender'];
        echo("<script>alert(\"LOGIN SUCCESS\");location.href='./My.php';</script>");
    }
    else{

        echo"<script>alert('check ID or PW');history.back();</script>";
     }
?>