<?php
session_start();
include("functions.php");
check_session_id();

//セッションを変数に置き換え
$id = $_SESSION["id"];
$name = $_SESSION["name"];
$kana = $_SESSION["kana"];
$sex = $_SESSION["sex"];
$birthday = $_SESSION["birthday"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$is_dentist = $_SESSION["is_dentist"];
$is_technician = $_SESSION["is_technician"];
$is_admin = $_SESSION["is_admin"];
$is_deleted = $_SESSION["is_deleted"];

$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM users_table WHERE id=:id';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
   // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
   $error = $stmt->errorInfo();
   echo json_encode(["error_msg" => "{$error[2]}"]);
   exit();
} else {
   // 正常にSQLが実行された場合は指定の11レコードを取得
   // fetch()関数でSQLで取得したレコードを取得できる
   $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>マイページ（編集画面）</title>
</head>

<body>
   <form action="mypage_update.php" method="POST">
      <fieldset>
         <h1>My page（編集画面）</h1>
         <a href="mypage.php">戻る</a>
         <div class="form-item">
            <label for="">お名前</label>
            <input type="text" name="name" value="<?= $name ?>">
         </div>
         <div class="form-item">
            <label for="">カナ</label>
            <input type="text" name="kana" value="<?= $kana ?>">
         </div>
         <!-- <div class="radio-box">
            性別: <input type="text" name="sex" value="">
         </div> -->
         <div class="form-item">
            <label for="">生年月日</label>
            <input type="date" name="birthday" value="<?= $birthday ?>">
         </div>
         <div class="form-item">
            <label for="">メールアドレス（ユーザーID）</label>
            <input type="email" name="username" value="<?= $username ?>">
         </div>
         <div class="form-item">
            <label for="">パスワード</label>
            <input type="password" name="password" value="<?= $password ?>">
         </div>
         <input type="hidden" name="id" value="<?= $id ?>">
         <div>
            <button>登録</button>
         </div>
      </fieldset>
   </form>

</body>

</html>