<?php
$cafe_search = $_GET['cafe_search'];
$cafe_id_detail = !empty($_GET['cafe_id_detail']) ? (int)$_GET['cafe_id_detail'] : -1;
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
        .cafe_list_div{
          position: static;
          width: 50%;
          margin-top: 120px;
          margin-left:7%;
        }
        .cafe_detail_div{
          position: fixed;
          top:110px;
          width: 36%;
          right:5%;
          height: 83%;
          border-left: solid 4px #dddddd;
          padding-left: 2.3%;
        }
        #each_cafe_div{
          border-left: solid 0px;
          border-right: solid 2px teal;
          border-top: solid 0px;
          border-bottom: solid 2px teal;
          border-radius: 0px 10px 10px 10px;
          background-color: #F6F6F6;
          float: left;
          margin-right: 30px;
          margin-bottom: 10px;
          height:120px;
          width: 340px;      
        }
        .cafe_name_p{
          margin-top:15px;
          font-weight: bolder;
          font-size: 1.5em;
          padding-left: 15px;
        }
        .cafe_photo_div{
          margin-top: -15px;
          height: 290px;
        }
        .cafe_address_1_div{
          font-size:1.0em;
          float:left;
          width: 76%;
        }
        .cafe_address_2_div{
          font-size:1em;
          float:right;
          border-left: solid 2px #DDDDDD;
          padding-left: 5px;
        }
    </style>
  </head>

  <body>
    <div style = "position: fixed; background-color: white; height: 70px; top:0px; width: 100%; left: 0%;"></div>
    <hr style="position: fixed; width: 100%; color: gray; top: 62px;"/>
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

    <div class = "cafe_list_div">  
      <p style = "font-weight:bolder; font-size:1.2em;">'<?php echo $cafe_search ?>'에 대한 검색 결과</p>
      <?php
        $cafesearch = "SELECT * FROM cafe, rating where cafe.cafe_id = rating.cafe_id and cafe.cafe_name like '%$cafe_search%'";
        $cafesearchresult = mysqli_query($conn, $cafesearch);
        while($cafesearchdata = mysqli_fetch_assoc($cafesearchresult)){
          $each_rating = $cafesearchdata['rating_sum'] / $cafesearchdata['rating_num'];
      ?>
      <form method = "GET" action = "Search.php">
        <select name = "cafe_search" style = "display:none;">
        <option value = "<?php echo $cafe_search?>" selected></option>
        </select>
        <button type = "submit" name = "cafe_id_detail" value = "<?php echo $cafesearchdata['cafe_id']?>" id = "each_cafe_div">
          <p style = "font-weight:bolder; font-size:1.1em; margin-bottom:-3px; margin-top:5px;"><?php echo $cafesearchdata['cafe_name']?><p>
          <img src = "images/location.png" width = "19px" style="float:left;">
          <p style = "text-align:left; float:left; width:290px; margin-left:5px; margin-top: 0px;"><?php echo $cafesearchdata['cafe_address'] ?></p>
          <br/>
          <img src = "images/star.png" width = "20px" style="float:left; margin-top:-3px;">
          <p style = " text-align:left; float:left; margin-left:5px; margin-top:1px;"><?php echo round($each_rating, 2)?></p>
          <br/>
        </button>
      </form>
      <?php }?>
    </div>
  
    <?php
    if($cafe_id_detail == -1){
      ?>
      <div class = "cafe_detail_div">
        <p class = "cafe_name_p">카페를 선택해주세요.</P>
      </div>
      <?php
    }
    else{
        $cafedetail = "SELECT * FROM cafe, rating, img where (cafe.cafe_id = rating.cafe_id) and (cafe.cafe_id = img.cafe_id) and cafe.cafe_id = $cafe_id_detail";
        $cafedetailresult = mysqli_query($conn, $cafedetail);
        $cafedetaildata = mysqli_fetch_assoc($cafedetailresult);
    ?>
    <div class = "cafe_detail_div">
      <p class = "cafe_name_p">
      <?php echo $cafedetaildata['cafe_name'] ?>
      </p>
      <div class = "cafe_photo_div">
      <img style = "border:solid 2px #DDDDDD; border-radius:5px;" src = "<?php echo $cafedetaildata['src']?>", height = "270px", width = "100%"> 
      </div>
      <div class = "cafe_address_1_div">
        <img src = "images/location.png" width = "21px">
        <?php echo $cafedetaildata['cafe_address'] ?>
      </div>
      <div class = "cafe_address_2_div">
        <img src = "images/star.png" style = "width:21px">
        <?php echo round($cafedetaildata['rating_sum'] / $cafedetaildata['rating_num'], 2) ?>
      </div>
      <br><br>
      <form method="post" action="Search_back.php">
      <select name = "cafe_id" style = "width: 0px; height: 0px">
        <option value = "<?php echo $cafe_id_detail?>" selected></option>
      </select>
      <select name = "star_value" style = 'display:inline'>
        <option value="">별점선택</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <div class="switch">
        <input name="switch" id="one" type="radio" checked/>
        <label for="one" class="switch__label">One</label>
        <input name="switch" id="two" type="radio" />
        <label for="two" class="switch__label">Two</label>
        <input name="switch" id="three" type="radio" />
        <label for="three" class="switch__label" >Three</label>
        <div class="switch__indicator" ></div>
      </div>
      <input type="submit" name = "review_submit" value="입력">
      </form>

      <br/>
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        &nbsp<?php echo $cafedetaildata['rating_five'] ?>
        <br/>
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        &nbsp<?php echo $cafedetaildata['rating_four'] ?>
        <br/>
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        &nbsp<?php echo $cafedetaildata['rating_three'] ?>
        <br/>
        <img src = "images/star.png" width = "20px">
        <img src = "images/star.png" width = "20px">
        &nbsp<?php echo $cafedetaildata['rating_two'] ?>
        <br/>
        <img src = "images/star.png" width = "20px">
        &nbsp<?php echo $cafedetaildata['rating_one'] ?>
    </div>
    <?php }
    mysqli_close($conn);
    ?>
  </body>
</html>