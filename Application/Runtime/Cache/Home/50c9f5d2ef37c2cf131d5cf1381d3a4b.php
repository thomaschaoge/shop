<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<title>登陆页</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="/jd/Application/Home/Common/Css//login.css" />
		<script src="/jd/Application/Home/Common/Js//jquery-1.8.3.js"></script>
		<script src="/jd/Application/Home/Common/Js//login.js"></script>
		<script>
			var address = "<?php echo U('Login/doLogin');?>";
			var addressIndex = "<?php echo U('Index/index');?>";
		</script>
	</head>
	<body>

	<!--==============logo start==============-->
		<div class="w">
			<div id="logo">
				<a href="#" />
					<img style="width:170px;height:60px" src="/jd/Application/Home/Common/Images//logo-2013-l.png" />
				</a>
				<b></b>
			</div>
		</div>
	<!--==============logo end==============-->
	<!--==============-主体start==============-->
		<form id="formlogin" method="post" onsubmit="return false;">
			<div class="w1" id="entry">
				<div class="mc" id="bgDiv">
					<div id="entry-bg"></div>
					<div class="form">
						<div class="item fore1">
							<span>邮箱/用户名/已验证手机</span>
							<div class="item-ifo">
								<input type="text" id="username" name="username" class="text" />
								<div class="checkInfoImg">&nbsp;</div>
								<div class="clr"></div>
								<div class="i-name ico"></div>
								<label id="loginname_succeed" class="blank invisible"></label>
								<label id="loginname_error" class="hide">
									<b></b>
								</label>
							</div>
						</div>
						<div class="clr"></div>
						<div class="item fore2">
							<span>密码</span>
							<div class="item-ifo">
								<input type="password" class="text" name="pwd" id="pwd" /><div class="checkInfoImg">&nbsp;</div>
								<div class="i-pass ico"></div>
								<div class="clr"></div>
								<label id="loginpwd_succeed" class="blank invisible succeed"></label>
								<label id="loginpwd_error" class="hide">		
									<b></b>
								</label>
							</div>
						</div>
						<div class="clr"></div>
						<div class="item fore3">
							<span>验证码</span>
							<div class="item-ifo">
								<input type="text" class="text1" name="authcode" id="authcode" />
								<div class="checkInfoImg1">&nbsp;</div>
								<div class="clr"></div>
								<div class="i-code ico1"><img src="/jd/index.php/Login/setCode" onclick="this.src=this.src+'?imgid='+Math.random()" /></div>
								<label id="authcode_succeed" class="blank invisible succeed"></label>
								<label id="authcode_error" class="hide"></label>								
							</div>
						</div>
						<div class="clr"></div>
						<div id="autoentry" class="item fore4">
							<div class="item-ifo">
								<input class="checkbox" type="checkbox" />
								<label class="mar">自动登录</label>
								<label><a href="<?php echo U('Findpwd/index');?>">忘记密码？</a></label>
								<div class="clr"></div>	
							</div>
						</div>
						<div class="item lgin-btn2014">
							<input id="loginsubmit" class="btn-img btn-entry" type="button" value="登陆" />
						</div>
					</div>

					<div class="coagent">
						<label class="ftx24">
							使用合作账号登陆
							<span class="clr"></span>
							
							<span class="btns">
								<a href="#">网易</a>
							</span>

							<span class="btns">
								<a href="#">人人</a>
							</span>
							<span class="btns">
								<a href="#">奇虎360</a>
							</span>
							<span class="btns">
								<a href="#">开心</a>
							</span>
							<span class="btns">
								<a href="#">豆瓣</a>
							</span>
							<span class="btns">
								<a href="#">搜狐</a>
							</span>
							<span class="btns">
								<a href="#">QQ</a>
							</span>
						</label>
					</div>

				</div>

				<div class="free-regist">
					<span>
						<a href="<?php echo U('Register/register');?>">免费注册</a>
					</span>
				</div>
			</div>
		</form>
		<div class="w1">
			<div id="mb-bg" class="mb"></div>
		</div>
		<div class="w">
			<div id="footer-2014">
				<div class="links">
					<a href="http://www.jd.com/intro/about.aspx" target="_blank" rel="nofollow">关于我们</a>
					|
					<a href="http://www.jd.com/contact/" target="_blank" rel="nofollow">联系我们</a>
					|
					<a href="http://zhaopin.jd.com/" target="_blank" rel="nofollow">人才招聘</a>
					|
					<a href="http://www.jd.com/contact/joinin.aspx" target="_blank" rel="nofollow">商家入驻</a>
					|
					<a href="http://www.jd.com/intro/service.aspx" target="_blank" rel="nofollow">广告服务</a>
					|
					<a href="http://app.jd.com/" target="_blank" rel="nofollow">手机京东</a>
					|
					<a href="http://club.jd.com/links.aspx" target="_blank">友情链接</a>
					|
					<a href="http://cps.jd.com/" target="_blank">销售联盟</a>
					|
					<a target="_blank" href="http://club.jd.com/">京东社区</a>
					|
					<a target="_blank" href="http://gongyi.jd.com">京东公益</a>
				</div>
				<div class="copyright">Copyright©2004-2014  京东JD.com 版权所有</div>
			</div>
		</div>

		<!--==============-主体end==============-->
	</body>
</html>