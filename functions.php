<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）
function connectToDb()
{
  $dbn = 'mysql:dbname=gsacfl02_01;charset=utf8;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('dbError:' . $e->getMessage());
  }
}

// テーブル名
$product = 'product';

//SQL処理エラー
function showSqlErrorMsg($stmt)
{
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
}

// function h($str)
// {
//   return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
// }

function checkSessionId()
{
  // ログイン失敗時の処理（ログイン画面に移動）
  // isset->値ありますか？という意味
  if (
    !isset($_SESSION['session_id']) ||
    $_SESSION['session_id'] != session_id()
  ) {
    header('Location: login.php'); // ダメだった場合ログイン画面へ移動
  } else {
    session_regenerate_id(true); // OKの場合セッションidの再生成
    $_SESSION['session_id'] = session_id(); // 新しくできたセッション変数を格納
  }

}

// menuを決める
// いろんなページで使いたい処理
function logout()
{
  $logout = '<div style="margin-left:10px"><a href="logout.php">ログアウト</a></div>';
  return $logout;
}
