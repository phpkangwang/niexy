<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tool_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //连接数据库
        //
    }
    
    /**
     *  跳转
     */
    public function JumpUrl($url)
    {
        echo "<SCRIPT LANGUAGE=\"JavaScript\">location.href='$url'</SCRIPT>";
    }
    
    /**
     *  curl获取网址结果
     */
    public function getCurl($url)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res,true);
    }
}
?>