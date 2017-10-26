<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE  html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>找回密码</title>
	<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css//findpwd.css">
	<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/footer.css"/>
<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/header.css"/>
	<script type="text/javascript" src="/jd/Application/Home/Common/Js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/jd/Application/Home/Common/Js/header.js"></script>
	<script type="text/javascript">
	$(function(){
		$('#top_header .item').hover(function(){
			$(this).addClass('hover');
		},function(){
			$(this).removeClass('hover');
		})

		$('#top_header .item .close').click(function(){
			$(this).parent().parent().removeClass('hover');
		})

		$('#nav_2014').hover(function(){
			$('#nav_2014 .sub_nav').css('display','block');
		},function(){
			$('#nav_2014 .sub_nav').css('display','none');
		})
	})
	
	</script>
</head>
<body>
	<!--需要把头部分开-->
	<div id="top_nav">
		<div class="top_nav_con">
			<ul>
				<li class="favorite">
					<div><a href="javascript:;">收藏京东</a></div>
				</li>
				<li class="location">
					<div class="address"><b></b><strong>北京</strong><a href="#">[更换]</a></div>
					<ul class="province">
						<li><a href="#none" data-id="#">北京</a></li>
						<li><a href="#none" data-id="#">上海</a></li>
						<li><a href="#none" data-id="#">天津</a></li>
						<li><a href="#none" data-id="#">重庆</a></li>
						<li><a href="#none" data-id="#">河北</a></li>
						<li><a href="#none" data-id="#">山西</a></li>
						<li><a href="#none" data-id="#">河南</a></li>
						<li><a href="#none" data-id="#">辽宁</a></li>
						<li><a href="#none" data-id="#">吉林</a></li>
						<li><a href="#none" data-id="#">黑龙江</a></li>
						<li><a href="#none" data-id="#">内蒙古</a></li>
						<li><a href="#none" data-id="#">江苏</a></li>
						<li><a href="#none" data-id="#">山东</a></li>
						<li><a href="#none" data-id="#">安徽</a></li>
						<li><a href="#none" data-id="#">浙江</a></li>
						<li><a href="#none" data-id="#">福建</a></li>
						<li><a href="#none" data-id="#">湖北</a></li>
						<li><a href="#none" data-id="#">湖南</a></li>
						<li><a href="#none" data-id="#">广东</a></li>
						<li><a href="#none" data-id="#">广西</a></li>
						<li><a href="#none" data-id="#">江西</a></li>
						<li><a href="#none" data-id="#">四川</a></li>
						<li><a href="#none" data-id="#">海南</a></li>
						<li><a href="#none" data-id="#">贵州</a></li>
						<li><a href="#none" data-id="#">云南</a></li>
						<li><a href="#none" data-id="#">西藏</a></li>
						<li><a href="#none" data-id="#">陕西</a></li>
						<li><a href="#none" data-id="#">甘肃</a></li>
						<li><a href="#none" data-id="#">青海</a></li>
						<li><a href="#none" data-id="#">宁夏</a></li>
						<li><a href="#none" data-id="#">新疆</a></li>
						<li><a href="#none" data-id="#">台湾</a></li>
						<li><a href="#none" data-id="#">香港</a></li>
						<li><a href="#none" data-id="#">澳门</a></li>
						<li><a href="#none" data-id="#">钓鱼岛</a></li>
						<li><a href="#none" data-id="#">海外</a></li>
						<span class="p_close"></span>
					</ul>
				</li>
			</ul>
			<ul class="top_nav_r">
				<li>
					<span>您好！<span style="color:red;"><?php echo $_SESSION['user']['uname'];?></span> 欢迎来到京东！</span>
					<?php
 if(empty($_SESSION['user'])){ echo '<a href="'.U('Login/index').'">[登录]</a>'; }else{ echo '<a href="'.U('Login/logoutHeader').'">[退出]</a>'; } ?>
					<a href="<?php echo U('Register/register');?>">[免费注册]</a>
					<s class="separator"></s>
				</li>
				<li>
					<?php if(!empty($_SESSION['user'])){ echo '<a href="'.U('Ucenter/index',array('uid'=>$_SESSION['user']['userId'])).'">我的订单</a>
					<s class="separator"></s>'; }?>
				</li>
				<li class="vip">
					<i></i>
					<a href="#">会员俱乐部</a>
					<s class="separator"></s>
				</li>
				<li class="apps">
					<i></i>
					<a href="#" class="mobile">手机京东</a>
					<b></b>
					<s class="separator"></s>
					<ul>
						<li>
							<div class="web_app">
								<div class="save">
								</div>
								<div class="jd_app">
									<div class="qr_img">
										<img src="/jd/Application/Home/Common/Images/web_ma.png" width="76px" height="76px">
									</div>
									<div class="down_app">
										<strong>京东客户端</strong>
										<a class="apple_app"></a>
										<a class="android_app"></a>
									</div>
								</div>
								<div class="jd_bank_app">
									<div class="qr_img">
										<img src="/jd/Application/Home/Common/Images/bank_ma.png" width="76px" height="76px">
									</div>
									<div class="down_app">
										<strong>网银钱包客户端</strong>
										<a class="apple_app"></a>
										<a class="android_app"></a>
									</div>
								</div>
							</div>
							<div>
								<div class="bank_app">
								</div>
								
							</div>
						</li>
					</ul>
				</li>
				<li class="cus_services">
					<a href="#">客户服务</a>
					<b></b>
					<s class="separator"></s>
					<ul>
						<li><a href="#">帮助中心</a></li>
						<li><a href="#">售后服务</a></li>
						<li><a href="#">在线客服</a></li>
						<li><a href="#">投诉中心</a></li>
						<li><a href="#">客服邮箱</a></li>
					</ul>
				</li>
				<li class="sites_nav">
					<a href="#">网站导航</a>
					<b></b>
					<ul>
						<li style="display:none;">
							<strong>特色栏目</strong>
							<ul>
								<li>京东通信</li>
								<li>校园之星</li>
								<li>视频购物</li>
								<li>京东社区</li>
								<li>在线读书</li>
								<li>装机大师</li>
								<li>京东E卡</li>
								<li>家装城</li>
								<li>搭配购</li>
								<li>我喜欢</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id='find-log'>
		<img src='/jd/Application/Home/Common/Images//logo-2013.png'>
	</div>
	<div id='findpwd'>
		<div class='find-title'>
			<h3>找回密码</h3>
		</div>
		<div class='mc'>
			<div class="step">
				<ul>
					<li class="one cur">填写账户名</li>
					<li class="two">验证身份</li>
					<li class="three">设置新密码</li>
					<li class="four">完成</li>
				</ul>
			</div>
			<div class="form">
				<div class="item">
					<span>账户名：</span>
					<div class="f">
						<input type="text" name='uname' placeholder='用户名/邮箱'>
						<label id='name-error'></label>
					</div>
				</div>
				<div class="item">
					<span>验证码: </span>
					<div class="f" style="width:100px;">
						<input type="text" name='code' style="width:100px;">
						<label id='code-error'></label>
					</div>
					<div class="getcode">
							<img src="/jd/index.php/Findpwd/get_code" onclick="this.src='/jd/index.php/Findpwd/get_code?id='+Math.random()+1">
					</div>
					<label style="line-height:30px;">点击图片更换验证码</label>
				</div>
				<div class="item">
					<span>&nbsp;</span>
					<div class="f" style="width:69px;border:none">
						<input class='b'type="button" value="下一步">
					</div>
				</div>
			</div>
		</div>
	</div>
	<span style="clear:both;"></span>
<div class="w">
	<div id="footer">
		<div class="links">
			<a>关于我们</a>|<a href="#">联系我们</a>|<a href="#">人才招聘</a>|<a href="#">商家入驻</a>|<a href="#">广告服务</a>|<a href="#">手机京东</a>|<a href="<?php echo U('Link/index');?>">友情链接</a>|<a href="#">销售联盟</a>|<a href="#">京东社区</a>|<a href="#">京东公益</a>
		</div>
		<div class="copyright">
			北京市公安局朝阳分局备案编号110105014669&nbsp;&nbsp;|&nbsp;&nbsp;  京ICP证070359号&nbsp;&nbsp;|&nbsp;&nbsp;  互联网药品信息服务资格证编号(京)-非经营性-2011-0034<br/>
			音像制品经营许可证苏宿批005号&nbsp;&nbsp;|&nbsp;&nbsp;  出版物经营许可证编号新出发(苏)批字第N-012号&nbsp;&nbsp;|&nbsp;&nbsp;  互联网出版许可证编号新出网证(京)字150号<br/>
			网络文化经营许可证京网文[2011]0168-061号  Copyright © 2004-2014  京东JD.com 版权所有<br/>
			京东旗下网站：<a href="#">English Site</a>
		</div>
		<div class="authentication">
			<a href="#"><img src="/jd/Application/Home/Common/Images/authentication_1.gif" alt=""></a>
			<a href="#"><img src="/jd/Application/Home/Common/Images/authentication_2.gif" alt=""></a>
			<a href="#"><img src="/jd/Application/Home/Common/Images/authentication_3.png" alt=""></a>
			<a href="#"><img src="/jd/Application/Home/Common/Images/authentication_4.png" alt=""></a>
		</div>
	</div>
</div>
	<script src='/jd/Application/Home/Common/Js//findpwd/step1.js'></script>
</body>
</html>