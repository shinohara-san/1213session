<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <title>ログイン</title>
</head>

<body>
  <h1>ログイン</h1>
  <div style="text-align:center"><a href="membership/input.php" style="color:black; text-decoration:none;"><i class="far fa-hand-point-right"></i> 会員登録はこちら</a></div>
  <form action="login_act.php" method="POST">
    <div>ID</div>
    <div><input type="text" style="width:100%" name="lid"></div>
    <div>Password</div>
    <div><input type="password" style="width:100%" name="lpw"></div>
    <div style="width:75%; margin: 0 auto; text-align: center;"><button type="submit">送信</button></div>
    <div style="text-align:center"><a href="reregister/input.php" style="color:black; text-decoration:none;"><i class="far fa-hand-point-right"></i> 再登録はこちら</a></div>

  </form>
  <a href="secret/login.php" style="color:aliceblue; cursor:pointer">aaa</a>
</body>

</html>