<?php session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email']; 
$password = $_SESSION['user_pw'];
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>Modify Password</title>
<style>
* {margin: 0 auto;}
.find {
  text-align:center; 
  width:500px; 
  margin-top:2%; 
  }
.logo_button {
            width: 55px;
            position:absolute;
            top:18px;
            left:8%;
        }
      .analysis_button {
            width: 40px;
            position:absolute;
            top:20px;
            right:150px;
        }
        .login_button {
            height: 40px;
            width: 40px;
            position:absolute;
            top:20px;
            right:90px;
        }
        .add_button {
            width: 70px;
            height: 40px;
            position:fixed;
            border: solid 1px teal;
            border-radius: 5px;
            top:18px;
            right:220px;
            color: white;
            background-color:teal;
        }
</style>
</head>
<body>
<input class = "logo_button" type="image" src="images/logo_3.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Mypage.php'"/>
    <input class = "analysis_button" type="image" src = "images/analysis.png" 
    onclick="location.href='Analysis_1.php'">
    <input class = "add_button" type="button" value = "+ Cafe" onclick="location.href='Add.php'"/>
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>

  <div class="find">
  <form method="post" action="UpdatePW.php">
  <p style="font-size: 19px;line-height: 2.7em;text-align: center;color : white;background : teal;">  
  Modify your Password</p>
          <table style="margin: 10%;">
            <tr>
              <td><input type="password" size="50" name="pw" placeholder="Input your new password"></td>
            </tr>
          </table>

        <input type="submit" value="Modify" style="border:0; font-size: 20px; background: teal; color:white"/>
  </form>
</div>
</body>
</html>