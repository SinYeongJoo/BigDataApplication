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
    <input class = "logo_button" type="image" src="images/logo.png" onclick="location.href='Main.html'">
    <input class = "login_button" type="image" src="images/person.png" onclick="location.href='Login.html'">
    <input class = "analysis_button" type="image" src = "images/analysis.png" onclick="location.href='Analysis_1.html'">
    <hr style="width: 100%; color: gray; margin-top: 70px;"/>
    
    <div>커피를 분석해 어쩌구 저쩌구</div>
    <nav id="topMenu">
      <ul>
        <li class="liNow"><a class="menuLink" href="Analysis_1.html">1</a></li>
        <li><a class="menuLink" href="Analysis_2.html">2</a></li>
        <li><a class="menuLink" href="Analysis_3.html">3</a></li>
        <li><a class="menuLink" href="Analysis_4.html">4</a></li>
        <li><a class="menuLink" href="Analysis_5.html">5</a></li>
      </ul>
    </nav>
    <div class="analysis_div">aa</div>
  </body>
</html>
