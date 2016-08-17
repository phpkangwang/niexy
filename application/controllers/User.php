<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends My_Controller {
    public function __construct()
    {
        error_reporting(0);
        //连接数据库
        parent::__construct();
        $this->load->model("User_model","user");
        $this->load->model("Tool_model","tool");
        $this->load->helper('url');
        $this->load->library('session');
    }
    
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $REDIRECT_URI = "http://bxu2340840075.my3w.com/index.php/user/WxCallBack";
	    $scope='snsapi_base';
	    $scope='snsapi_userinfo';//需要授权
	    $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.WX_APP_ID.'&redirect_uri='.urlencode($REDIRECT_URI).'&response_type=code&scope='.$scope.'&state=1#wechat_redirect';
	    header("Location:".$url);
	}
	
	public function WxCallBack()
	{
	    $code = $_GET["code"];
	    $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.WX_APP_ID.'&secret='.WX_APP_SECRET.'&code='.$code.'&grant_type=authorization_code';
	    $json_obj = $this->tool->getCurl($get_token_url);
	    
	    $openid = $json_obj['openid'];
 	    $rs = $this->user->getUserByWxid($openid);
 	    if($rs == "")
 	    {
 	        //微信登录的账号不存在，创建一个新账户
 	        $accessToken = $this->user->getWxAccessToken();
 	        //获取用户的微信信息
 	        $wxInfo = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$accessToken.'&openid='.$openid.'&lang=zh_CN';
 	        $wxInfo_obj = $this->tool->getCurl($wxInfo);
 	        //创建一个新用户
 	        $rs = $this->user->createUserByWx($wxInfo_obj);
 	        if($rs['code'] == 1)
 	        {
 	            //创建用户成功，跳转首页
 	            $_SESSION['userid'] = $rs['data']['id'];
 	            $url = base_url().'index.php/site/index';
 	            $this->tool->jumpUrl($url);
 	        }else{
 	            //创建用户失败
 	        }
 	    }else{
 	        //登录的用户添加一个session
 	        $_SESSION['userid'] = $rs['id'];
 	        
 	        $url = base_url().'index.php/site/index';
 	        $this->tool->jumpUrl($url);
 	    }
	}
	
	//用户基本信息
	public function baseInfo()
	{
	    $userObj = $this->user->getUserByid($_SESSION['userid']);
	    //$userObj = $this->user->getUserByid(4);
	    $this->load->view('site/header.php');
	    $this->load->view('user/info',array('user'=>$userObj));
	    $this->load->view('site/footer.php');
	}
	
}
