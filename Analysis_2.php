<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='1234';
$mysql_db='cafe';
$mysql_port=3306;
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
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
        height: 82%;
        width: 69%;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
        border-left: solid 3px #4e4e4e;
      }
      .logo_button {
            width: 110px;
            position:absolute;
            top:20px;
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
          border:1px bold;
          border-color:teal;
          color: gray;
        }
    </style>
  </head>
  <body>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.php'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>
    <div>커피를 분석해 어쩌구 저쩌구</div>
    <nav id="topMenu">
    <ul>
        <li><a class="menuLink" href="Analysis_1.php">Franchise</a></li>
        <li class="liNow"><a class="menuLink" href="Analysis_2.php">Number of cafes</a></li>
        <li><a class="menuLink" href="Analysis_3.php">Store available</a></li>        
        <li><a class="menuLink" href="Analysis_4.php">Americano</a></li>
        <li><a class="menuLink" href="Analysis_5.php">Opening hours</a></li>
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
    $guNum_ = "SELECT count(cafe_id) FROM gu where gu_name = '$guArray[$i]';";
    $guNum = mysqli_query($conn, $guNum_);
    $total = mysqli_fetch_row($guNum);?>

    <button class="guBox">
    <?php  echo $total[0],"<br>\n",$guEngArray[$i];?>
    </button>
    <?php
    }
    ?>
    
    
 
    </div>
  </body>
</html>