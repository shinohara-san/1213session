<?php
session_start();
include('../functions.php');
$pdo = connectToDb();

checkSessionId();

$logout = logout();

$sql = 'SELECT * FROM user_table ORDER BY id ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user_info = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/main.css">
  <title>会員情報</title>
</head>

<body>
  会員情報
  <?php for ($i = 0; $i < count($user_info); $i++) : ?>
    <div>id:　<?= $user_info[$i]['id'] ?></div>
    <div>name:　<?= $user_info[$i]['name'] ?></div>
    <div>email:　<?= $user_info[$i]['email'] ?></div>
    <div>login id:　<?= $user_info[$i]['lid'] ?></div>
    <div>login pass:　<?= $user_info[$i]['lpw'] ?></div>
    <div>0:active/1:non active　→　<?= $user_info[$i]['life_flg'] ?></div>
    <hr>
  <?php endfor; ?>
</body>

</html>