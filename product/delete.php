<?php
include('../functions.php');
$pdo = connectToDb();

$sql = 'DELETE FROM product WHERE product_id = :product_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':product_id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
unset($pdo);
// header('Location: ../index.php');
// exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/main.css">
  <title>Document</title>
</head>

<body>
  <div>商品を削除しました。</div>
  <div><a href="../index.php">一覧へ戻る</a></div>
</body>

</html>