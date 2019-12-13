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

  <table border="1" style="border-color:#0000ff ; border-style:solid ; border-width:1px ;">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>login id</th>
      <th>login password</th>
      <th>active</th>
    </tr>
    <?php for ($i = 0; $i < count($user_info); $i++) : ?>
      <tr>
        <td><?= $user_info[$i]['id'] ?></td>
        <td><?= $user_info[$i]['name'] ?></td>
        <td><?= $user_info[$i]['email'] ?></td>
        <td><?= $user_info[$i]['lid'] ?></td>
        <td><?= $user_info[$i]['lpw'] ?></td>
        <td><?= $user_info[$i]['life_flg'] ?></td>
      </tr>
    <?php endfor; ?>
  </table>

</body>

</html>