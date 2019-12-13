<?php
// session_start();
include('../functions.php');
$pdo = connectToDb();
// var_dump($_POST);
// exit();
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
// var_dump($lid);
// var_dump($lpw);
// exit();


if (!isset($lid) || !isset($lpw) || $lid == '' || $lpw == '') {
  exit('値を入力してください。');
  // header('Location: register_again.php');
}

// $statement = $dbh->prepare("SELECT * FROM user_table WHERE lid= :a1 AND lpw = :a2");
// $statement->bindValue(':a1', $lid, PDO::PARAM_STR);
// $statement->bindValue(':a2', $lpw, PDO::PARAM_STR);

// if($statement->execute()){
  $sql = 'UPDATE user_table SET life_flg = :a1 where lid = :a2 AND lpw = :a3 AND life_flg = :a4';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':a1', 0, PDO::PARAM_INT);    //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a2', $lid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a4', 1, PDO::PARAM_INT);    //Integer（数値の場合 PDO::PARAM_INT)

  $status = $stmt->execute();
  header('Location: complete.php');
// }else{
//   exit('正しい値を入力してください。');
// }


  // $sql = 'UPDATE user_table SET life_flg = :a where lid = :a2 AND lpw = :a3';

  // if (!$stmt->execute()) {
  //   // 正しいsql分でないとき
  //   showSqlErrorMsg($stmt);
  //   exit('正しい値を入力してください。');
    
  // } else {
  //   // 正しいsql文の時　
  //   $status = $stmt->execute();
  //   header('Location: register_again_complete.php');
  //   // $rs = $stmt->fetch();
  // };

