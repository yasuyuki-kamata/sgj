<?php
require_once './config.php';

class SGJFacebook extends Facebook {

  private $appid;
  private $secret;
  private $canvasUrl;
  private $scope;

  function __construct($appid, $secret, $canvasUrl, $scope){

    $this->appid = $appid;
    $this->secret = $secret;
    $this->canvasUrl = $canvasUrl;
    $this->scope = $scope;

    parent::__construct(
        array('appId' => $this->appid,
            'secret' => $this->secret));
  }

  // ログインチェック
  function loginCheck () {

    // ユーザーIDを取得
    $user =  parent::getUser();

    if ($user) {
      $login = true;
    }else{
      $login = false;
    }

    return $login;
  }

  // ログイン
  function login () {

    if ($this->loginCheck()) {
      return true;
    }else{
      // ログイン画面のURLを取得
      $url = parent::getLoginUrl(array("redirect_uri"=>$this->canvasUrl, "scope" => $this->scope));

      // ログイン画面にリダイレクトリ
      echo "<script>top.location.href= '$url';</script>";
      return $url;
    }
  }

  // ユーザー情報取得
  function getUserData() {

    if ($this->loginCheck()) {
      $me = parent::api('/me');
      return $me;
    }else{
      $this->login();
    }
  }

  // 友達情報取得
  // start, endで取得数を制御
  function getFriendsData($start=0, $end=10) {
  
    if ($this->loginCheck()) {
  
      // 友達のIDを取得
      $friends = parent::api('/me/friends');
  
      if ($friends) {
  
        $fdata = array();
    
        foreach ($friends as $f_key => $f_value) {
    
          if ($f_key == "data") {
      
            $fdatas = array_slice($f_value, $start, $end);
        
            foreach($fdatas as $friend){
          
              // 友達のデータを取得
              if ($friend['id']){
                $api = '/'.$friend['id'];
                array_push($fdata, parent::api($api));
              }
            }

          }elseif ($f_key == "paging") {
            // 人数が多い場合用の遷移？よく分からないので取りあえず放置
          }
        }
      }

      return $fdata;
    }else{
      $this->login();
    }
  }

  // ウォールに投稿
  function putWallMessage ($message) {

    $message = htmlspecialchars($message);
    $res = parent::api('/me/feed', 'post', array('message' => $message));

    if ($res) {
      return true;
    }else{
      return false;
    }
  }

  // アプリのリクエストを送信
  function putAppRequest ($message, $mode="all", $ids=null ) {
    
    $message = htmlspecialchars($message);
    
    $requests_url = "http://www.facebook.com/dialog/apprequests?app_id="
    .$this->appid."&redirect_uri=".urlencode($this->canvasUrl)
    ."&message=".$message;
    
    if ($mode=="to") {
       // 非対応
    }elseif($mode=="friend"){
      $requests_url .= "&filters=[¥'app_non_users¥']";
    }
    
    // ダイアログ
    echo ("<script>top.location.href='".$requests_url."';</script>");
  }
}