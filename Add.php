<?php session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email']; 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = 'utf-8'>
</head>
<style>
      .mypage_box {
        position: absolute;
        background-color: white;
        margin: 2%;
        margin-left: 20%;
        width: 60%;
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
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 2%;
        }
        table.table2 tr {
                 width: 100%;
                 padding: 10px;
                 font-weight: bold;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 90%;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
        .font1{
                font-weight: bold;
        }
 
</style>
<body>
<input class = "logo_button" type="image" src="images/logo_3.png" onclick="location.href='Main.php'">
<input class = "login_button" type="image" src="images/person.png" onclick="location.href='Mypage.php'"/>
<input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.php'">
<input class = "add_button" type="button" value = "+ Cafe" onclick="location.href='Add.php'"/>
<hr style="width: 100%; color: gray; margin-top: 70px;"/>

<form method = "get" action = "Add_action.php">
<div class="mypage_box">
<p style="font-size: 19px; line-height: 2.7em; text-align: center; color : white;
background : teal">  Post your Cafe ! </p>
<table class = "table2">
    <p class="font1">&nbsp&nbsp&nbsp&nbsp Post by : <?php echo $user_name?><br><br></p>
    <p class="font1">&nbsp&nbsp&nbsp&nbsp&nbspIs it a franchise? &nbsp&nbsp&nbsp&nbsp 
    <input type="radio" name="franchise" value="f"> Yes&nbsp&nbsp
    <input type="radio" name="franchise" value="p"> No
    <br><br></p>
    <p class="font1">&nbsp&nbsp&nbsp&nbsp Is it possible to eat in the store and take out? &nbsp&nbsp&nbsp&nbsp
    <input type="radio" name="takeout" value="y"> Yes&nbsp&nbsp
    <input type="radio" name="takeout" value="n"> No. Only take-out is allowed.
    <br></p>

    <tr> 
    <td>Cafe name</td>
    <td>
    <input type = text name = name size=80 placeholder="Write your cafe name">  
    <input type = text name = company_name size=80 placeholder="If it's a franchise, write down the company name. ex) 스타벅스, 투썸플레이스">  
    </td>   
    </tr>
 
    <tr> <td>Cafe address</td>
    <td>
    서울특별시&nbsp&nbsp
    <select name="gu">
    <option value="강남구">강남구</option>
    <option value="강동구">강동구</option>
    <option value="강북구">강북구</option>
    <option value="강서구">강서구</option>
    <option value="관악구">관악구</option> 
    <option value="광진구">광진구</option>
    <option value="구로구">구로구</option>
    <option value="금천구">금천구</option>
    <option value="노원구">노원구</option>
    <option value="도봉구">도봉구</option>
    <option value="동대문구">동대문구</option>
    <option value="동작구">동작구</option>
    <option value="마포구">마포구</option>
    <option value="서대문구">서대문구</option>
    <option value="서초구">서초구</option>
    <option value="성동구">성동구</option>
    <option value="성북구">성북구</option>
    <option value="송파구">송파구</option>
    <option value="양천구">양천구</option>
    <option value="영등포구">영등포구</option>
    <option value="용산구">용산구</option>
    <option value="은평구">은평구</option>
    <option value="종로구">종로구</option>
    <option value="중구">중구</option>
    <option value="중랑구">중랑구</option>
    </select>
    <input type=text name=address2 placeholder="Detailed address" size=50>  
    </td>
    </tr>

    <tr>
    <td>Area of cafe</td>
    <td><input type="number" name="area"" min="0" max="1000">&nbsp&nbspsquare meter</td>
    </tr>

    <tr>
    <td>Americano price</td>
    <td><input type="number" name="americano" min="0" max="50000">&nbsp&nbspwon</td>
    </tr>

    <tr>
    <td>Business hours</td>
    <td>MON&nbsp&nbsp&nbsp<input type= "number" name="mon_o" min="0" max="24" placeholder="7">
    &nbsp~&nbsp<input type= "number" name="mon_c" min="0" max="24" placeholder="21">
    <br>
    TUE&nbsp&nbsp&nbsp&nbsp&nbsp<input type= "number" name="tue_o" min="0" max="24">
    &nbsp~&nbsp<input type= "number" name="tue_c" min="0" max="24">
    <br> 
    WED&nbsp&nbsp&nbsp<input type= "number" name="wed_o" min="0" max="24">
    &nbsp~&nbsp<input type= "number" name="wed_c" min="0" max="24">
    <br>
    THUR&nbsp&nbsp<input type= "number" name="thur_o" min="0" max="24">
    &nbsp~&nbsp<input type= "number" name="thur_c" min="0" max="24">
    <br> 
    FRI&nbsp&nbsp&nbsp&nbsp&nbsp<input type= "number" name="fri_o" min="0" max="24">
    &nbsp~&nbsp<input type= "number" name="fri_c" min="0" max="24">
    <br>
    SAT&nbsp&nbsp&nbsp&nbsp<input type= "number" name="sat_o" min="0" max="24">
    &nbsp~&nbsp<input type= "number" name="sat_c" min="0" max="24">
    <br>
    SUN&nbsp&nbsp&nbsp<input type= "number" name="sun_o" min="0" max="24">
    &nbsp~&nbsp<input type= "number" name="sun_c"min="0" max="24">
    </td>
    </td>
</table>
<input type = "submit" value="POST" style="border:0; margin-right: 2%; background:gray;color:white;
float: right; height: 30px; margin-top: 0.3%">
</table>
</div>
</form>
</body>
</html>