<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('WX_APP_ID',                     'wxc78c73cf4012af64');
define('WX_APP_SECRET',   'b5cb9f7a16b03f279cc2a0c60eba9d5b');

define('USER_COMMON',                             '1');//普通账号
define('USER_ADMIN',                              '2');//管理员帐号

define('USER_LOGIN_TYPE_WX',                      '1');//微信登录
define('USER_LOGIN_TYPE_REG',                     '2');//账号登录

define('GLOBAL_WX_ACCESTOKEN_NAME',               'accesstoken');//全局变量微信accesstoken的名称
define('GLOBAL_WX_ACCESTOKEN_time',               '5000');//全局变量微信accesstoken的过期时间为5000秒

define('RESOURCE',                                "resource/");//资源路径


/**
 * Created by PhpStorm.
 * User: HumphreyLiu
 * Date: 14-12-6
 * Time: 下午6:06
 */
class MY_Controller extends CI_Controller{

    Public function __consreuct(){
        Parent::__construct(); //调用父类的构造方法
    }

}