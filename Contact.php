<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <title>Contact us</title>
  <link rel = "stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
input[type="checkbox"]#menu_state {
  display: none;
}
input[type="checkbox"]:checked ~ nav {
  width: 250px;
}
input[type="checkbox"]:checked ~ nav label[for="menu_state"] i::before {
  content: "\f053";
}
input[type="checkbox"]:checked ~ nav ul {
  width: 100%;
}
input[type="checkbox"]:checked ~ nav ul li a i {
  border-right: 1px solid #2f343e;
}
input[type="checkbox"]:checked ~ nav ul li a span {
  opacity: 1;
  transition: opacity 0.25s ease-in-out;
}
input[type="checkbox"]:checked ~ main {
  left: 250px;
}
nav {
  position: fixed;
  z-index: 9;
  top: 0;
  left: 0;
  bottom: 0;
  background: #383e49;
  color: #9aa3a8;
  width: 50px;
  font-family: 'Montserrat', sans-serif;
  font-weight: lighter;
  transition: all 0.15s ease-in-out;
}
nav label[for="menu_state"] i {
  cursor: pointer;
  position: absolute;
  top: 50%;
  right: -8px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  background: #fff;
  font-size: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 15px;
  width: 15px;
  border-radius: 50%;
  border: 1px solid #ddd;
  transition: width 0.15s ease-in-out;
  z-index: 1;
}
nav label[for="menu_state"] i::before {
  margin-top: 2px;
  content: "\f054";
}
nav label[for="menu_state"] i:hover {
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}
nav ul {
  overflow: hidden;
  display: block;
  width: 50px;
  list-style-type: none;
  padding: 0;
  margin: 0;
}
nav ul li {
  border: 1px solid #2f343e;
  position: relative;
}
nav ul li.unread:after {
  content: attr(data-content);
  position: absolute;
  top: 10px;
  left: 25px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  color: #fff;
  background: #ef5952;
  font-size: 8px;
}
nav ul li:not(:last-child) {
  border-bottom: none;
}
nav ul li.active a {
  background: #4c515d;
  color: #fff;
}
nav ul li a {
  position: relative;
  display: block;
  white-space: nowrap;
  text-decoration: none;
  color: #9aa3a8;
  height: 50px;
  width: 100%;
  transition: all 0.15s ease-in-out;
}
nav ul li a:hover {
  background: #4c515d;
  color: #fff;
}
nav ul li a * {
  height: 100%;
  display: inline-block;
}
nav ul li a i {
  text-align: center;
  width: 50px;
  z-index: 999999;
}
nav ul li a i.fa {
  line-height: 50px;
}
nav ul li a span {
  padding-left: 25px;
  opacity: 0;
  line-height: 50px;
  transition: opacity 0.1s ease-in-out;
}
#logo{width:200px; height:150px; display: block; margin-right: auto; margin-left: auto;
}
/*.body{
  background-image: url('./image/contact_back.jpg');
  background-position: 100% 16px;
  background-position: right bottom;
  background-repeat:no-repeat;
  background-attachment: fixed;
  background-size: 1536px 480px;
  background-position: top;
}*/
body{
  background-image: url('./image/contact_back.jpg');
  background-position: 100% 16px;
  background-position: right bottom;
  background-repeat:no-repeat;
  background-attachment: fixed;
  background-size: 1535px 755px;
  background-position: top;
}
#image_1{
  width:330px;
  height:570px;
  margin-left:420px;
}
#contact_1{
  background-color: white;
  width:650px;
  height:570px;
  margin-top:-574px;
  margin-left:700px;
}
#logo2{
  margin-left:250px;
  margin-top:20px;
}
#contact_2{
  background-color: #FF3300;
  width:600px;
  height:800px;
  margin-top:0px;
  margin-left:150px;
  float:left;
}
#image_2{
  width:600px;
  height:400px;
  margin-left:750px;
  margin-top:-800px;
  float:left;
}
#image_3{
  width:440px;
  height:400px;
  margin-left:750px;
  margin-top:-400px;
  float:left;
}
#people1{
  margin-left:-60px;
}
#people1_in{
  margin-top:-100px;
  margin-left:-300px;
}
#people2{
  margin-left:310px;
  margin-top:-305px;
  float:left;
}
#people2_in{
  margin-top:-103px;
  margin-left:330px;
  float:left;
}
#people3{
  margin-left:210px;
  margin-top:50px;
}
#people3_in{
  margin-top:-70px;
  margin-left:-10px;
}


</style>
<!-- https://www.rome2rio.com/about/ -->
<body class = "body">
<header>
  <h1 id = "logo"><a href="Main.php"><img src = "image/logo2.png" width="200px" height="140px" alt=""></a> </h1>
</header>

<input type="checkbox" id="menu_state">
<nav>
   <label for="menu_state"><i class="fa"></i></label> 
  <ul>
    <li>
      <a href="MY.php">
        <i class="fa fa-user-circle"></i>
        <span>My</span>
      </a>
    </li>
    <li>
      <a href="Mate.php">
        <i class="fa fa-users"></i>
        <span>Mate</span>
      </a>
    </li>
    <li>
      <a href="Chat.php">
        <i class="fa fa-comments"></i>
        <span>Chat</span>
      </a>
    </li>
    <li>
      <a href="Contact.php">
        <i class="fa fa-info-circle"></i>
        <span>Contact Us</span>
      </a>
  </ul>
</nav>

<!-- <div style = "margin: 0px 150px; font-size:5em; color: gray; font-weight:bold;">Tripwith</div>
<hr width = 80% color = #DDDDDD>
<div style = "margin: 30px 120px; font-size:1.3em;">
  Tripwith은 당신과 함께 여행 <br><br><br><br><br><br><br><br><br><br>
</div> -->
<div style = "font-size:1.8em; text-align: center; color:white; font-family: '고딕'; font-weight:bold">
  <br>
  <bold>여행</bold> 가서 뭐하지?<br>
  <bold>누구랑</bold> 함께 하지?<br>
더는 고민하지 마세요!<br><br>
</div>

<div style = "font-size:1.5em; text-align: center; color:white; font-family: '고딕'; font-weight:normal">
TRIPWITH이 특별한 베트남 여행을 위한<br>
여행지 정보와 함께할 친구를 소개해 드립니다!
</div>
<br><br><br><br>

<img id = "image_1" src = "image/contact_2.jpg">
<div style id = "contact_1">
  <img id = "logo2" src = "image/로고3.png" width="200px" height="140px" alt="" >
  <div style = "font-size:1.5em; text-align: center; color:black; font-family: '고딕'; font-weight:normal"><strong>TRIPWITH</strong>은 여행지에 대한 리뷰 검색과<br> 동행 구하기가 가능한 여행사이트입니다.<br><br>베트남을 시작으로 세계 모든 여행지 소개를<br>목표로 하고 있습니다.<br><br>현재 베트남 25곳의 여행지와 <br>250개의 리뷰를 포함하고 있으며<br>동행을 구하고 동행에 참여할 수도 있습니다.</div>
  <div style = "margin-left: 190px; margin-top:50px">
    <a href="https://www.facebook.com/campaign/landing.php?campaign_id=1662308814&extra_1=s%7Cc%7C340043531643%7Ce%7Cfacebook%7C&placement=&creative=340043531643&keyword=facebook&partner_id=googlesem&extra_2=campaignid%3D1662308814%26adgroupid%3D69637362208%26matchtype%3De%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D1t1%26target%3D%26targetid%3Dkwd-541132862%26loc_physical_ms%3D1009871%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=EAIaIQobChMI3Lvo1KaA5gIVw6iWCh0M8QwGEAAYASAAEgLGKPD_BwE"><img src = "image/facebook.png" width="40px" height="40px" alt=""></a>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a href="https://www.facebook.com/campaign/landing.php?campaign_id=1662308814&extra_1=s%7Cc%7C340043531643%7Ce%7Cfacebook%7C&placement=&creative=340043531643&keyword=facebook&partner_id=googlesem&extra_2=campaignid%3D1662308814%26adgroupid%3D69637362208%26matchtype%3De%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D1t1%26target%3D%26targetid%3Dkwd-541132862%26loc_physical_ms%3D1009871%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=EAIaIQobChMI3Lvo1KaA5gIVw6iWCh0M8QwGEAAYASAAEgLGKPD_BwE"><img src = "image/twitter.png" width="40px" height="40px" alt=""></a>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a href="https://www.facebook.com/campaign/landing.php?campaign_id=1662308814&extra_1=s%7Cc%7C340043531643%7Ce%7Cfacebook%7C&placement=&creative=340043531643&keyword=facebook&partner_id=googlesem&extra_2=campaignid%3D1662308814%26adgroupid%3D69637362208%26matchtype%3De%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D1t1%26target%3D%26targetid%3Dkwd-541132862%26loc_physical_ms%3D1009871%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=EAIaIQobChMI3Lvo1KaA5gIVw6iWCh0M8QwGEAAYASAAEgLGKPD_BwE"><img src = "image/instagram.png" width="40px" height="40px" alt=""></a>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a href="https://www.facebook.com/campaign/landing.php?campaign_id=1662308814&extra_1=s%7Cc%7C340043531643%7Ce%7Cfacebook%7C&placement=&creative=340043531643&keyword=facebook&partner_id=googlesem&extra_2=campaignid%3D1662308814%26adgroupid%3D69637362208%26matchtype%3De%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D1t1%26target%3D%26targetid%3Dkwd-541132862%26loc_physical_ms%3D1009871%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=EAIaIQobChMI3Lvo1KaA5gIVw6iWCh0M8QwGEAAYASAAEgLGKPD_BwE"><img src = "image/youtube.png" width="40px" height="40px" alt=""></a>
</div>
</div>

<div style id = "contact_2">
  <div style = "font-size:2.0em; text-align: center; color:white; font-family: '고딕'; font-weight:bold;"><br>Our people </div>
  <br>
  <img id = "people1" style = "width:300px; height:300px" src = "image/변영신.png">
  <div id = "people1_in" style = "font-size:1.1em; text-align: center; color:white; font-family: '고딕'; font-weight:normal;"><br><strong>YEONGSIN BYEON</strong><br>EWHA Womans University<br>dudtls11444@ewhain.net </div>
  <img id = "people2" style = "width:230px; height:300px"src = "image/오하선.png">
   <div id = "people2_in" style = "font-size:1.1em; text-align: center; color:white; font-family: '고딕'; font-weight:normal;"><br><strong>HASEON OH</strong><br>EWHA Womans University<br>ohgift@ewhain.net </div>
  <img id = "people3" style = "width:195px; height:265px"src = "image/김서영.png">
   <div id = "people3_in" style = "font-size:1.1em; text-align: center; color:white; font-family: '고딕'; font-weight:normal;"><br><strong>SEOYEONG KIM</strong><br>EWHA Womans University<br>ksy990628@ewhain.net</div>
</div>
</div>
<img id = "image_2" src = "image/contact_1.jpg">
<img id = "image_3" src = "image/contact_3.jpg">

<div style = "clear:both;font-size:1.3em; text-align: center; color:white; font-family: '고딕'; font-weight:normal;">
<br><br><br>TRIPWITH과 함께<br>
나만의 특별한 여행을 계획하세요!<br><br>
</div>
<div style = "line-height:1.0em; font-size:5.0em; text-align: center; color:white; font-family: Sans-Serif; font-weight:bolder;">
Your Travel<br>
Begins<br>Here<br><br><br><br>

</div>


</body>
</html> 