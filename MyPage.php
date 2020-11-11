<!-- <?php session_start();?> -->
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <title>MY</title>
    <style type="text/css">
      .mypage_box {
        position: absolute;
        background-color: white;
        left: 50%;
        margin-top: 100px;
        margin-left: -250px;
        width: 500px;
        border: solid 1px black;
      }
    </style>
  </head>

  <body>
    <div class="mypage_box">
      <p
        style="
          font-size: 21px;
          font-weight: bolder;
          line-height: 3.3em;
          text-align: center;
        "
      >
        My Page
      </p>
      <div>
        <div style="display: flex">
          <p style="font-size: 18px; float: left">Profile</p>
          <input
            type="button"
            value="Modify"
            style="float: right; height: 30px; margin-top: 15px"
          />
        </div>
        <hr style="width: 494px; color: black; margin-top: -10px" />
        <p style="font-size: 17px; font-weight: bold; line-height: 2em">
          E-mail
          <!-- <?php echo $_SESSION['email'];?> -->
        </p>
        <p style="font-size: 17px; font-weight: bold; line-height: 2em">
          password
          <!-- <?php echo $_SESSION['password'];?> -->
        </p>
      </div>
      <div>
        <div style="display: flex">
          <p style="font-size: 18px; float: left">Your cafe</p>
          <input
            type="button"
            value="Add"
            style="float: right; height: 30px; margin-top: 15px"
          />
        </div>
        <hr style="width: 494px; color: black; margin-top: -10px" />
        <div>카페 들어갈 자리~ 여기에서 각각 수정하기, 삭제하기</div>
      </div>
      <!-- <?php } ?> -->
      <!-- 탈퇴 php 구현 안됨 -->
      <div>
        <button
          style="
            color: #ff3300;
            font-size: 18px;
            background-color: white;
            border: 0px;
          "
          onclick="location.href='Logout.php'"
        >
          회원 탈퇴
        </button>
        <button
          style="
            color: #ff3300;
            font-size: 18px;
            background-color: white;
            border: 0px;
          "
          onclick="location.href='Logout.php'"
        >
          로그아웃
        </button>
      </div>
    </div>
  </body>
</html>
