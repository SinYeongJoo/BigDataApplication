<?php session_start();
$id = $_SESSION['user_id'];
$name = $_SESSION['user_name'];
$email = $_SESSION['user_email']; 
$password = $_SESSION['user_pw'];
$conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
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
        margin: 2%;
        margin-left: 20%;
        width: 60%;
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
        .table{
          text-align: center;
          width:100%;
        }
    </style>
  </head>
  <body>
  <input class = "logo_button" type="image" src="images/logo_3.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='<?php echo $link ?>'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <input class = "add_button" type="button" value = "+ Cafe" onclick="location.href='Add.php'"/>
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>
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
    
<form method = "POST" action = "MyPage.php">
<input type ="submit" name = "Withdrawal"  value="Withdrawal" 
style="border:0; float: right; height: 30px; margin-top: 0.3%; background:gray; color:white;"/> 
<input type ="submit" name = "DropCafe"  value="DropCafe" 
style="border:0; float: right; height: 30px; margin-top: 0.3%; margin-right: 2%; background:gray; color:white;"/> 
</form>

<button onclick="location.href = 'ModifyPW.php'" style="border:0; margin-right: 2%; background:gray;color:white;
 float: right; height: 30px; margin-top: 0.3%">Modify your Password</button>

<button onclick="location.href='Logout.php'" style="border:0; margin-right: 2%; background:gray;color:white;
float: right; height: 30px; margin-top: 0.3%">Log out</button>

<?php 

function withdrawal() { 
 $id = $_SESSION['user_id']; 
 $conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
 $member_out = "DELETE FROM member WHERE user_id = '$id';"; 
 mysqli_query($conn, $member_out);

$rearrange = "UPDATE member SET member.user_id = '1';"; 
mysqli_query($conn, $rearrange);
$rearrange1 = "UPDATE cafe SET cafe.cafe_id = '1';"; 
mysqli_query($conn, $rearrange1);
$rearrange2 = "UPDATE gu SET gu.cafe_gu = '1';"; 
mysqli_query($conn, $rearrange2);
 session_destroy();
echo "<script> alert('회원탈퇴가 완료되었습니다.'); location.href='Main.php';</script>";
}

  function drop() { 
  $id = $_SESSION['user_id']; 
  $conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
  $cafe_out = "DELETE FROM cafe WHERE user_id = '$id';"; 
  mysqli_query($conn, $cafe_out);

  $rearrange3 = "UPDATE cafe SET cafe.cafe_id = '1';"; 
  mysqli_query($conn, $rearrange3);
  $rearrange4 = "UPDATE gu SET gu.cafe_gu = '1';"; 
  mysqli_query($conn, $rearrange4);
  echo "<script> location.href='Main.php';</script>";
 }

if(array_key_exists('Withdrawal',$_POST)) withdrawal();
else if (array_key_exists('DropCafe',$_POST)) drop();

?>

</div>
  </body>
</html>