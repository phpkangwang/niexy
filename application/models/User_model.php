<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //连接数据库
        //
    }

    /**
     * 根据微信id获取用户信息
     * @param unknown $Wxid
     */
    public function getUserByWxid($openid){
        $this->load->database();
        $res = $this->db->select("*")//查找的字段
        	            ->from("user")//数据表名
        	            ->where(array("login_type"=>USER_LOGIN_TYPE_WX,"login_type_id"=>$openid))
        	            ->get();//获取数据
	    return $res->row_array();
    }
    
    /**
     * 根据id获取用户信息
     * @param unknown $Wxid
     */
    public function getUserByid($id){
        $this->load->database();
        $res = $this->db->select("*")//查找的字段
        ->from("user")//数据表名
        ->where(array("id"=>$id))
        ->get();//获取数据
        return $res->row_array();
    }
    
    /**
     *  创建一个微信用户
     */
    public function createUserByWx($wxInfo_obj)
    {
        $data = array(
            'login_type'    => USER_LOGIN_TYPE_WX,
            'login_type_id' => $wxInfo_obj['openid'],
            'nickname'      => $wxInfo_obj['nickname'],
            'sex'           => $wxInfo_obj['sex'],
            'province'      => $wxInfo_obj['province'],
            'headimgurl'    => $wxInfo_obj['headimgurl'],
            'last_ip'       => $this->input->ip_address(),
            'last_login_time' => time(),
            'create_time'   => time()
        );
        if($this->db->insert('user', $data)){
            $reInfo['code'] = 1;
            $reInfo['message'] = "";
            $reInfo['data'] = $data;
            return $reInfo;
        }else {
            $reInfo['code'] = -1;
            $reInfo['message'] = "创建用户失败";
            $reInfo['data'] = "";
            return $reInfo;
        }
    }
    
    /**
     *   获取wx access_token
     */
    public function getWxAccessToken()
    {
        $this->load->model("Tool_model","tool");
        $this->load->database();
        $res = $this->db->select("*")//查找的字段
        ->from("global")//数据表名
        ->where(array("name"=>GLOBAL_WX_ACCESTOKEN_NAME))
        ->get();//获取数据
        $rs = $res->row_array();
        if($rs == "" || (time() - $rs['update_time']) > GLOBAL_WX_ACCESTOKEN_time)
        {
            //加入全局变量没有 GLOBAL_WX_ACCESTOKEN_NAME 这个数据则从微信重新获取
            $getAccessToken = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.WX_APP_ID.'&secret='.WX_APP_SECRET;
            $accessToken = $this->tool->getCurl($getAccessToken);
            //获取到新的access_token存入数据库
            //假如有数据，先删除数据
            $data = array(
                'name' => GLOBAL_WX_ACCESTOKEN_NAME,
                'value' => $accessToken['access_token'],
                'update_time' => time()
            );
            if($rs == ""){
                $this->db->insert('global', $data);
            }else{
                $where = array('name' => GLOBAL_WX_ACCESTOKEN_NAME);
                $this->db->update('global', $data, $where);
            }
            return $accessToken['access_token'];
        }else{
            return $rs['value'];
        }
    }
}
?>