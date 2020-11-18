<?php session_start();
$id = $_SESSION['user_id'];
$name = $_SESSION['user_name'];
$email = $_SESSION['user_email']; 
$password = $_SESSION['user_pw'];
$conn = mysqli_connect('localhost', 'root', '1234', 'cafe');
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <title>MY</title>
    <style type="text/css">
      .mypage_box {
        position: absolute;
        background-color: white;
        margin: 8%;
        margin-left: 20%;
        width: 60%;
      }
      .logo_button {
            width: 110px;
            position:absolute;
            top:20px;
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
        .table{
          text-align: center;
          width:100%;
        }
    </style>
  </head>
  <body>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Mypage.php'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <div class="mypage_box">
      <p style="
          font-size: 19px;
          line-height: 2.7em;
          text-align: center;
          color : white;
          background : teal">  PROFILE</p>
      
      <div>
        <table class="table" style="margin-bottom:5%;">
        <tr>
        <td style="border-bottom:1px solid;"><p style="font-size: 17px; line-height: 2em; color:teal">  Name </p></td>
        <td style="border-left:1px solid; border-bottom:1px solid"> <?php echo $name ?></td>
        </tr>

        <tr>
        <td style="border-bottom:1px solid;"><p style="font-size: 17px; line-height: 2em">  E-mail </p></td>
        <td style="border-left:1px solid; border-bottom:1px solid"> <p style="color:teal"><?php echo $email ?></p></td>
        </tr>
        
        <tr>
        <td><p style="font-size: 17px; line-height: 2em; color:teal">  Password </p></td>
        <td style="border-left:1px solid;">
        <input type=password style="border:0; text-align:center;" value=<?php echo $password ?>/>
        </td>
        </tr>
        </table>
      </div>

      <p style="
          font-size: 19px;
          line-height: 2.7em;
          text-align: center;
          color : white;
          background : teal">  Your CAFE</p>

      <table class="table" style="margin-bottom:5%;">
      <tr>
      <td style="background: lightgray;">CAFE NAME</td>
      <td style="background: lightgray;">CAFE ADDRESS</td>
      </tr>
      <?php
      $cafe_ = "SELECT cafe_name, cafe_address FROM cafe natural join member WHERE user_id = '$id'";
      $cafe = mysqli_query($conn, $cafe_);
      while($result = mysqli_fetch_assoc($cafe)){       
        echo "<tr><td>",$result['cafe_name'],"</td>"; 
        ?> 
        <td style="border-left:1px solid;">
        <?php echo $result['cafe_address'],"</td></tr>\n\n";
      } 
      ?>
</table>
    
<form method = "POST" action = "Mypage.php">
<input type ="submit" name = "Withdrawal"  value="Withdrawal" 
style="border:0; float: right; height: 30px; margin-top: 0.3%; background:gray; color:white;"/> 
</form>

<button onclick="location.href = 'ModifyPW.php'" style="border:0; margin-right: 2%; background:gray;color:white;
 float: right; height: 30px; margin-top: 0.3%">Modify your Password</button>

<button onclick="location.href='Logout.php'" style="border:0; margin-right: 2%; background:gray;color:white;
float: right; height: 30px; margin-top: 0.3%">Log out</button>

<?php function withdrawal() { 
 $id = $_SESSION['user_id']; 
 $conn = mysqli_connect('localhost', 'root', '1234', 'cafe');
 $member_out = "DELETE FROM member WHERE user_id = '$id';"; 
 mysqli_query($conn, $member_out);
 $rearrange = "UPDATE member SET member.user_id = '1';"; 
 mysqli_query($conn, $rearrange);
 session_destroy();
echo "<script> alert('회원탈퇴가 완료되었습니다.'); location.href='Main.php';</script>";
}
if(array_key_exists('Withdrawal',$_POST)) withdrawal();
?>

</div>
  </body>
</html>