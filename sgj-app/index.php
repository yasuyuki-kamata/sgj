<?php

require_once 'SGJ_Facebook.php';

// クラス宣言
$SGJF = new SGJFacebook($config["appId"], $config["secret"],$config["canvasUrl"],$config["scope"]);

// ログイン
//$login_url = $SGJF -> login();

// ユーザー情報取得
//echo "<pre>";
//var_dump($SGJF->getUserData());
//echo "</pre>";

// 友達情報取得
//echo "<pre>";
//var_dump($SGJF->getFriendsData());
//echo "</pre>";

// ウォールに投稿
//$SGJF->putWallMessage ("test");

// アプリ招待
//$SGJF->putAppRequest ("test");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
</body>
</html>





