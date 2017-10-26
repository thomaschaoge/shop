<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>购物车</title>
		<link rel="stylesheet" href="/jd/Application/Home/Common/Css//orderOk.css" />
		<script src="/jd/Application/Home/Common/Js//jquery-1.8.3.js"></script>
		<script src="/jd/Application/Home/Common/Js//orderOk.js"></script>
	</head>
	<body>
		<!--===============导入头部start==================-->
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
		<!--===============导入头部end==================-->

		<!--===========logo start=============-->
		<div class="w2" id="p-header">
		    <div id="logo">
		        <a href="http://www.jd.com/">
		            <img width="251" height="60" alt="京东 收银台" src="/jd/Application/Home/Common/Images//logo-pay.png">
				</a>
			</div>

			<?php if($payment == 0): ?><div class="stepflex">
		        <dl id="payStepFrist" class="first doing">
		            <dt class="s-num">1</dt>
		            <dd class="s-text">我的购物车<s></s>
		                <b></b>
		            </dd>
		            <dd></dd>
		        </dl>
		        <dl id="payStepNormal" class="normal doing">
		            <dt class="s-num">2</dt>
		            <dd class="s-text">填写核对订单信息<s></s>
		                <b></b>
		            </dd>
		        </dl>
		        <dl id="payStepLast" class="last doing">
		            <dt class="s-num">3</dt>
		            <dd class="s-text">成功提交订单<s></s>
		                <b></b>
		            </dd>
		        </dl>
			</div>
			<?php else: ?>
			<div class="stepflex">
		        <dl id="payStepFrist" class="first doing">
		            <dt class="s-num">1</dt>
		            <dd class="s-text">选择支付方式<s></s>
		                <b></b>
		            </dd>
		            <dd></dd>
		        </dl>
		        <dl id="payStepNormal" class="normal">
		            <dt class="s-num">2</dt>
		            <dd class="s-text">核对支付信息<s></s>
		                <b></b>
		            </dd>
		        </dl>
		        <dl id="payStepLast" class="last">
		            <dt class="s-num">3</dt>
		            <dd class="s-text">支付结果信息<s></s>
		                <b></b>
		            </dd>
		        </dl>
			</div><?php endif; ?>

			<div class="clr"></div>
		</div>

		<!--===========logo end=============-->
		
		
		<!--===========订单提交成功 start=============-->
		<div class="w2 main">

		<!--========货到付款 start===========-->
			<?php if($payment == 0): ?><div class="m m3 msop">
        		<div class="mt" id="success_tittle">
        			<s class="icon-succ02"></s>
        			<h3 class="ftx-02">感谢您，订单提交成功，订单号为：<?php echo ($orderId); ?></h3>
        		</div>
				<div class="mc" id="success_detail">	
					<input type="hidden" id="loadSuccessFlag" value="ok">
					<input type="hidden" id="skuIds" value="667762">
					<ul class="list-order">
			    		<li class="li-st">
							<div class="fore1">订单号：<a href="javascript:void(0)"><?php echo ($orderId); ?></a></div>
							<div class="fore2">货到付款：<strong class="ftx-01"><?php echo ($tprice); ?>元</strong></div>
					   		<div class="fore3">
					   			预计明日送达&nbsp;
							</div>
						</li>
					</ul>

					<div id="bookDiv"></div>
 					<p class="i-tips01">
						您的订单已经在处理中，发货后订单内容会显示承运人联系方式，如有必要您可以联系对方
             		</p>
             		<p class="i-tips01">
             			随时随地手机跟踪订单<a href="<?php echo U('Ucenter/index');?>">[查看详情]</a>
             		</p>
		 		</div>
				<div class="qr-code">
					<a class="code" href="javascript:void(0)">
						<img src="/jd/Application/Home/Common/Images//getImage.action.jpg" height="77px" widht="77px" alt="暂无图片">
					</a>
					<a class="sao" href="javascript:void(0)"></a>
				</div>
			</div>

			<div class="o-mb">完成支付后，您可以：
              	<a href="<?php echo U('Ucenter/index');?>">查看订单状态</a>&nbsp;&nbsp;
              	<a href="<?php echo U('Index/index');?>">继续购物</a>&nbsp;&nbsp;<a href="javascript:alert('暂时不支持')">问题反馈</a>
            </div>
        </div>
		<!--========货到付款 end===========-->

			<?php else: ?>
		<div class="w2 main">
			<div class="m mainbody">
				<div class="mc">
					<s class="icon-succ04"></s>
					<h3 class="orderinfo">订单提交成功，请您尽快付款！</h3>
					<ul class="list-orderinfo">
						<li>订单号：<strong class="ftx-01"><?php echo ($orderId); ?></strong></li>
						<li class="li-last">
							应付金额：
							<strong class="ftx-01"><?php echo ($tprice); ?></strong>
							元
						</li>
					</ul>
					<p class="mb-tip">
						 请您在提交订单后
						<span class="ftx-04">24小时</span>
						内完成支付，否则订单会自动取消。 
					</p>
					<div class="qr-code">
						<a class="code" href="javascript:void(0)">
							<img src="/jd/Application/Home/Common/Images//getImage.action.jpg" height="77px" widht="77px" alt="暂无图片">
						</a>
						<a class="sao" href="javascript:void(0)"></a>
					</div>
				</div>
			</div>
			<div id="mal01" class="m mainlist">
				<div class="mt extra-mt">
					<div class="extra">
						<a clstag="payment|keycount|paymentlink|help" href="http://help.jd.com/help/question-68.html" target="_blank">使用帮助</a>
					</div>
				</div>
				<div class="mc">
				
				
					<div class="banking">
						<h4 class="tit-sub">
							<strong>支付宝支付</strong>
							<span class="ftx-03">付款时需跳转至支付宝支付</span>
						</h4>
						<ul class="list-pay" id="E-bank">
							<li class="">
								<input type="hidden" value="banking">
								<div class="fore1">
									<input class="jdradio" type="radio" name="quickRadio" value="">
									<label>
										<img width="100" height="28" src="/jd/Application/Home/Common/Images//alipay.jpg" alt="">
									</label>
								</div>
								
								<div class="fore4">
									支付金额(元)：
									<strong class="ftx-01"><?php echo ($tprice); ?></strong>
								</div>
							</li>
						</ul>
					</div>
					<div class="btns">
						<a href="/jd/index.php/Cart/orderpay/oid/<?php echo ($orderId); ?>/price/<?php echo ($tprice); ?>"><b class="btn-next" >下一步</b></a>
						<a class="link-more" href="javascript:void()">使用其他银行卡支付</a>
					</div>
				</div>
			</div>

		</div>
		<div class="w2 jdfooter">
			<p>
			完成支付后，您可以：
				<a id="orderItemUrl" href="javascript:void()" target="_blank">查看订单详情</a>
				<span class="ftx-line">  |  </span>
				<a href="javascript:void()" target="_blank">支付调查</a>
			</p>
		</div><?php endif; ?>
		<div class="w2 jdhelp">
			<h3>付款帮助：</h3>
			<div class="help-box">
				<dl>
					<dt>1、 什么是京东白条？</dt>
					<dd>京东白条是京东推出的会员增值服务，会员购物时可以享受“先消费，后付款”的全新购物体验，还享有最长30天的延后付款期和灵活的分期付款方式。</dd>
				</dl>
				<dl>
					<dt>2、如何激活和使用白条？</dt>
					<dd>点击“立即激活”即跳转至网银钱包进行激活；激活成功后，您只需选购商品提交订单，在收银台选择 “京东白条”，输入支付密码，即可成功支付。</dd>
				</dl>

			</div>
		</div>
		<!--===========订单提交成功 end==============-->
		<div id="deleteBackground" class="thickdiv hide" style="width: 100%; height: 980px;"></div>
		<div class="thickbox hide" style="left: 499.5px; top: 250px; width: 300px; height: 200px;">
		<!--===========删除商品弹框 start==============-->
			<div class="thickwrap" id="deleteCartGoods" style="width: 300px;">
				<div class="thickcon" style="width: 200px; height: 200px; padding-left: 10px; padding-right: 10px;">
					<div class="m flexbox">
						<div class="mc">
							<div class="tip-box icon-box">
								<span class="warn-icon m-icon"></span>
								<div class="item-fore">
									<h3 class="ftx04">暂时不支持此功能</h3>
									<div class="op-btns">
										前往&nbsp;&nbsp;<a href="<?php echo U('Index/index');?>">首页</a>
									</div>
									<div class="op-btns">
										前往&nbsp;&nbsp;<a href="<?php echo U('Ucenter/index');?>">个人中心</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="paymentJumpMenu hide">
			<div class="">
				<div>暂时不支持此功能</div>
				<div>将在3秒后跳转，你也可以立即前往<a><span>个人中心</span></a>查看订单</div>
			</div>
		</div>

		<div class="clr"></div>
		<!--===============导入头部start==================-->
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
		<!--===============导入头部end==================-->
	</body>
</html>