<?php
session_start();
include("functions.php");
check_session_id();


?>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>マイページ</title>
</head>

<body>
   <fieldset>
      <h1>My page</h1>
      <?php
      if ($_SESSION["is_dentist"] == 1) {
         echo '<a href="dentist_top.php">歯科医師top</a>';
      } else {
         echo '<a href="technician_top.php">技工士top</a>';
      }
      ?>
      <a href="logout.php">Sign out</a>
      <div class="mypage">
         <div class="left-box">
            <div class="box-item">お名前</div>
            <div class="box-item">カナ</div>
            <div class="box-item">性別</div>
            <div class="box-item">生年月日</div>
            <div class="box-item">ユーザー名</div>
            <div class="box-item">パスワード</div>
         </div>
         <div class="right-box">
            <div class="box-item"><?= $_SESSION["name"] ?></div>
            <div class="box-item"><?= $_SESSION["kana"] ?></div>
            <div class="box-item">
               <?php
               if ($_SESSION["sex"] == 0) {
                  echo '<div>男</div>';
               } else {
                  echo '<div>女</div>';
               }
               ?>
            </div>
            <div class="box-item"><?= $_SESSION["birthday"] ?></div>
            <div class="box-item"><?= $_SESSION["username"] ?></div>
            <div class="box-item"><?= $_SESSION["password"] ?></div>
         </div>
      </div>
      <a href="mypage_edit.php">編集</a>
   </fieldset>
   <style>
      @import url(https://fonts.googleapis.com/css?family=Open+Sans:400);

      body {
         background: #d4dde1;
         color: #5e5e5e;
         font: 400 87.5%/1.5em 'Open Sans', sans-serif;
         line-height: 3em;
         font-size: 1.2em;
      }

      fieldset {
         background: #fafafa;
         border: none;
         text-align: center;
      }

      a {
         color: #f16272;
         padding: 0 30px;
      }

      .mypage {
         display: flex;
         justify-content: center;
      }

      .right-box {
         margin-left: 40px;
      }
   </style>
</body>

</html>