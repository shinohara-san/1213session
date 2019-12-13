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
  <p style="text-align:center">必要事項をご記入ください</p>
  <form action="check.php" method="post" enctype="multipart/form-data">
    <div>お名前</div>
    <div><input type="text" name="name" required></div>
    <div>ログインID</div>
    <div><input type="text" name="lid" required></div>
    <div>Eメールアドレス</div>
    <div><input type="email" name="email" required></div>
    <div>PASSWORD</div>
    <div><input type="password" name="lpw" required></div>
    <input type="hidden" name="kanri_flg" value="0">
    <input type="hidden" name="life_flg" value="0">
    <button type="submit">入力内容を確認</button>
    <!-- <div><input type="submit" value="入力内容を確認"></div> -->
  </form>
</body>

</html>