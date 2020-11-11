<!-- <?php
$keyword = $_POST['keyword'];
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='1234';
$mysql_db='tripwith';
$mysql_port=3306;
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");
if(mysqli_connect_errno()){ echo "연결실패! ".mysqli_connect_error();}
  $place = "SELECT * FROM trip_info where city_name = '$keyword'";
  $placeresult = mysqli_query($conn, $place);
  $mate = "SELECT mate.*, (select count(*) from mate_member where mate.no=mate_no) count FROM mate where city_name = '$keyword'";
  $materesult = mysqli_query($conn, $mate);
?> -->

<!DOCTYPE html>
<html>
  <head>
    <title>TripWith : <!-- <?php echo $keyword?> --> 검색결과</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"
    />
    <style type="text/css">
      .logo_button {
            width: 110px;
            position: fixed;
            top:20px;
            left:8%;
        }
        .login_button {
            height: 40px;
            width: 40px;
            position: fixed;
            top:20px;
            right:90px;
        }
        .analysis_button {
            width: 40px;
            position: fixed;
            top:20px;
            right:150px;
        }
        .cafe_list_div{
          border: solid 1px black;
          position: static;
          width: 50%;
          margin-top: 120px;
          margin-left:7%;
        }
        .cafe_detail_div{
          border: solid 1px red;
          position: fixed;
          top:122px;
          width: 36%;
          right:6%;
          height: 77%;
          border-left: solid 2px #dddddd;
        }
        #each_cafe_div{
          border: solid 1px blue;
          float: left;
          margin-right: 10px;
          margin-bottom: 10px;
          height:270px;
          width: 171px;
        }
    </style>
  </head>

  <body>
    <div style = "position: fixed; background-color: white; height: 70px; top:0px; width: 100%; left: 0%;"></div>
    <hr style="position: fixed; width: 100%; color: gray; top: 62px;"/>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.html'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.html'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.html'">
    <div class = "cafe_list_div">  
      <p>'~~~~~'에 대한 검색 결과</p>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
      <div id = "each_cafe_div">
        aa
      </div>
    </div>
    <div class = "cafe_detail_div">
      <div>

      </div>
      <div>

      </div>
      <p>
        카페카페
      </p>
      <p>
        (주소)주소주소
      </p>
      <p>
        (별)별점
      </p>
    </div>
  </body>
</html>
