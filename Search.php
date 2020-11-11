<?php
$cafe_name = $_POST['cafe_search'];
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
        .cafe_name_p{
          margin-top:15px;
          font-weight: bolder;
          font-size: 1.8em;
          padding-left: 35px;
        }
        .cafe_photo_div{
          border: solid 1px;
          margin-top: -15px;
          height: 290px;
        }
        .cafe_address_1_div{
          margin-top:5px;
          font-size:1em;
          float:left;
          margin-left:20px;

        }
        .cafe_address_2_div{
          margin-top:5px;
          font-size:1em;
          float:right;
          margin-right:20px;
        }
    </style>
  </head>

  <body>
    <div style = "position: fixed; background-color: white; height: 70px; top:0px; width: 100%; left: 0%;"></div>
    <hr style="position: fixed; width: 100%; color: gray; top: 62px;"/>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.php'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <div class = "cafe_list_div">  
      <p>'<?php echo $cafe_name ?>'에 대한 검색 결과</p>

      <?php
        $cafesearch = "SELECT * FROM cafe, rating where cafe.cafe_id = rating.cafe_id and cafe.cafe_name like '%$cafe_name%'";
        $cafesearchresult = mysqli_query($conn, $cafesearch);
        while($cafesearchdata = mysqli_fetch_assoc($cafesearchresult)){
          $each_cafe_name = $cafesearchdata['cafe_name'];
          $each_cafe_address = $cafesearchdata['cafe_address'];
          $each_rating = $cafesearchdata['rating_sum'] / $cafesearchdata['rating_num'];
          $each_rating_num = $cafesearchdata['rating_num'];
      ?>

      <div id = "each_cafe_div">
        <?php echo $each_cafe_name ?>
        <br/>
        <?php echo $each_cafe_address ?>
        <br/>
        <?php echo round($each_rating, 2)?>
        <br/>
      </div>
      <?php }?>
    </div>
  
    <div class = "cafe_detail_div">
      <p class = "cafe_name_p">
        cafe_name
      </p>
      <div class = "cafe_photo_div"></div>
      <div class = "cafe_address_1_div">
        <img src = "images/location.png" width = "21px">
        주소주소
      </div>
      <div class = "cafe_address_2_div">
        <img src = "images/star.png" style = "width:21px">
        3.8
      </div>
      <br><br>
      별점을 입력해주세요~
      <br/><br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      10
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
    </div>
    <?php
    mysqli_close($conn);
    ?>
  </body>
<script type="text/javascript">
function openSearch(cafe_search){
location.href="Search.php?cafe_name="+cafe_search;
return true;
}
</script>
</html><?php
$cafe_name = $_POST['cafe_search'];
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
        .cafe_name_p{
          margin-top:15px;
          font-weight: bolder;
          font-size: 1.8em;
          padding-left: 35px;
        }
        .cafe_photo_div{
          border: solid 1px;
          margin-top: -15px;
          height: 290px;
        }
        .cafe_address_1_div{
          margin-top:5px;
          font-size:1em;
          float:left;
          margin-left:20px;

        }
        .cafe_address_2_div{
          margin-top:5px;
          font-size:1em;
          float:right;
          margin-right:20px;
        }
    </style>
  </head>

  <body>
    <div style = "position: fixed; background-color: white; height: 70px; top:0px; width: 100%; left: 0%;"></div>
    <hr style="position: fixed; width: 100%; color: gray; top: 62px;"/>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.php'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <div class = "cafe_list_div">  
      <p>'<?php echo $cafe_name ?>'에 대한 검색 결과</p>

      <?php
        $cafesearch = "SELECT * FROM cafe, rating where cafe.cafe_id = rating.cafe_id and cafe.cafe_name like '%$cafe_name%'";
        $cafesearchresult = mysqli_query($conn, $cafesearch);
        while($cafesearchdata = mysqli_fetch_assoc($cafesearchresult)){
          $each_cafe_name = $cafesearchdata['cafe_name'];
          $each_cafe_address = $cafesearchdata['cafe_address'];
          $each_rating = $cafesearchdata['rating_sum'] / $cafesearchdata['rating_num'];
          $each_rating_num = $cafesearchdata['rating_num'];
      ?>

      <div id = "each_cafe_div">
        <?php echo $each_cafe_name ?>
        <br/>
        <?php echo $each_cafe_address ?>
        <br/>
        <?php echo round($each_rating, 2)?>
        <br/>
      </div>
      <?php }?>
    </div>
  
    <div class = "cafe_detail_div">
      <p class = "cafe_name_p">
        cafe_name
      </p>
      <div class = "cafe_photo_div"></div>
      <div class = "cafe_address_1_div">
        <img src = "images/location.png" width = "21px">
        주소주소
      </div>
      <div class = "cafe_address_2_div">
        <img src = "images/star.png" style = "width:21px">
        3.8
      </div>
      <br><br>
      별점을 입력해주세요~
      <br/><br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      10
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
    </div>
    <?php
    mysqli_close($conn);
    ?>
  </body>
<script type="text/javascript">
function openSearch(cafe_search){
location.href="Search.php?cafe_name="+cafe_search;
return true;
}
</script>
</html><?php
$cafe_name = $_POST['cafe_search'];
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
        .cafe_name_p{
          margin-top:15px;
          font-weight: bolder;
          font-size: 1.8em;
          padding-left: 35px;
        }
        .cafe_photo_div{
          border: solid 1px;
          margin-top: -15px;
          height: 290px;
        }
        .cafe_address_1_div{
          margin-top:5px;
          font-size:1em;
          float:left;
          margin-left:20px;

        }
        .cafe_address_2_div{
          margin-top:5px;
          font-size:1em;
          float:right;
          margin-right:20px;
        }
    </style>
  </head>

  <body>
    <div style = "position: fixed; background-color: white; height: 70px; top:0px; width: 100%; left: 0%;"></div>
    <hr style="position: fixed; width: 100%; color: gray; top: 62px;"/>
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.php'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.php'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
    <div class = "cafe_list_div">  
      <p>'<?php echo $cafe_name ?>'에 대한 검색 결과</p>

      <?php
        $cafesearch = "SELECT * FROM cafe, rating where cafe.cafe_id = rating.cafe_id and cafe.cafe_name like '%$cafe_name%'";
        $cafesearchresult = mysqli_query($conn, $cafesearch);
        while($cafesearchdata = mysqli_fetch_assoc($cafesearchresult)){
          $each_cafe_name = $cafesearchdata['cafe_name'];
          $each_cafe_address = $cafesearchdata['cafe_address'];
          $each_rating = $cafesearchdata['rating_sum'] / $cafesearchdata['rating_num'];
          $each_rating_num = $cafesearchdata['rating_num'];
      ?>

      <div id = "each_cafe_div">
        <?php echo $each_cafe_name ?>
        <br/>
        <?php echo $each_cafe_address ?>
        <br/>
        <?php echo round($each_rating, 2)?>
        <br/>
      </div>
      <?php }?>
    </div>
  
    <div class = "cafe_detail_div">
      <p class = "cafe_name_p">
        cafe_name
      </p>
      <div class = "cafe_photo_div"></div>
      <div class = "cafe_address_1_div">
        <img src = "images/location.png" width = "21px">
        주소주소
      </div>
      <div class = "cafe_address_2_div">
        <img src = "images/star.png" style = "width:21px">
        3.8
      </div>
      <br><br>
      별점을 입력해주세요~
      <br/><br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      10
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <br/>
      <img src = "images/star.png" width = "21px">
    </div>
    <?php
    mysqli_close($conn);
    ?>
  </body>
<script type="text/javascript">
function openSearch(cafe_search){
location.href="Search.php?cafe_name="+cafe_search;
return true;
}
</script>
</html>