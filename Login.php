<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<style type="text/css">
  .login_box{  
    position: absolute;
    display: flex;
    height: 470px;
    width: 440px;
    background-color: white;
    border: solid 1px #DDDDDD;
    border-radius: 10px;
    top:55%;
    left:36%;
    margin-top:-180px;
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
  #email_pw_text{
    margin-left:10px; 
    margin-top:40px; 
    margin-bottom: 10px;
    font-size:20px; 
    font-weight: bold;
    margin-left: 40px;
  }
  .email_pw_input{
    height: 45px;
    width: 355px;
    margin-top:10px;
    border: solid 1px gray;
    border-radius: 5px;
    margin-left: 40px;
  }
  .login{
    margin-top: 53px;
    width: 360px;
    height: 57px;
    font-size: 18px;
    background-color: teal;
    border: solid 1px teal;
    border-radius: 5px;
    margin-left: 40px;
    font-weight: bolder;
    color: white;
  }
  .welcome_div{
    position: absolute;
    text-align: center;
    height: 80px;
    width: 440px;
    top:17%;
    left:36%;
    font-size: 1.5em;
    font-weight: bolder;
  }
</style>
</head>

<body>
  <input class = "logo_button" type="image" src="images/logo_3.png" onclick="location.href='Main.php'">
  <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.php'">
  <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
  <hr style="width: 100%; color: gray; margin-top: 70px;"/>
  <div class = "welcome_div">
    <p>Log in and register your own cafe</p>
  </div>
  <div class="login_box">
    <form method="POST" action="Login_back.php">
        <p id = "email_pw_text">Please write your E-mail</p>
        <input type="text" class="email_pw_input" id="ex4-email-input" name="email" 
        placeholder="Please write your E-mail"/>
        <p id = "email_pw_text">Please write your password</p>
        <input type="password" class="email_pw_input" id="ex4-pw-input" name="password" 
        placeholder="Please write your password"/>
        <input type="submit" value="Login" class="login">
        <br><br>
        <a href = "Join.php" style = "font-size: 18px; padding-left: 50px; color: #777777; 
        text-decoration: none;">New to NaviLatte? Create your account</a>
    </form>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
(function cleanText($) {
  var $pw = $('#ex4-email-input, #ex4-pw-input')
  $pw.on('click focus', function(){
    $(this).siblings('label').hide()
  });
  $pw.on('blur', function() {
    $this = $(this)
    if ($.trim($this.val()).length === 0) {
      $this.siblings('label').show()
    }
  });
})(jQuery);
</script>
</body>
</html> 