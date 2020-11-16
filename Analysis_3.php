<?php
$mysql_port=3306;
$conn = mysqli_connect('localhost', 'root', '1234', 'cafe');
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
    <div>Advanced Analysis 3 </div>
    <nav id="topMenu">
    <ul>
        <li><a class="menuLink" href="Analysis_1.php">Franchise</a></li>
        <li><a class="menuLink" href="Analysis_2.php">Number of cafes</a></li>
        <li class="liNow"><a class="menuLink" href="Analysis_3.php">Takeout</a></li>        
        <li><a class="menuLink" href="Analysis_4.php">Americano</a></li>
        <li><a class="menuLink" href="Analysis_5.php">Opening hours</a></li>
      </ul>
    </nav>
    <div class="analysis_div">

    <!-- 익명 별점순 
    <?php
    $takeout_ = "select cafe_name,cafe_address,rating_sum/rating_num 
    from cafe natural join area natural join rating 
    where takeout = 1 order by rating_sum/rating_num desc;";
    $takeout = mysqli_query($conn, $takeout_);
    while($result = mysqli_fetch_row($takeout)){
    echo $result[0],"  " ,$result[1],"  ",round($result[2],2),"<br>\n";
    }
    ?> -->

<form method = "POST" action = "Analysis_3.php">
<input type = "submit" name = "gu0"  value="강남구"/>
<input type = "submit" name = "gu1" value="강동구"/>
<input type = "submit" name = "gu2"  value="강북구"/>
<input type = "submit" name = "gu3" value="강서구"/>
<input type = "submit" name = "gu4" value="관악구"/>

<input type = "submit" name = "gu5"  value="광진구"/>
<input type = "submit" name = "gu6" value="구로구"/>
<input type = "submit" name = "gu7"  value="금천구"/>
<input type = "submit" name = "gu8" value="노원구"/>
<input type = "submit" name = "gu9"  value="도봉구"/>

<input type = "submit" name = "gu10" value="동대문구"/>
<input type = "submit" name = "gu11"  value="동작구"/>
<input type = "submit" name = "gu12" value="마포구"/>
<input type = "submit" name = "gu13"  value="서대문구"/>
<input type = "submit" name = "gu14" value="서초구"/>

<input type = "submit" name = "gu15"  value="성동구"/>
<input type = "submit" name = "gu16" value="성북구"/>
<input type = "submit" name = "gu17"  value="송파구"/>
<input type = "submit" name = "gu18" value="양천구"/>
<input type = "submit" name = "gu19"  value="영등포구"/>

<input type = "submit" name = "gu20" value="용산구"/>
<input type = "submit" name = "gu21"  value="은평구"/>
<input type = "submit" name = "gu22" value="종로구"/>
<input type = "submit" name = "gu23" value="중구"/>
<input type = "submit" name = "gu24"  value="중랑구"/>

</form> 

<?php 
function show($id) { 
$guArray = array("강남구","강동구","강북구","강서구","관악구","광진구","구로구",
        "금천구","노원구","도봉구","동대문구","동작구","마포구","서대문구",
        "서초구","성동구","성북구","송파구","양천구","영등포구","용산구",
        "은평구","종로구","중구","중랑구");
 $conn = mysqli_connect('localhost', 'root', '1234', 'cafe');
 $cafe_ = "SELECT cafe_name,cafe_address FROM cafe natural join area natural join gu 
 where takeout = 0 and gu_name = '$guArray[$id]'";
 $cafe = mysqli_query($conn, $cafe_);
 while($cafeGu = mysqli_fetch_assoc($cafe)){      
   ?>
<button> 
<?php  
echo $cafeGu['cafe_name'],"     ",$cafeGu['cafe_address']; }
 } 
?>
</button>

<?php
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
  </body>
</html>