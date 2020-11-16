<!-- <?php session_start();?> -->
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <title>MY</title>
    <style type="text/css">
      .mypage_box {
        position: absolute;
        background-color: white;
        left: 50%;
        margin-top: 100px;
        margin-left: -250px;
        width: 500px;
        border: solid 1px black;
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
    </style>
  </head>

  <body>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.php'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <div class="mypage_box">
      <p
        style="
          font-size: 21px;
          font-weight: bolder;
          line-height: 3.3em;
          text-align: center;
        "
      >
        My Page
      </p>
      <div>
        <div style="display: flex">
          <p style="font-size: 18px; float: left">Profile</p>
          <input
            type="button"
            value="Modify"
            style="float: right; height: 30px; margin-top: 15px"
          />
        </div>
        <hr style="width: 494px; color: black; margin-top: -10px" />
        <p style="font-size: 17px; font-weight: bold; line-height: 2em">
          E-mail
          <!-- <?php echo $_SESSION['email'];?> -->
        </p>
        <p style="font-size: 17px; font-weight: bold; line-height: 2em">
          password
          <!-- <?php echo $_SESSION['password'];?> -->
        </p>
      </div>
      <div>
        <div style="display: flex">
          <p style="font-size: 18px; float: left">Your cafe</p>
          <input
            type="button"
            value="Add"
            style="float: right; height: 30px; margin-top: 15px"
          />
        </div>
        <hr style="width: 494px; color: black; margin-top: -10px" />
        <div>카페 들어갈 자리~ 여기에서 각각 수정하기, 삭제하기</div>
      </div>   
        <!-- <?php  ?> -->
        <!-- p 뒤에 괄호 넣어야함 -->

    <!-- 회원탈퇴 -->
    <form method = "POST" action = "Mypage.php">
    <input type = "submit" name = "withdrawal"  value="회원 탈퇴"/>
    </form>

    <?php 
function withdrawal() { 
 $email = $_SESSION['email'];
 $conn = mysqli_connect('localhost', 'root', '1234', 'cafe');
 $member_out = "DELETE from member where user_email = '$email';";
//  SET @ CNT = 0;
//  UPDATE member SET member.user_id = @CNT:= @CNT+1; 
mysqli_query($conn, $member_out);
}    
if(array_key_exists('withdrawal',$_POST)) withdrawal();
?>

 <script>
//alert("회원탈퇴가 완료되었습니다.");
//location.href='Main.php'; 
</script>


<button style="
      color: #ff3300;
      font-size: 18px;
      background-color: white;
      border: 0px;"
  onclick="location.href='Logout.php'">로그아웃</button>
      </div>
    </div>
  </body>
</html>