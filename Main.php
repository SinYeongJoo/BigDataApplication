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

// $select_query = "SELECT DISTINCT cafe_id FROM rating ORDER BY rating_sum/rating_num DESC limit 3";
// $result_set = mysqli_query($conn, $select_query);

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
            width: 110px;
            position:absolute;
            top:20px;
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
        .login_button {
            height: 40px;
            width: 40px;
            position:absolute;
            top:20px;
            right:90px;
        }
        .map_wrap{
            position: absolute;
            height: 630px;
            width: 680px;
            right: 6%;
            top:14%;
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
            border: solid 1px black;
            width: 550px;
            height: 360px;
            position: fixed;
            top:360px;
            left:12%;
            margin-left: -10px;
        }
        #recco_one_div{
            border: solid 1px red;
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
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.php'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>

    <div class = "intro_div">
        어쩌구 저쩌구<br/>우리 최고!
    </div>
        <form method="GET" action="Search.php">
            <input type="text" id="search_data" class = "search_input" name = "cafe_search"/>
            <button type="submit" class="search_button" value="search">SEARCH</button>
        </form>

    <div class = "map_wrap">
        <form>
            <input type="image" src="images/seoul_map_all.png" id = "map_image" onclick="location.href='Search.php'">
        </form>
    </div>
    
    <div class = "recco_wrap">
        <?php 
        $rating_ = "SELECT cafe_name,rating_sum/rating_num FROM rating, cafe where cafe.cafe_id=rating.cafe_id order by rating_sum/rating_num desc;";
        $rating = mysqli_query($conn, $rating_);?>
            <p style="padding-left:17px; font-size: 1.5em; font-weight: bold;">별점이 가장 높은 카페를 만나보세요!</p>
            <?php $i = 3; while($price=mysqli_fetch_row($rating)){ ?>
            <div id = "recco_one_div">
                <?php 
                echo $price[0],"  " ,round($price[1],2),"<br>\n"; 
                $i--;
                if($i <= 0) break;
                ?>
            </div>
        <?php } ?>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
