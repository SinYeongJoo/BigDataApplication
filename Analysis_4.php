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
        .analysis_intro_div{
          position: absolute;
          top:100px;
          left: 8%;
          width: 80%;
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
    </style>
  </head>
  <body>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
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
    <input class = "add_button" type="button" value = "카페 추가" onclick="location.href='Add.php'"/>
    <?php } ?>
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>
    <div class = "analysis_intro_div">
      <p style="font-size: 23px; font-weight: bolder;">Americano Index: Average price of americano by district</p>
    </div>
    <nav id="topMenu">
      <ul>
        <li><a class="menuLink" href="Analysis_1.php">Overview</a></li>
        <li><a class="menuLink" href="Analysis_2.php">Number of cafes</a></li>
        <li><a class="menuLink" href="Analysis_3.php">Takeout</a></li>        
        <li class="liNow"><a class="menuLink" href="Analysis_4.php">Americano</a></li>
        <li><a class="menuLink" href="Analysis_5.php">Opening hours</a></li>
      </ul>
    </nav>
    <div class="analysis_div">
    <?php  
    $americano_ = "SELECT avg(americano.price) AS avg_price, gu.gu_name FROM gu, americano 
    WHERE americano.cafe_id = gu.cafe_id GROUP BY gu.gu_name ORDER BY avg_price DESC";
    $americano = mysqli_query($conn, $americano_);
    ?>
    <div style = "float:left; padding-left:50px;padding-right:50px; width:150px;">
    <p style = "font-weight:bolder; font-size:1.5em; text-align:center;">1</p>
    <img src = "images/americano.png" width = "200px" style = "margin-top: -30px; margin-left:-25px; margin-bottom: -20px;"/><br/>
    <?php $gu_price = mysqli_fetch_assoc($americano);?>
    <p style = "text-align:center; font-size:1.4em; font-weight:bolder"><?php echo $gu_price['gu_name'] ?> </p>
    <p style = "text-align:center; font-size:1.2em; font-weight:bolder"> <?php echo round($gu_price['avg_price'], 2) ?>원 <p>
    </div>
    <div style = "float:left; bolder:solid 1px; padding-left:40px; padding-right:40px;">
    <p style = "font-weight:bolder; font-size:1.5em; text-align:center;">2</p>
    <img src = "images/americano.png" width = "150px" style = "margin-top: 5px; margin-left:-10px; margin-bottom: 18px; width:150px;"/><br/>
    <?php $gu_price = mysqli_fetch_assoc($americano);?>
    <p style = "text-align:center; font-size:1.4em; font-weight:bolder"><?php echo $gu_price['gu_name'] ?> </p>
    <p style = "text-align:center; font-size:1.2em; font-weight:bolder"> <?php echo round($gu_price['avg_price'], 2) ?>원 <p>
    </div>
    <div style = "float:left; width:100px;">
    <p style = "font-weight:bolder; font-size:1.5em; text-align:center;">3</p>
    <img src = "images/americano.png" width = "100px" style = "margin-top: 45px; margin-left:-2px; margin-bottom: 37px; width:110px;"/><br/>
    <?php $gu_price = mysqli_fetch_assoc($americano);?>
    <p style = "text-align:center; font-size:1.4em; font-weight:bolder"><?php echo $gu_price['gu_name'] ?> </p>
    <p style = "text-align:center; font-size:1.2em; font-weight:bolder"> <?php echo round($gu_price['avg_price'], 2) ?>원 <p>
    </div>
    <div style = "margin-top:8px; border-left: solid 3px #CCCCCC; width:390px; float:right; padding-left:10px;">
    <p style = "text-align: center; font-size:1.2em; font-weight:bolder; margin-right:10px;">Others</p>
    <?php
    $i = 4;
    while($gu_price = mysqli_fetch_assoc($americano)){ ?>
    <div style = "float:left; margin-top:-16px; margin-left:10px;">
    <p style = "color: teal; float:left; width:30px; font-weight:bolder;"><?php echo $i ?></p>
    <p style = "float:left; width:70px; font-weight:bold;"><?php echo $gu_price['gu_name'] ?></p>
    <p style = "float:left; width:70px; color: #555555"><?php echo round($gu_price['avg_price'], 2)?></p>
    </div>
    <?php $i++; }?>    
    </div>
  </body>
</html>
