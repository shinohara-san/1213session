<?php
session_start();
include('../functions.php');
checkSessionId();
$logout = logout();

$id = $_GET['id'];
$pdo = connectToDb();

$user_id = intval($_SESSION['id']);
// var_dump($user_id);
// exit();
$login_user = json_encode($user_id);



//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM product WHERE product_id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status == false) {
  // エラーのとき
  showSqlErrorMsg($stmt);
} else {
  // エラーでないとき
  $rs = $stmt->fetch();
}

// $seller = intval($rs['user_id']);
$seller = $rs['user_id'];

// $seller = json_encode($seller);
// var_dump($seller);
// exit();
// fetch()で1レコードを取得して$rsに入れる
// $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
// var_dump()で見てみよう

// }
// いいね数カウント
// SELECT product_id, COUNT(id) AS cnt FROM like_table1210 GROUP BY product_id
// テーブル結合
// SELECT * FROM product LEFT OUTER JOIN (SELECT product_id, COUNT(id) AS cnt FROM like_table1210 GROUP BY product_id) AS likes ON product.product_id = likes.product_id
// $sql = 'SELECT * FROM product LEFT OUTER JOIN (SELECT product_id, COUNT(id) AS cnt FROM like_table1210 GROUP BY product_id) AS likes ON product.product_id = likes.product_id';
// $stmt = $pdo->prepare($sql);
// $status = $stmt->execute();


// if ($status == false) {
//   showSqlErrorMsg($stmt);
// } else {
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);}
// while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
// $view = '';
//   $view .= '<div class="product">';
//   $view .= '<div class="product_title">'. $result['product_name'] .'</div>';
//   $view .= '<div><img class="product_img" src=product.php?id=' . $result['product_id'] . 'alt="商品画像"></div>';
//   $view .= '<div class="product_price">'. $result['product_price']. '円</div>';
//   $view .= '<div class="product_description">'. $result['product_description'].'</div>';
//   $view .= '<div class="flex">
//         <button>
//           <a href="purchase.php?id='. $result['product_id'].'" style="color:white; text-decoration:none;">購入する</a>
//         </button>';
//   $view .= '<button class="edit"><a style="color:white; text-decoration:none;" href="edit.php?id='.$result['product_id'].'">編集</a></button>';
//   $view .= '<button style="background:cyan">
//           <a style="color:white; text-decoration:none" href="like_insert.php?user_id='. $user_id . '&product_id=' .$result['product_id'].'">いいね' . $result['cnt'].'</a>
//         </button>';
//   $view .= '</div>

//     </div>';

// var_dump($result);
// exit();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">
  <title>商品</title>
</head>

<body>
  <div style="float:right"><a href="../logout.php">ログアウト</a></div>
  <div class="product">
    <div class="product_title"><?= $rs['product_name'] ?></div>
    <div>
      <img class="product_img" src="picture.php?id=<?= $rs['product_id'] ?>" alt="商品画像">
    </div>
    <div class="product_price"><?= $rs['product_price'] ?>円</div>
    <div class="product_description"><?= $rs['product_description'] ?></div>
    <div class="flex">
      <button id="purchase">
        <a href="../purchase/input.php?id=<?= $rs['product_id'] ?>" style="color:white; text-decoration:none;">購入する</a>
      </button>
      <button id="edit" class="edit" style="display:none"><a style="color:white; text-decoration:none;" href="edit.php?id=<?= $rs['product_id'] ?>">編集</a></button>
      <button style="background:cyan"><a href="../index.php" style="color:white; text-decoration:none">一覧へ戻る</a></button>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    let login_user = <?php echo $login_user ?>;
    let seller = <?= $rs['user_id'] ?>;
    // console.log('あああ');
    // console.log(login_user);
    // console.log(seller);

  if(login_user == seller){
    $('#edit').css('display', 'block');
    $('#purchase').css('display', 'none');
  };
  </script>
</body>

</html>