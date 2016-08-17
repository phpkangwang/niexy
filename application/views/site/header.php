<?php
    $this->load->helper('url');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title>拾香得味</title>
<meta name="keywords" content="微信点餐系统 微信点菜 微信外卖" />
<meta name="description" content="微信点餐系统 微信点菜 微信外卖" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />  
<meta content="yes" name="apple-mobile-web-app-capable" />  
<meta content="black" name="apple-mobile-web-app-status-bar-style" />  
<meta content="telephone=no" name="format-detection" />
<script src="<?= base_url().RESOURCE?>js/jquery.1.8.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url().RESOURCE?>js/jquery.cookie.js"></script>      
<script src="<?= base_url().RESOURCE?>js/js.js" type="text/javascript"></script>
<script src="<?= base_url().RESOURCE?>js/coke.js" type="text/javascript"></script>

<link href="<?= base_url().RESOURCE?>css/common.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="header">
  
    <div class="hewarp">
		<ul>
			<li class="index">
				<a href="<?= base_url()."index.php/site/index"?>" title="店铺首页" >
				<img src="<?= base_url().RESOURCE?>images/top1.png" alt=""/>
				 首 页
				</a>
			</li>
            
            	<li class="history">
			<a href="<?= base_url()."index.php/prolist/index"?>" title="产品列表">
				<img src="<?= base_url().RESOURCE?>images/top4.png" alt=""/>
				我要点外卖 
			  </a>
			</li>
			
            
			<li class="narcar">
			  <a href="<?= base_url()."index.php/car/index"?>"  title="我的购物车" >
				<img src="<?= base_url().RESOURCE?>images/top3.png" alt=""/>
				购物车
			 
			  <span class="count">0</span>  <!-- 加入购物车的数量 --> </a>
			</li>
		
            
            <li>
			<a href="<?= base_url()."index.php/user/baseInfo"?>"  title="会员中心">  
				<img src="<?= base_url().RESOURCE?>images/top2.png" alt=""/>
				会员中心
			  </a>
			</li>
            
		   <li class="classify">
			<span>
                <a href="javascript:void(0);" onclick="show();">
				<img src="<?= base_url().RESOURCE?>images/top5.png" alt="">
				更多分类</a>
			</span> 
			</li>
		</ul>
	</div>
  
 </div>
 
