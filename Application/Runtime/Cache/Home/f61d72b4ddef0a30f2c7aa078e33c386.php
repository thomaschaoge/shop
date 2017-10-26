<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css//register.css">
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
	<div style='clear:both'></div>
	<div id="logo">
		<a href='<?php echo U('Index/index');?>'>
		<img src="/jd/Public/Uploads/Images/jd_logo.png">
		</a>
	</div>
	<div id="jt">
		<ul>
			<li>个人用户</li>
			<!-- <li>企业用户</li>
			<li>International Customer</li> -->
		</ul>
	</div>
	<div id="main">
		<form action=<?php echo U("do_register");?> onsubmit="return false" method="post">
			<div class="input_style">
				<span><b style="mi">*</b>用户名</span>
				<div class="inputbox">
					<input type="text" name="uname">
				</div>
				<label id="r_name" class="foucs">4到20位字母，数字，下划线及“_”组成</label>
			</div>
			<div class="input_style">
				<span><b>*</b>请设置密码</span>
				<div class="inputbox">
					<input type="password" name="upwd">
				</div>
				<label style="line-height:18px" id="r_pass"class="foucs">6到20位字母，数字，下划线及“_”组成,不建议使用纯数字，纯字母，纯符号</label>
			</div>
			<div class="input_style">
				<span><b>*</b>请确认密码</span>
				<div class="inputbox">
					<input type="password" name="rupwd">
				</div>
				<label id="r_rpass"class="foucs">再次输入密码</label>
			</div>
			<div class="input_style">
				<span style="width:190px;"><b>*</b>:邮箱</span>
				<div class="inputbox">
					<input type="text" name="useremail">
				</div>
				<label id="r_phone"class="foucs">
				完成验证后你可以通过该邮箱登录和找回密码
				</label>
			</div>
			<div class="input_style">
				<span><b>*</b>验证码</span>
				<div style="width:115px" class="inputbox">
					<input  style="width:115px" type="text" name="code">
				</div>
				<div class="getcode">
					<img src="/jd/index.php/Register/get_code" onclick="this.src='/jd/index.php/Register/get_code?id='+Math.random()+1">
				</div>
				<label id="r_code"class="foucs">aaaaaaaaaaa</label>
			</div>
			<div class="input_style">
				<span><b></b></span>
				<input style="width:10px;height:10px;margin-top:10px;"
				type="checkbox" name="agrement">
				<label class="aggrement">我已阅读并同意
				<a class="agg" href="#">《京东用户注册协议》</a>
				</label>
				<label style="margin-left:0px"id="r_aggrement"class="foucs">aaaaaaaaaaaa</label>
			</div>
			<div class="input_style">
				<span><b></b></span>
				<input 
				style="background-color:#EC3F41;border:0 none;
				border-radius:5px;color:#fff;cursor:pointer;" 
				type="submit" value="注册">
			</div>
		</form>
		<div class="phone">
			<img src="/jd/Public/Uploads/Images/phone-bg.jpg">
		</div>
	</div>
	<div class='rfooter'>
		<ul>
			<li style="margin-left:100px;"><a href='#'>关于我们|</a></li>
			<li><a href='#'>联系我们|</a></li>
			<li><a href='#'>人才招聘|</a></li>
			<li><a href='#'>商家入驻|</a></li>
			<li><a href='#'>广告服务|</a></li>
			<li><a href='#'>手机京东|</a></li>
			<li><a href='#'>友情链接|</a></li>
			<li><a href='#'>销售联盟|</a></li>
			<li><a href='#'>京东社区|</a></li>
			<li><a href='#'>友情链接|</a></li>
			<li><a href='#'>京东公益|</a></li>
			<li style="margin-left:40%;">Copyright©2004-2014  京东JD.com 版权所有</li>
		</ul>
	</div>
</body>
<script type="text/javascript" src="/jd/Application/Home/Common/Js//Register.js"></script>
<script type="text/javascript" src="/jd/Application/Home/Common/Js//md5.js"></script>	
</html>