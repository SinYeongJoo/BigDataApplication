<?php
session_start();
$mysql_port=3306;
$conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
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
$top_ = "SELECT company_name, avg(rating_sum/rating_num) 
from (cafe natural join company natural join rating) 
where franchise = 1 group by company_name order by avg(rating_sum/rating_num) desc limit 5;";
$top =  mysqli_query($conn, $top_);
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
        .font1{
          font-size: 15px;
          text-align:center; 
          font-weight: bold; 
          margin: 0px;
          color:gray;
          line-height:1.0em;
          margin-bottom:0.8%;
          border-radius: 5px;
        }
        .countCafe{
          text-align:center;
          font-size:40px;
          color: teal;
        }
        .countCafef{
          text-align:center;
          font-size:40px;
          color: teal;
        }
        .countCafep{
          text-align:center;
          font-size:40px;
          color: teal;
        }
        .analysis_intro_div{
          position: absolute;
          top:100px;
          left: 8%;
          width: 80%;
        }
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var CountAllCafe= <?php echo $total?>;
var CountFranchiseCafe = <?php echo $franchiseTotal?>;
var CountPersonalCafe = <?php echo $personalTotal?>;

  $({ val : 0 }).animate({ val :  CountAllCafe }, {
   duration: 2000,
  step: function() {
    var num = numberWithCommas(Math.floor(this.val));
    $(".countCafe").text(num);
  },
  complete: function() {
    var num = numberWithCommas(Math.floor(this.val));
    $(".countCafe").text(num);
  }
});

$({ val : 0 }).animate({ val : CountFranchiseCafe }, {
   duration: 2000,
  step: function() {
    var num = numberWithCommas(Math.floor(this.val));
    $(".countCafef").text(num);
  },
  complete: function() {
    var num = numberWithCommas(Math.floor(this.val));
    $(".countCafef").text(num);
  }
});

$({ val : 0 }).animate({ val : CountPersonalCafe }, {
   duration: 2000,
  step: function() {
    var num = numberWithCommas(Math.floor(this.val));
    $(".countCafep").text(num);
  },
  complete: function() {
    var num = numberWithCommas(Math.floor(this.val));
    $(".countCafep").text(num);
  }
});

function numberWithCommas(x) {    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}
</script>
  </head>
  <body>
  <input class = "logo_button" type="image" src="images/logo_3.png" onclick="location.href='Main.php'">
  <?php
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
      <p style="font-size: 23px; font-weight: bolder;">
      &nbspOverview : &nbspNumber of cafes in Seoul &  Popular Seoul Franchise Cafe! TOP 5</p>
    </div>
    <nav id="topMenu">
    <ul>
        <li class="liNow"><a class="menuLink" href="Analysis_1.php">Overview</a></li>
        <li><a class="menuLink" href="Analysis_2.php">Number of cafes</a></li>
        <li><a class="menuLink" href="Analysis_3.php">Takeout</a></li>        
        <li><a class="menuLink" href="Analysis_4.php">Americano</a></li>
        <li><a class="menuLink" href="Analysis_5.php">Midnight cafe</a></li>
      </ul>
    </nav>
    <div class="analysis_div">   
    <p class="font1" style="background: teal; height: 8%;font-size:25px; color:white; "> Number of cafes in Seoul</p>
    
    <table style="text-align:center; margin-bottom:5%;">
    <tr>
    <td>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;
    </td>
    <td> 
    <p class="countCafe"></p>
    </td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td> 
    <p class="countCafef"></p>
    </td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td> 
    <p class="countCafep"></p>
    </td>
    </tr>
    <tr>
    <td></td>
    <td>
    <p class="font1" style="display:inline"> Cafes in Seoul &nbsp&nbsp</p> 
    </td>
    <td></td>
    <td>
    <p class="font1" style="display:inline"> Franchise Cafes in Seoul &nbsp&nbsp</p> 
    </td>
    <td></td>
    <td>
    <p class="font1" style="display:inline"> Private Cafes in Seoul &nbsp&nbsp</p> 
    </td>
    </tr>
    </table>

  <p class="font1" style="background: teal; height: 8%; font-size:25px; color:white;">
  Popular Seoul Franchise Cafe! TOP 5</p>
    <table  style="text-align:center; width:100%;">
    <br>
<?php  
    $i = 1;
    while($result = mysqli_fetch_row($top)){ ?>
        <tr> 
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td>
        <p class="font1" style="font-size: 20px;"> <?php echo $i; ?> </p>
        </td>
        <td>
        <p class="font1" style="font-size: 20px;"> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $result[0]; ?> </p>
        </td>
        <td>
        <p class="font1" style="font-size: 20px;">
        <img src = "images/star.png" width = "15px"> 
        <?php echo round($result[1],2); ?> </p>
        </td>
        </tr>
       <?php $i = $i+1;  }  ?>
        </table>
    </div>


  <?php mysqli_close($conn);?>
  </body>
</html>
