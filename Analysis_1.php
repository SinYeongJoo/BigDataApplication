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
  $cafe_ = "SELECT * FROM cafe;";
  $cafe = mysqli_query($conn, $cafe_);
  $total = mysqli_num_rows($cafe);
  $franchise_ = "SELECT * FROM company where franchise = 1;";
  $franchise = mysqli_query($conn, $franchise_);
  $franchiseTotal = mysqli_num_rows($franchise);
  $personalTotal = $total - $franchiseTotal;
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
        .font1{
          font-size: 20px;
          text-align:center; 
          font-weight: bold; 
          line-height:1.0em;
        }
    </style>
  </head>
  <body>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.php'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>
    
    <div>Advanced Analysis</div>
    <nav id="topMenu">
    <ul>
        <li><a class="menuLink" href="Analysis_1.php">Franchise</a></li>
        <li><a class="menuLink" href="Analysis_2.php">2</a></li>
        <li><a class="menuLink" href="Analysis_3.php">Rating</a></li>        
        <li class="liNow"><a class="menuLink" href="Analysis_4.php">Americano</a></li>
        <li><a class="menuLink" href="Analysis_5.php">5</a></li>
      </ul>
    </nav>


    <?php while($cafedata = mysqli_fetch_assoc($cafe)){  
  $id =  $cafedata['cafe_id']; 
  $name = $cafedata['cafe_name']; 
  $address = $cafedata['cafe_address'];  
  //$franchiseCount = ;
  }

  ?> 
    <div class="analysis_div"> 
    <p class="font1"> 서울시 전체 카페 수 </p>
    <p class="font1"><?php echo $total?></p>
    <p class="font1"> 서울시 프랜차이즈 카페 수 </p> 
    <p class="font1"><?php echo $franchiseTotal?></p>

    <!-- <p class="font1"> <?php echo ''.$id.'';?></p>
    <p class="font1"> <?php echo ''.$name.'';?></p>
    <p class="font1"> <?php echo ''.$address.'';?></p> -->
    
    <p class="font1"> 서울시 개인 카페 수 </p>
    <p class="font1"><?php echo $personalTotal?></p>


    </div>


  <?php mysqli_close($conn);?>
  </body>
</html>
