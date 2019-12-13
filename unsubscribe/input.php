<?php
session_start();
include('../functions.php');
checkSessionId();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/main.css">
  <title>Document</title>
</head>

<body>
  <div>本当に退会しますか？</div>
  <form action="act.php" method="post">
    <label><input type="radio" name="unsubscribe" value="1">はい</label>
    <label><input type="radio" name="unsubscribe" value="2">いいえ</label>
    <button type="submit">送信</button>
  </form>
</body>

</html>