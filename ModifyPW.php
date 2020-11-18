<?php session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email']; 
$password = $_SESSION['user_pw'];
?>
<!-- <meta http-equiv="refresh" content="0;url=Mypage.php" /> -->

<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>Modify Password</title>
<style>
* {margin: 0 auto;}
.find {text-align:center; width:500px; margin-top:30px; }
</style>
</head>
<body>
  <div class="find">
  <form method="post" action="UpdatePW.php">
  <p style="
          font-size: 19px;
          line-height: 2.7em;
          text-align: center;
          color : white;
          background : teal">  Modify your Password</p>

          <table style="margin: 10%;">
            <tr>
              <td style="color:teal;"> New Password</td> 
              <td><input type="password" size="35" name="pw" placeholder="Input your new password"></td>
            </tr>
          </table>

        <input type="submit" value="Modify" style="border:0; background: teal; color:white"/>
  </form>
</div>
</body>
</html>