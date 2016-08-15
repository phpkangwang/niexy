<?php
//http://www.jb51.net/callback.php
$appid = "wxc78c73cf4012af64"; 
$secret = "b5cb9f7a16b03f279cc2a0c60eba9d5b"; 
$code = $_GET["code"]; 
$get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$get_token_url); 
curl_setopt($ch,CURLOPT_HEADER,0); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 ); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
$res = curl_exec($ch); 
curl_close($ch); 
$json_obj = json_decode($res,true); 
print_r($json_obj);

?>