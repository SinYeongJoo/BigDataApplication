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

$select_query = "SELECT * FROM cafe";
$result_set = mysqli_query($conn, $select_query);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8" />
    <style>
        /* .wrap_div{
            position: fixed;
            top: 0;
            left: 0;
            min-width:100%;
            min-height: 100%;
            background-image: url("images/background1.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;      
        } */
        .intro_div{
            position:absolute;
            top:20%;
            left:12%;
            font-size: 5ch;
            font-weight: bolder;
        }
        .logo_button {
            width: 55px;
            position:absolute;
            top:18px;
            left:8%;
        }
        .search_input{
            width: 450px;
            height: 50px;
            position: fixed;
            top:300px;
            left:12%;
            border: solid 3px teal;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }
        .search_button {
            width: 80px;
            height: 58px; 
            position: fixed;
            top:300px;
            left:12%;
            margin-left: 450px;
            border: solid 3px teal;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            background-color: teal;
            color: white
        }
        .analysis_button {
            width: 40px;
            position:absolute;
            top:20px;
            right:150px;
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
        .login_button {
            height: 40px;
            width: 40px;
            position:absolute;
            top:20px;
            right:90px;
        }
        .map_wrap{
            position: absolute;
            height: 530px;
            width: 580px;
            right: 4%;
            top:25%;
        }
        #map_image{
            position: absolute;
            width: 680px;
            height: 630px;
        }
        @media screen and (max-width: 1500px){
            #map_image{
                display: none;
            }
        }
        @media screen and (max-width: 1500px){
            .map_wrap{
                display: none;
            }
        }
        .recco_wrap{
            width: 600px;
            height: 360px;
            position: fixed;
            top:360px;
            left:12%;
            margin-left: -10px;
            float: left;
        }
        #recco_one_div{
            width: 161px;
            height: 240px;
            padding-left: 10px;
            padding-right: 10px; 
            margin-top:-12px;
            float: left;
        }
        #recco_one_border_div{
            border-right: solid 1px #DDDDDD;
            width: 161px;
            height: 240px;
            padding-left: 10px;
            padding-right: 10px;
            margin-top:-12px;
            float: left;
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
    <input class = "add_button" type="button" value = "카페 추가" onclick="location.href='Add.php'"/>
    <?php } ?>
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>

    <div class = "intro_div">
        어쩌구 저쩌구<br/>우리 최고!
    </div>
        <form method="GET" action="Search.php">
            <input type="text" id="search_data" class = "search_input" name = "cafe_search"/>
            <button type="submit" class="search_button" value="search">SEARCH</button>
        </form>

    <div class = "map_wrap">
        <img src="images/logo_4.png" height = "450px;">
    </div>
    
    <div class = "recco_wrap">
        <?php 
        $rating_ = "SELECT src, cafe_name, rating_sum/rating_num FROM rating, cafe, img where cafe.cafe_id = img.cafe_id and cafe.cafe_id=rating.cafe_id order by rating_sum/rating_num desc;";
        $rating = mysqli_query($conn, $rating_);?>
        <p style="padding-left:17px; font-size: 1.5em; font-weight: bold;">별점이 가장 높은 카페를 만나보세요!</p>
        <div style = "float:left; width:100%;">
        <?php $i = 2; while($price = mysqli_fetch_row($rating)){ ?>
        <div id = "recco_one_border_div">
            <img src = "<?php echo $price[0]?>", height = "80%", width = "100%">
            <p style = "margin-top:0px; margin-bottom:0px; font-size:1.0em; font-weight:bold;"><?php echo $price[1]; ?></p>
            <img src = "images/star.png" width = "18px">
            <p style = "float:right; width:85%; margin-top:0px; font-size:0.9em;"><?php echo round($price[2],2);?> </p>
        </div>
        <?php $i--; if($i <= 0) break; } ?>
        <?php $price = mysqli_fetch_row($rating);?>
        <div id = "recco_one_div">
            <img src = "<?php echo $price[0]?>", height = "80%", width = "100%">
            <p style = "margin-top:0px; margin-bottom:0px; font-size:1.0em; font-weight:bold;"><?php echo $price[1];?></p>
            <img src = "images/star.png" width = "18px">
            <p style = "width:85%; margin-top:0px; font-size:0.9em;"><?php echo round($price[2],2);?> </p>
        </div>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
