<?php
//$keyword = $_POST['keyword'];
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
        height: 500px;
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
        font-size: 12px;
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
        <li><a class="menuLink" href="Analysis_2.php">Number of cafes</a></li>
        <li><a class="menuLink" href="Analysis_3.php">Rating</a></li>        
        <li><a class="menuLink" href="Analysis_4.php">Americano</a></li>
        <li class="liNow"><a class="menuLink" href="Analysis_5.php">Opening hours</a></li>
      </ul>
    </nav>
    <div class="analysis_div">
    <?php
    $guArray = array("도봉구","노원구","강북구","성북구","중랑구","동대문구","은평구","서대문구","마포구","종로구","중구","용산구","성동구","동대문구","중랑구","광진구","강서구","양천구","구로구","영등포구","동작구","금천구","관악구","서초구","강남구","송파구","강동구");
    for ($i = 0; $i < 27; $i++){
    $time_ = "SELECT avg(mon_open),avg(mon_close),avg(tue_open),avg(tue_close),avg(wed_open),avg(wed_close),
    avg(thur_open),avg(thur_close),avg(fri_open),avg(fri_close),avg(sat_open),avg(sat_close),
    avg(sun_open),avg(sun_close) FROM gu, time where gu.cafe_id = time.cafe_id and gu_name = '$guArray[$i]';";
    $time = mysqli_query($conn, $time_);
    $mon_o = mysqli_fetch_row($time);
    echo $guArray[$i],': mon',round($mon_o[0]),"\t", round($mon_o[1]),'tue ',round($mon_o[2]),"\t", round($mon_o[3]),
    'wed ',round($mon_o[4]),"\t", round($mon_o[5]), 'thur ',round($mon_o[6]),"\t", round($mon_o[7]),
    'fri ',round($mon_o[8]),"\t", round($mon_o[9]), 'sat ',round($mon_o[10]),"\t", round($mon_o[11]),
    'sun ',round($mon_o[12]),"\t", round($mon_o[13]),"<br>";
    }
    ?>
    </div>
  </body>
</html>
