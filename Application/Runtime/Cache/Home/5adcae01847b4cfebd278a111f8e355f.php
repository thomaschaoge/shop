<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>购物车</title>
		<link rel="stylesheet" href="/jd/Application/Home/Common/Css//cart.css" />
		<script src="/jd/Application/Home/Common/Js//jquery-1.8.3.js"></script>
		<script src="/jd/Application/Home/Common/Js//cart.js"></script>
		<script>

			//定义路径
			var imagesSuccess = "<img src='/jd/Application/Home/Common/Images//message-success.png' />";
			var imagesError = "<img src='/jd/Application/Home/Common/Images//message-error.png' />";
			
		</script>
	</head>
	<body>

		<!--=========导入头 start=============-->
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
		<!--=========导入头 end=============-->

		<!--===========logo start=============-->
		<div class="w2 w1 th clear-fix">
			<div id="logo">
				<a href="<?php echo U('Index/index');?>">
					<img src="/jd/Application/Home/Common/Images//logo-201305.png" alt="返回京东商城首页" />
				</a>
			</div>
			<div class="progress clearfix">
				<ul class="progress-1">
					<li class="step-1">1.我的购物车</li>
					<li>2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
		<!--===========logo end=============-->
		<!--===========购物车内容 start=============-->
		<div class="w2 cart">
			<div class="cart-hd group">
				<h2>我的购物车</h2>
			</div>
			<div id="show">

				<!--==========购物车没商品时显示 start=========-->
				<?php if(empty($list)): ?><div class="cart-empty">
						<div class="message">
							<p>
								购物车内暂时没有商品，您可以
								<a href="<?php echo U('index/index');?>">去首页</a>
								挑选喜欢的商品
							</p>
						</div>
					</div>

				<?php else: ?>
				<!--==========购物车没商品时显示 end=========-->
					<div class="cart-inner">
						<div class="cart-thead clearfix">
							<div class="column t-checkbox form1">
								<input type="checkbox" name="toggle-checkboxes" id="toggle-checkboxes" checked="checked" />
								<label>全选</label>
							</div>
							<div class="column t-goods">商品</div>
							<div class="column t-price">京东价</div>
							<div class="column t-promotion">优惠</div>
							<div class="column t-inventorv">
								<select id="selectP" pId="1" name="diquId">
									<?php if(is_array($diqu)): foreach($diqu as $key=>$val): ?><option value="<?php echo ($val["areaid"]); ?>"><?php echo ($val["diqu"]); ?></option><?php endforeach; endif; ?>
								</select>
							</div>
							<div class="column t-quantity">数量</div>
							<div class="column t-action">操作</div>
						</div>
						
						<!--======循环开始=========-->
						<?php if(is_array($list)): foreach($list as $key=>$vo): if(($key != 'tsum') AND ($key != 'tprice') ): ?><div id="prodId<?php echo ($vo["prodId"]); ?>" class="cart-tbody">
									<div class="item-meet meet-give">
										<div class="item item_selected  item-last">
											<div class="item_form clearfix">
												<div class="cell p-checkbox">
													<input class="checkbox" type="checkbox" name="boxs" value="<?php echo ($vo["prodId"]); ?>" checked="checked" />
												</div>

												<div class="cell p-goods">
													<div class="p-img">
														<a href="<?php echo U('Details/details?id='.$vo['prodId']);?>" target="_blank">
															<img src="/jd/Public/Uploads/<?php echo ($vo["simimg"]); ?>">
														</a>
													</div>
													<div class="p-name">
														<a href="<?php echo U('Details/details?id='.$vo['prodId']);?>" target="_blank"><span class="promise411"><?php echo ($vo["prodName"]); ?></span></a>

													</div>
												</div>
												
												<div class="cell p-price">
													<span class="price">￥<?php echo ($vo["price1"]); ?></span>
												</div>
												<div class="cell p-promotion">
													<span class="price preferential">￥<span><?php echo ($vo["price2"]); ?></span></span>
												</div>
												<div class="cell p-inventory stock-112791">有货</div>
												<div class="cell p-quantity">
													<div class="quantity-form">
														<a href="javascript:void(0)" class="subtract"><span class="decrement">-</span></a>
														<input type="text" name="<?php echo ($vo["prodId"]); ?>" class="quantity-text" value="<?php echo ($vo["num"]); ?>" />
														<a href="javascript:void(0)" class="subtract"><span class="decrement">+</span></a>
													</div>
												</div>
												<div class="cell p-remove  col-2">
													<a href="javascript:void(0)" prodId="<?php echo ($vo["prodId"]); ?>" class="cart-remove">删除</a>
												</div>
											</div>
										</div>
									</div>
								</div><?php endif; endforeach; endif; ?>
						<!--====循环结束=======-->
						<div id="htmlTotal">
						<div class="cart-toolbar clearfix">
							<div class="total fr">
								<p>总计：<span id="totalSkuPrice" style="color:#E4393C;"></span></p>
							</div>
							<div class="amout fr">
								<span id="selectedCount"></span>件商品
							</div>
						</div>
						<div class="ui-ceilinglamp-1" style="width:988px;height:49px">
							<div class="cart-dibu" style="width:988px;height:49px">
								<div class="control fdibu">
									<span class="column t-checkbox form1">
										<input name="toggle-checkboxes" id="toggle-checkboxes_down" type="checkbox" clecked value="" class="jdcheckbox" checked="checked" />
										<label>全选</label>
									</span>
									<span class="delete">
										<b></b>
										<a href="javascript:void(0)" id="remove-batch">删除选中的商品</a>
									</span>
									<span class="doshopping">
										<b></b>
										<a href="<?php echo U('Index/index');?>" id="continue">继续购物</a>
									</span>
								</div>
								<div class="cart-total-2014">
									<div class="cart-button">
										<a class="checkout" id="cartMessage" href="javascript:void(0)">
											<b></b>
											去结算
										</a>
									</div>
									<div class="total fr">
										总计（不含运费）：
										<span id="finalPrice"></span>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div><?php endif; ?>
			</div>
		</div>
		<!--===========购物车内容 end=============-->
		<!--===========其他人购物 start==============-->
		<div id="c-tabs" class="w2 w1">
			<div class="m plist">
				<div class="cm fore1 curr" id="recommend-products">
					<div class="cmt">
						<h3>
							<i></i>
							购买了同样商品的顾客还购买了
						</h3>
					</div>
					<div class="cmc" id="some-buy">
						<div id="demo1" style="position:relative;overflow:hidden;z-index:1;width:878px;height:235px;">
							<ul id="demo2" class="clearfix" style="width:1752px;">
								<?php if(is_array($sameGood)): foreach($sameGood as $key=>$val): ?><li>
										<div class="p-img">
											<a target="_blank" href="<?php echo U('Details/details','id='.$val['prodId']);?>">
												<img width="130" height="130" src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>" />
											</a>
										</div>
										<div class="p-name">
											<a target="_blank" href="<?php echo U('Details/details','id='.$val['prodId']);?>"><?php echo ($val["prodInfo"]); ?></a>
										</div>
										<div class="p-price">
											<strong>￥<?php echo ($val["price2"]); ?></strong>
										</div>
										<div class="p-btn">
											<a prodId="<?php echo ($val["prodId"]); ?>" href="javascript:void(0)" class="btn">
												<span class="btn-icon"></span>
												<span class="btn-text">加入购物车</span>
											</a>
										</div>
									</li><?php endforeach; endif; ?>
							</ul>
		
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<!--===========其他人购物 end==============-->

		
		<div id="deleteBackground" class="thickdiv hide" style="width: 100%; height: 980px;"></div>
		<div class="thickbox hide" style="left: 499.5px; top: 250px; width: 412px; height: 503px;">
		<!--===========删除商品弹框 start==============-->
			<div class="thickwrap hide" id="deleteCartGoods" style="width: 340px;">
				<div id="" class="thicktitle" style="width:320">
					<span>删除商品</span>
				</div>
				<div class="thickcon" style="width: 320px; height: 100px; padding-left: 10px; padding-right: 10px;">
					<div class="m flexbox">
						<div class="mc">
							<div class="tip-box icon-box">
								<span class="warn-icon m-icon"></span>
								<div class="item-fore">
									<h3 class="ftx04">确定从购物车中删除此商品？</h3>
									<div class="op-btns">
										<a id="btnRemoveConfirm" prodId="" class="btn-9" href="javascript:void(0);">确定</a>
										<a id="cancelRemoveConfirm" class="btn-9 ml10" href="javascript:void(0);">取消</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a class="thickclose" href="#">×</a>
			</div>
			<div class="thickwrap hide" id="loginTest" style="width: 410px;">
				<div class="thicktitle" id="thicktitler" style="width:390">
					<span>您尚未登录</span>
				</div>
				<div class="thickcon" id="thickconr" style="width: 412px; height: 503px; padding-left: 10px; padding-right: 10px;">
					<div marginwidth="0" marginheight="0" scrolling="no" style="width:390px;height:450px;border:0;">
						<div id="regist">
						    <div class="mt">
						        <ul class="tab">
						            <li class="curr">登&nbsp;录</li>
						            <li>
						            	<a href="<?php echo U('Register/register');?>" target="_blank" a="">注&nbsp;册</a>
						            </li>
						        </ul>
						 	</div>

    						<form id="formloginframe" method="post" onsubmit="return false;">
        						<div class="mc form" id="">
           							<div class="item fore1">
                						<span>邮箱/用户名/已验证手机</span>
               						 	<div class="item-ifo">
                    						<input type="text" id="loginname" name="loginname" tabindex="1" class="text" value="">
                    						<div class="clr"></div>
                    						<label id="loginname_error" class="hide"></label>
                    						<i id="ddd" class="i-name"></i><div class="clr"></div>
                    						<label id="loginname_succeed" class="blank invisible"></label>
                    						
                						</div>
           							</div>
									<div class=".clr"></div>
            						<div class="item fore2">
                						<span>密码</span>

                						<div class="item-ifo">
                    						<label id="sloginpwd" style="display: none;">
												<span id="_ocx_password_down" class="text_pge" style="text-align:center;"><a href="#JDedit.exe">请点此安装控件</a></span>
                    						</label>

                    						<input type="password" id="nloginpwd" name="nloginpwd" class="text" tabindex="2" autocomplete="off">
                    						<div class="clr"></div>
                    						<label id="loginpwd_error" class="hide"></label>
           
                   							 <i class="i-pass"></i>

                    						<label id="loginpwd_succeed" class="blank invisible"></label>                						
                						</div>
            						</div>
            						<div class=".clr"></div>
						            <div class="item fore3" id="o-authcode">
						                <span>验证码</span>

                						<div class="item-ifo">
	                    					<input type="text" id="authcode" name="authcode" class="text text-1" tabindex="6" value="" autocomplete="off">
	                    					<div class="clr"></div>
	                    					<label id="authcode_error" class="hide"></label>
	                    					<div class="clr"></div>
	                    					<label class="img">
	                        					<img style="cursor:pointer;width:120px;height:35px;display:block;" alt="" src="<?php echo U('Login/setCode');?>" onclick="this.src=this.src+'?imgId='+Math.random()" id="JD_Verification1">
	                    					</label>
	                    					<label id="nextCode" class="ftx23">&nbsp;看不清？<a href="javascript:void(0)" class="flk13">换一张</a></label>
	                    					<label id="authcode_succeed" class="blank invisible"></label>
											
                						</div>
            						</div>
            						<div class="clr"></div>
            						<div id="autoentry" class="item fore4">
                						<span class="label">&nbsp;</span>
										
                						<div class="item-ifo">
		                    				<input type="checkbox" class="checkbox" name="chkRememberMe">
		                    				<label class="mar">自动登录</label>
		                                    <div style="float:left;" id="ctrlDiv">
		                            			<input type="checkbox" class="checkbox" id="chkOpenCtrl" name="chkOpenCtrl">
		                            			<label class="mar" id="jdsafe">安全控件登录</label>
	                        				</div>
                                			<label class="mar"><a href="<?php echo U('Findpwd/index');?>" target="_blank" class="flk13">忘记密码?</a></label>
                						</div>
                	
            						</div>
				            		<div class="item">
				               			<input type="button" class="btn-img btn-regist" id="loginsubmitframe"  value="登&nbsp;录" tabindex="8">
				            		</div>
				            		<div class="clr"></div>
		                        	<div class="item extra">
		                				使用合作网站账号登录京东：
		               				 	<div class="clr"></div>
		            					<span class="btns qq"><s></s><a href="javascript:void(0)">QQ</a>|</span>
		            					<span class="btns net163"><s></s><a href="javascript:void(0)">网易</a>|</span>
		            					<span class="btns renren"><s></s><a href="javascript:void(0)">人人</a>|</span>
		            					<span class="btns qihu"><s></s>
		                					<a href="javascript:void(0);">奇虎360</a>|
		            					</span>
		            					<span class="btns kaixing001"><s></s><a href="javascript:void(0)" target="_blank">开心</a>|</span>
		            					<span class="btns douban"><s></s>
		                					<a href="javascript:void(0)">豆瓣</a>|
		            					</span>
		            					<span class="btns souhu">
		                					<a href="javascript:void(0)">搜狐</a>|
		            					</span>
							        </div>
					    		</div>
					    	</form>
						</div>
					</div>
				</div>
				<a href="#" class="thickclose">×</a>
			</div>
		</div>

		<!--===========删除商品弹框 end==============-->
		<!--=========导入尾部 start=============-->
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
		<!--=========导入尾部 end=============-->
	</body>
</html>