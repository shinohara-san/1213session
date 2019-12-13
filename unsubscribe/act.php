<?php
// var_dump($_POST);
// var_dump(intval($_POST['unsubscribe']));
// exit();
session_start();
include('../functions.php');

// var_dump($_SESSION['id']);
// exit();

$pdo = connectToDb();
$unsubscribe = intval($_POST['unsubscribe']);
$id = intval($_SESSION['id']);
// var_dump($id);
// exit();
// if (!isset($_POST['unsubscribe']) || $_POST['unsubscribe'] == ''){
if (!isset($unsubscribe) || $unsubscribe == '') {
  exit('値を入力してください。');
} elseif ($_POST['unsubscribe'] == 1) {
  $sql = 'UPDATE user_table SET life_flg = :a1 where id = :a2';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':a1', $unsubscribe, PDO::PARAM_INT);    //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a2', $id, PDO::PARAM_INT);    //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();
  header('Location: thanks.php');
} else {
  header('Location: ../index.php');
};
