<?php

// PHP SDKの読み込み
require_once './src/facebook.php';

// プロトコルの判別
if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]){
  $protocol = "https://";
}else{
  $protocol = "http://";
}

// キャンパスページのURL
$config["canvasUrl"] = $protocol."apps.facebook.com/sgj-app/";

// アプリケーションID
$config["appId"] = '308119035902401';

// シークレットキー
$config["secret"] = '44ac80a30b199be20b6943f17bb0f62b';

// 全てのパーミッション
//http://developers.facebook.com/docs/reference/api/permissions/#extended_perms
$config["scope"] = array(
  // USER
  "user_about_me",
  "user_activities",
  "user_birthday",
  "user_checkins",
  "user_education_history",
  "user_events",
  "user_groups",
  "user_hometown",
  "user_interests",
  "user_likes",
  "user_location",
  "user_notes",
  "user_online_presence",
  "user_photo_video_tags",
  "user_photos",
  "user_questions",
  "user_relationships",
  "user_relationship_details",
  "user_religion_politics",
  "user_status",
  "user_videos",
  "user_website",
  "user_work_history",
  "email",
  // FRIENDS
  "friends_about_me",
  "friends_activities",
  "friends_birthday",
  "friends_checkins",
  "friends_education_history",
  "friends_events",
  "friends_groups",
  "friends_hometown",
  "friends_interests",
  "friends_likes",
  "friends_location",
  "friends_notes",
  "friends_online_presence",
  "friends_photo_video_tags",
  "friends_photos",
  "friends_questions",
  "friends_relationships",
  "friends_relationship_details",
  "friends_religion_politics",
  "friends_status",
  "friends_videos",
  "friends_website",
  "friends_work_history",
  // Extended
  "read_friendlists",
  "read_insights",
  "read_mailbox",
  "read_requests",
  "read_stream",
  "xmpp_login",
  "ads_management",
  "create_event",
  "manage_friendlists",
  "manage_notifications",
  "offline_access",
  "user_online_presence",
  "friends_online_presence",
  "publish_checkins",
  "publish_stream",
  "rsvp_event",
  "publish_actions"
);


?>