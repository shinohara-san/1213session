<?php
session_start();
include('../functions.php');
checkSessionId();
// var_dump($_POST);
// var_dump($_FILES);
// exit();
// 入力チェック
if (
  !isset($_POST['product_name']) || $_POST['product_name'] == '' ||
  !isset($_POST['product_price']) || $_POST['product_price'] == '' ||
  !isset($_FILES['product_pic']) || $_FILES["product_pic"] == '' ||
  !isset($_POST['product_description']) || $_POST['product_description'] == ''
) {
  exit('ParamError');
}

//DB接続
$pdo = connectToDb();

//POSTデータ取得
$product_name = $_POST['product_name'];
$product_pic = file_get_contents($_FILES["product_pic"]["tmp_name"]);
$product_price = $_POST['product_price'];
$product_description = $_POST['product_description'];

$id = intval($_SESSION['id']);
// var_dump($id);
// exit();
// echo $product_price;
// exit();


//データ登録SQL作成
$sql = 'INSERT INTO product(product_id, product_name, product_pic, product_price, product_description, created_at, user_id)
VALUES(NULL, :a1, :a2, :a3, :a4, sysdate(), :a5)';
// :と;を間違えるな
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $product_name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $product_pic, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $product_price, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $product_description, PDO::PARAM_STR);
$stmt->bindValue(':a5', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後
if ($status == false) {
  showSqlErrorMsg($stmt);
  exit('エラーが発生しました。');
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/main.css">
  <title>商品登録完了</title>
</head>

<body>
  <div>商品の登録が完了しました</div>
  <div><a href="../index.php">商品一覧へ</a></div>
</body>

</html>