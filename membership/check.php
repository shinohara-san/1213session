<?php
// var_dump($_POST);
// exit();
include('../functions.php');
$pdo = connectToDb();

$name = $_POST['name'];
$lid = $_POST['lid'];
$email = $_POST['email'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/main.css">
  <title>確認ページ</title>
</head>

<body>
  <p style="text-align:center">こちらでよろしいでしょうか</p>
  <form action="complete.php" method="post">
    <div>お名前</div>
    <div><?= $name ?></div>
    <input type="hidden" value="<?= $name ?>" name="name">
    <div>ログインID</div>
    <div><?= $lid ?></div>
    <input type="hidden" value="<?= $lid ?>" name="lid">
    <div>パスワード</div>
    <div>【表示されません】</div>
    <input type="hidden" value="<?= $lpw ?>" name="lpw">
    <div>Eメールアドレス</div>
    <div><?= $email ?></div>
    <input type="hidden" value="<?= $email ?>" name="email">
    <input type="hidden" value="<?= $kanri_flg ?>" name="kanri_flg">
    <input type="hidden" value="<?= $life_flg ?>" name="life_flg">

    <div>
      <button style="background:cyan"><a href="membership_input.php" style="text-decoration:none; color:white">戻る</button>
      <button type="submit">登録する</button>
    </div>
  </form>
</body>

</html>