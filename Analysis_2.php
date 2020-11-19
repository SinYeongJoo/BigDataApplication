<?php
$mysql_port=3306;
$conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");
if(mysqli_connect_errno()){ echo "연결실패! ".mysqli_connect_error();}
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <style>
      input {
        height: 30px;
      }
      #topMenu {
        position: absolute;
        top: 25%;
        left: 8%;
        height: 80%;
        width: 12%;
      }
      #topMenu ul {
        margin: 0px;
        padding: 0px;
        height: 100%;
        width: 100%;
      }
      #topMenu ul li {
        margin: 0px;
        padding: 0px;
        list-style: none;
        color: black;
        background-color: #eeeeee;
        line-height: 100px;
        vertical-align: middle;
        text-align: center;
        width: 100%;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
      }
      #topMenu ul .liNow {
        list-style: none;
        line-height: 100px;
        background-color: #4e4e4e;
        vertical-align: middle;
        text-align: center;
        float: right;
        width: 100%;
      }
      #topMenu .menuLink {
        text-decoration: none;
        color: white;
        display: block;
        width: 100%;
        font-size: 14px;
        font-weight: bold;
        padding-left: 0px;
        font-family: "Trebuchet MS", Dotum, Arial;
      }
      #topMenu .menuLink:hover {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        color: teal;
        background-color: #4d4d4d;
      }
      .analysis_div {
        background-color: #eeeeee;
        position: absolute;
        top: 25%;
        left: 20%;
        height: 500px;
        width: 69%;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
        border-left: solid 3px #4e4e4e;
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
        .guBox{
          text-align: center;
          font-weight: bold;
          font-size: 18px;
          width:17%;
          height: 16%;
          margin:0.8%;
          display:inline;
          border:0;
          background:teal;
          color: white;
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
        .analysis_intro_div{
          position: absolute;
          top:100px;
          left: 8%;
          width: 80%;
        }
    </style>
  </head>
  <body>
  <input class = "logo_button" type="image" src="images/logo_3.png" onclick="location.href='Main.php'">
  <?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $link = 'MyPage.php';
    }else{
        $link = 'Login.php';
    }
    ?>
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='<?php echo $link ?>'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <?php
    if(isset($_SESSION['user_id'])){?>
    <input class = "add_button" type="button" value = "+ Cafe" onclick="location.href='Add.php'"/>
    <?php } ?>
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>
    <div class = "analysis_intro_div">
      <p style="font-size: 23px; font-weight: bolder;">
      &nbspNumber of cafes in Seoul : &nbspNumber of cafes by district</p>
    </div>

    <nav id="topMenu">
    <ul>
        <li><a class="menuLink" href="Analysis_1.php">Overview</a></li>
        <li class="liNow"><a class="menuLink" href="Analysis_2.php">Number of cafes</a></li>
        <li><a class="menuLink" href="Analysis_3.php">Takeout</a></li>        
        <li><a class="menuLink" href="Analysis_4.php">Americano</a></li>
        <li><a class="menuLink" href="Analysis_5.php">Midnight cafe</a></li>
      </ul>
    </nav> 
    <div class="analysis_div">
    <?php
    $guArray = array("강남구","강동구","강북구","강서구","관악구","광진구","구로구",
    "금천구","노원구","도봉구","동대문구","동작구","마포구","서대문구",
    "서초구","성동구","성북구","송파구","양천구","영등포구","용산구",
    "은평구","종로구","중구","중랑구");
    $guEngArray = array("Gangnam-gu","Gangdong-gu","Gangbuk-gu","Gangseo-gu","Gwanak-gu","Gwangjin-gu","Guro-gu",
    "Geumcheon-gu","Nowon-gu","Dobong-gu","Dongdaemun-gu","Dongjak-gu","Mapo-gu","Seodaemun-gu",
    "Seocho-gu","Seongdong-gu","Seongbuk-gu","Songpa-gu","Yangcheon-gu","Yeongdeungpo-gu","Yongsan-gu",
    "Eunpyeong-gu","Jongno-gu","Jung-gu","Jungnang-gu");

    for ($i = 0; $i < 25; $i++){
    $guNum_ = "SELECT count(cafe_id), gu_name FROM gu where gu_name = '$guArray[$i]';";
    $guNum = mysqli_query($conn, $guNum_);
    $total = mysqli_fetch_row($guNum);
    if($total[0] > 1000){
      $color = '#034b7f';
    }elseif($total[0] >700){
      $color = '#008bb0';
    }else{
      $color = '#85bfbf';
    }
    ?>
    <div style = "height: <?php echo $total[0]/6.5?>px; width:35px; border:solid 0px; 
    margin-left:39px; position:fixed; bottom:115px; background-color: <?php echo $color?>;">
    <p style = "text-align:center; margin-top:-28px;"><?php echo $total[0]?></p>
    <p style = "font-size:0.6em; position:absolute; height:20px; width:100%; text-align:center; bottom:-38px; font-weight:bolder;"><?php  echo $total[1];?></p>
    <div>
    <?php
    }
    ?>
    </div>
  </body>
</html>