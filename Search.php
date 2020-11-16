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
        .cafe_list_div{
          border: solid 1px black;
          position: static;
          width: 50%;
          margin-top: 120px;
          margin-left:7%;
        }
        .cafe_detail_div{
          border: solid 1px #dddddd;
          position: fixed;
          top:122px;
          width: 36%;
          right:6%;
          height: 80%;
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
          font-size: 1.5em;
          padding-left: 15px;
        }
        .cafe_photo_div{
          border-top: solid 1px #CCCCCC;
          border-bottom: solid 1px #CCCCCC;
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
      <p>'<?php echo $cafe_search ?>'에 대한 검색 결과</p>
      <?php
        $cafesearch = "SELECT * FROM cafe, rating where cafe.cafe_id = rating.cafe_id and cafe.cafe_name like '%$cafe_search%'";
        $cafesearchresult = mysqli_query($conn, $cafesearch);
        while($cafesearchdata = mysqli_fetch_assoc($cafesearchresult)){
          $each_rating = $cafesearchdata['rating_sum'] / $cafesearchdata['rating_num'];
      ?>
      <form method = "GET" action = "Search.php">
        <select name = "cafe_search" style = "width: 0px; height: 0px">
          <option value = "<?php echo $cafe_search?>" selected></option>
        </select>

        <button type = "submit" name = "cafe_id_detail" value = "<?php echo $cafesearchdata['cafe_id']?>" id = "each_cafe_div">
          <?php echo $cafesearchdata['cafe_name']?>
          <br/>
          <?php echo $cafesearchdata['cafe_address'] ?>
          <br/>
          <?php echo round($each_rating, 2)?>
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
      <img src = "<?php echo $cafedetaildata['src']?>", height = "290px", width = "100%"> 
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
      당신의 별점을 입력해주세요
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
      <input type="submit" name = "review_submit" value="입력">
      </form>

      <br/><br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <?php echo $cafedetaildata['rating_five'] ?>
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <?php echo $cafedetaildata['rating_four'] ?>
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <?php echo $cafedetaildata['rating_three'] ?>
      <br/>
      <img src = "images/star.png" width = "21px">
      <img src = "images/star.png" width = "21px">
      <?php echo $cafedetaildata['rating_two'] ?>
      <br/>
      <img src = "images/star.png" width = "21px">
      <?php echo $cafedetaildata['rating_one'] ?>
    </div>
    <?php }
    mysqli_close($conn);
    ?>
  </body>
</html>