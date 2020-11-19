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
        .cafelist{
          /* width:150px;
          height:50px; */
          width:49%;
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
      <p style="font-size: 23px; font-weight: bolder;">Takeout : A Take-Out-Only cafe </p>
      <p style="font-size: 18px; margin-top:-18px;">Click your district's name and check out take-out-only cafe </p>
    </div>
    <nav id="topMenu">
    <ul>
        <li><a class="menuLink" href="Analysis_1.php">Overview</a></li>
        <li><a class="menuLink" href="Analysis_2.php">Number of cafes</a></li>
        <li class="liNow"><a class="menuLink" href="Analysis_3.php">Takeout</a></li>        
        <li><a class="menuLink" href="Analysis_4.php">Americano</a></li>
        <li><a class="menuLink" href="Analysis_5.php">Midnight cafe</a></li>
      </ul>
    </nav>
    
    <div class="analysis_div">
      <img src = "./images/seoul_map_all.png" height = "500px" style = "margin-left:10px;"/>
      <form method = "POST" action = "Analysis_3.php">
        <input style = "position:absolute; top:350px; left:320px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu0"  value="강남구"/>
        <input style = "position:absolute; top:262px; left:430px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu1" value="강동구"/>
        <input style = "position:absolute; top:130px; left:287px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu2"  value="강북구"/>
        <input style = "position:absolute; top:240px; left:50px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu3" value="강서구"/>
        <input style = "position:absolute; top:390px; left:195px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu4" value="관악구"/>

        <input style = "position:absolute; top:270px; left:360px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu5"  value="광진구"/>
        <input style = "position:absolute; top:340px; left:90px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu6" value="구로구"/>
        <input style = "position:absolute; top:390px; left:140px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu7"  value="금천구"/>
        <input style = "position:absolute; top:123px; left:355px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu8" value="노원구"/>
        <input style = "position:absolute; top:83px; left:300px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu9"  value="도봉구"/>

        <input style = "position:absolute; top:213px; left:316px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu10" value="동대문구"/>
        <input style = "position:absolute; top:340px; left:200px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu11"  value="동작구"/>
        <input style = "position:absolute; top:255px; left:170px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu12" value="마포구"/>
        <input style = "position:absolute; top:218px; left:182px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu13"  value="서대문구"/>
        <input style = "position:absolute; top:360px; left:265px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu14" value="서초구"/>

        <input style = "position:absolute; top:263px; left:310px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu15"  value="성동구"/>
        <input style = "position:absolute; top:185px; left:290px; border-radius:5px; border:solid 2px teal; font-size:0.7em;"  type = "submit" name = "gu16" value="성북구"/>
        <input style = "position:absolute; top:335px; left:385px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu17"  value="송파구"/>
        <input style = "position:absolute; top:305px; left:92px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu18" value="양천구"/>
        <input style = "position:absolute; top:317px; left:145px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu19"  value="영등포구"/>

        <input style = "position:absolute; top:287px; left:240px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu20" value="용산구"/>
        <input style = "position:absolute; top:158px; left:182px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu21"  value="은평구"/>
        <input style = "position:absolute; top:210px; left:245px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu22" value="종로구"/>
        <input style = "position:absolute; top:247px; left:260px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu23" value="중구"/>
        <input style = "position:absolute; top:197px; left:369px; border-radius:5px; border:solid 2px teal; font-size:0.7em;" type = "submit" name = "gu24"  value="중랑구"/>
      </form> 
      <div style = "height:30px; width: 500px; margin-top: -490px; margin-left:520px;">
      <?php 
      function show($id) { 
      $guArray = array("강남구","강동구","강북구","강서구","관악구","광진구","구로구",
              "금천구","노원구","도봉구","동대문구","동작구","마포구","서대문구",
              "서초구","성동구","성북구","송파구","양천구","영등포구","용산구",
              "은평구","종로구","중구","중랑구");
      $guEngArray = array("Gangnam-gu","Gangdong-gu","Gangbuk-gu","Gangseo-gu","Gwanak-gu","Gwangjin-gu","Guro-gu",
              "Geumcheon-gu","Nowon-gu","Dobong-gu","Dongdaemun-gu","Dongjak-gu","Mapo-gu","Seodaemun-gu",
              "Seocho-gu","Seongdong-gu","Seongbuk-gu","Songpa-gu","Yangcheon-gu","Yeongdeungpo-gu","Yongsan-gu",
              "Eunpyeong-gu","Jongno-gu","Jung-gu","Jungnang-gu");
      $conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
      $cafe_ = "SELECT cafe_name,cafe_address FROM cafe natural join area natural join gu 
      where takeout = 1 and gu_name = '$guArray[$id]'";
      $cafe = mysqli_query($conn, $cafe_);
      while($cafeGu = mysqli_fetch_assoc($cafe)){ ?>
        <button style = "text-align:left; width:230px; height:27px; border-left:solid 4px teal; border-right:solid 0px; border-top:solid 0px; border-bottom:solid 1px; font-weight:bolder">  
        <?php  echo $cafeGu['cafe_name']; ?>
        </button>
      <?php }} 
        if(array_key_exists('gu0',$_POST)) show(0);
        else if(array_key_exists('gu1',$_POST)) show(1);
        else if(array_key_exists('gu2',$_POST)) show(2);
        else if(array_key_exists('gu3',$_POST)) show(3);
        else if(array_key_exists('gu4',$_POST)) show(4);
        else if(array_key_exists('gu5',$_POST)) show(5);
        else if(array_key_exists('gu6',$_POST)) show(6);
        else if(array_key_exists('gu7',$_POST)) show(7);
        else if(array_key_exists('gu8',$_POST)) show(8);
        else if(array_key_exists('gu9',$_POST)) show(9);
        else if(array_key_exists('gu10',$_POST)) show(10);
        else if(array_key_exists('gu11',$_POST)) show(11);
        else if(array_key_exists('gu12',$_POST)) show(12);
        else if(array_key_exists('gu13',$_POST)) show(13);
        else if(array_key_exists('gu14',$_POST)) show(14);
        else if(array_key_exists('gu15',$_POST)) show(15);
        else if(array_key_exists('gu16',$_POST)) show(16);
        else if(array_key_exists('gu17',$_POST)) show(17);
        else if(array_key_exists('gu18',$_POST)) show(18);
        else if(array_key_exists('gu19',$_POST)) show(19);
        else if(array_key_exists('gu20',$_POST)) show(20);
        else if(array_key_exists('gu21',$_POST)) show(21);
        else if(array_key_exists('gu22',$_POST)) show(22);
        else if(array_key_exists('gu23',$_POST)) show(23);
        else if(array_key_exists('gu24',$_POST)) show(24);
      ?>
    </div>
    </div>
  </body>
</html>