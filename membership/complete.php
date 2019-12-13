<?php
// var_dump($_POST);
// exit();
include('../functions.php');
//DB接続
$pdo = connectToDb();

$name = $_POST['name'];
$email = $_POST['email'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];

//データ登録SQL作成
$sql = 'INSERT INTO user_table(id, name, email, lid, lpw, kanri_flg, life_flg)
VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :a6)';
// :と;を間違えるな
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $email, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a5', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':a6', $life_flg, PDO::PARAM_INT);
$status = $stmt->execute();

// inputの数値は文字列らしいけどここでは無問題のよう

// $str = $name . ',' . $lid . ',' . $email . ',' . $lpw . ',' . $kanri_flg . ',' . $life_flg;
// // echo $str;
// // exit();
// $file = fopen('data/user_data.csv', 'a');
// flock($file, LOCK_EX);
// fwrite($file, $str . "\n");
// flock($file, LOCK_UN);
// fclose($file);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/main.css">
  <title>登録完了</title>
</head>

<body>
  <p>ユーザー登録が完了しました</p>
  <p><a href="../login.php">ログインする</a></p>

</body>

</html>