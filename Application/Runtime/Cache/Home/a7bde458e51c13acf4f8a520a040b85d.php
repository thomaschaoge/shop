<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE hmtl>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>二级主页</title>
	<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css//second.css">
	<script src="/jd/Application/Home/Common/Js//jquery-1.8.3.js" type="text/javascript"></script>
	<script src="/jd/Application/Home/Common/Js//SecondTopImage.js" type="text/javascript"></script>

		<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/footer.css"/>
<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/header.css"/>
	<script type="text/javascript" src="/jd/Application/Home/Common/Js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		var infoUrl = '/jd/index.php/Index/getSugessions';
		var goodsUrl = "/jd/index.php/Details/details/";
	</script>
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

		// $('#nav_2014').hover(function(){
		// 	$('#nav_2014 .sub_nav').css('display','block');
		// },function(){
		// 	$('#nav_2014 .sub_nav').css('display','none');
		// })
		$('#nav_2014').on('mouseenter',function(){
			$('#nav_2014 .sub_nav').css('display','block');
		})
		$('#nav_2014').on('mouseleave',function(){
			$('#nav_2014 .sub_nav').css('display','none');
		})

		//搜索条件判断
		$("#jd_search").submit(function(){
			if($.trim($('#jd_search input').eq(0).val()) == ''){
				alert('搜索词不能为空~~');
				$('#jd_search input').eq(0).focus();
				return false;
			}
		})
	})
	
	</script>
</head>
<body>
	<div id="top_nav">
		<div class="top_nav_con">
			<ul>
				<li class="favorite">
					<div><a href="javascript:;">收藏京东</a></div>
				</li>
				<li class="location">
					<div class="address"><b></b><strong>北京</strong><a href="#">[更换]</a></div>
					<ul class="province">
						<li><a href="javascript:;" data-id="#">北京</a></li>
						<li><a href="javascript:;" data-id="#">上海</a></li>
						<li><a href="javascript:;" data-id="#">天津</a></li>
						<li><a href="javascript:;" data-id="#">重庆</a></li>
						<li><a href="javascript:;" data-id="#">河北</a></li>
						<li><a href="javascript:;" data-id="#">山西</a></li>
						<li><a href="javascript:;" data-id="#">河南</a></li>
						<li><a href="javascript:;" data-id="#">辽宁</a></li>
						<li><a href="javascript:;" data-id="#">吉林</a></li>
						<li><a href="javascript:;" data-id="#">黑龙江</a></li>
						<li><a href="javascript:;" data-id="#">内蒙古</a></li>
						<li><a href="javascript:;" data-id="#">江苏</a></li>
						<li><a href="javascript:;" data-id="#">山东</a></li>
						<li><a href="javascript:;" data-id="#">安徽</a></li>
						<li><a href="javascript:;" data-id="#">浙江</a></li>
						<li><a href="javascript:;" data-id="#">福建</a></li>
						<li><a href="javascript:;" data-id="#">湖北</a></li>
						<li><a href="javascript:;" data-id="#">湖南</a></li>
						<li><a href="javascript:;" data-id="#">广东</a></li>
						<li><a href="javascript:;" data-id="#">广西</a></li>
						<li><a href="javascript:;" data-id="#">江西</a></li>
						<li><a href="javascript:;" data-id="#">四川</a></li>
						<li><a href="javascript:;" data-id="#">海南</a></li>
						<li><a href="javascript:;" data-id="#">贵州</a></li>
						<li><a href="javascript:;" data-id="#">云南</a></li>
						<li><a href="javascript:;" data-id="#">西藏</a></li>
						<li><a href="javascript:;" data-id="#">陕西</a></li>
						<li><a href="javascript:;" data-id="#">甘肃</a></li>
						<li><a href="javascript:;" data-id="#">青海</a></li>
						<li><a href="javascript:;" data-id="#">宁夏</a></li>
						<li><a href="javascript:;" data-id="#">新疆</a></li>
						<li><a href="javascript:;" data-id="#">台湾</a></li>
						<li><a href="javascript:;" data-id="#">香港</a></li>
						<li><a href="javascript:;" data-id="#">澳门</a></li>
						<li><a href="javascript:;" data-id="#">钓鱼岛</a></li>
						<li><a href="javascript:;" data-id="#">海外</a></li>
						<span class="p_close"></span>
					</ul>
				</li>
			</ul>
			<ul class="top_nav_r">
				<li>
					<span>您好！<span style="color:red;"><?php echo $_SESSION['user']['uname'];?></span> 欢迎来到京东！</span>
					<?php
 if(empty($_SESSION['user'])){ echo '<a href="'.U('Login/index').'">[登录]</a><a href="'.U('Register/register').'">[免费注册]</a>'; }else{ echo '<a href="'.U('Login/logoutHeader').'">[退出]</a>'; } ?>
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
						<li><a href="javascript;">帮助中心</a></li>
						<li><a href="javascript;">售后服务</a></li>
						<li><a href="javascript;">在线客服</a></li>
						<li><a href="javascript;">投诉中心</a></li>
						<li><a href="javascript;">客服邮箱</a></li>
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
	<div id="top_header">
		

		<div class="top_banner">
			<a href="#">
				<img src="/jd/Application/Home/Common/Images/top_banner.jpg"/>
			</a>
			<a class="p_close" href="javascript:;"></a>
		</div>
		<div id="header">
			<div class="logo">
				<a href="#"><img src="/jd/Application/Home/Common/Images/logo.png" width="270px" height="60px"></a>
				<div>
					<a href="#"><img src="/jd/Application/Home/Common/Images/logo_ad.gif" alt="#"></a>
				</div>
			</div>
			<div class="search">
				<div class="form">
					<ul class="suggest">
						<li>搜索相关推荐</li>
						<li>我是隐藏的呢</li>
					</ul>
					<form action="<?php echo U('Search/index');?>" method="get" id="jd_search">
					<input class="keywords" type="text" name="query" value="<?php echo ($query); ?>" />
					<input type="submit" class="button" value="搜索"/>
					</form>
				</div>
				<div class="hot_keywords">
					<strong>热门搜索:</strong>
						<a href="<?php echo U('Search/index','query=lenovo');?>" class="hot">lenovo</a>
						<a href="<?php echo U('Search/index','query=apple');?>">apple</a>
						<a href="<?php echo U('Search/index','query=acer');?>">acer</a>
						<a href="<?php echo U('Search/index','query=神舟');?>">神舟</a>
						<a href="<?php echo U('Search/index','query=ASUS');?>">ASUS</a>
						<a href="<?php echo U('Search/index','query=DELL');?>">DELL</a>
						<a href="<?php echo U('Search/index','query=SAMSUNG');?>">SAMSUNG</a>
						<a href="<?php echo U('Search/index','query=Microsoft');?>">Microsoft</a>
				</div>
			</div>
			<div class="enterance">
				<ul>
					<li class="my_jd">
						<?php if(!empty($_SESSION['user'])){ echo '<a href="'.U('Ucenter/index','uid='.$_SESSION['user']['userId']).'">我的京东</a>'; }else{ echo '<a href="'.U('Login/index').'">请登录</a>'; } ?>
						<!-- <b></b> -->
					</li>
					<li class="checkout">
						<span class="shopping">
							<span id="shopping-amount">
							<?php
 if(!empty($_SESSION['cart']['tsum'])){ echo (count($_SESSION['cart'])-2); }else{ echo count($_SESSION['cart']); } ?>
						</span>
						</span>
						<a href="<?php echo U('Cart/index');?>">去购物车结算</a>
						<b></b>
					</li>
				</ul>
				<div class="jubao">
					<a href="#"><img src="/jd/Application/Home/Common/Images/jubao.png" alt=""></a>
				</div>
			</div>
		</div>
		<div id="nav">
			<div id="nav_2014">
				<div id="cate_2014">
					<div class="mt">
						<h2>
						<a href="#">全部商品分类</a>
						<b></b>
						</h2>
					</div>
					<div class="sub_nav">
						<?php if(is_array($ccdhData)): foreach($ccdhData as $key=>$val): ?><div class="item">
							<span>
								<h3>
								<?php
 foreach($val[0] as $val0){ $y=preg_match('/^\d[0-9,\,]+/', $val0['value']); if($y==0){ $str=$val0['value']; }else{ $str=U('Second/index',array('cat'=>$val0['value'])); } echo '<a href='.$str.'>'.$val0['name'].'</a>、'; } ?>
								</h3>
								<s></s>
							</span>
							<div class="i_mc">
								<div class="close">X</div>
								<div class="subitem">
									<dl class="fore1">
									<?php if(is_array($val[1])): foreach($val[1] as $key=>$val1): if(is_array($val1)): foreach($val1 as $key=>$val2): ?><dt>
											<a href="<?php echo U('Second/index',array('cat'=>$val2['proPath']));?>"><?php echo ($val2["proName"]); ?></a>
										</dt>
										<dd>
										<?php
 foreach($val2['child'] as $v4){ echo "<em>
											<a href=".U('List/index',array('cat'=>$v4['proPath'])).">".$v4['proName']."
											</a>
											</em>"; } ?>
										</dd><?php endforeach; endif; endforeach; endif; ?>
									</dl>
								</div>
								<div class="cat_right_con">
									<dl class="cat_promotions">
										<dd>
											<ul>
												<li><a href="#"><img src="/jd/Application/Home/Common/Images/cat_promotion_1.jpg" alt=""></a></li><li><a href="#"><img src="/jd/Application/Home/Common/Images/cat_promotion_2.jpg" alt=""></a></li>
											</ul>
										</dd>
									</dl>
									<dl class="cat_brands">
										<dt>推荐品牌出版商/书店</dt>
										<dd>
											<ul>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
												<li><a href="#">中华书局</a></li>
											</ul>
										</dd>
									</dl>
								</div>
							</div>
						</div><?php endforeach; endif; ?>
					</div>
				</div>
			</div>
			<ul id="navitems">
				<li><a href="<?php echo U('Index/index');?>">首页</a></li>
				<?php if(is_array($navList)): foreach($navList as $key=>$val): ?><li>
						<a href="<?php echo U('Second/index',array('cat'=>$val['indexCCDWZ']));?>"><?php echo ($val['indexCC']); ?>
						</a>
					</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
<!-- 二级页面主要内容区域
 -->	<div id="SecondContent">
 <!-- 二级页面主要内容区域，左侧内容区域
 -->
		<div id="leftside">
			<div class="leftside1 common">
				<div class="leftside_title">
					<img src='/jd/Application/Home/Common/Images//20130418A.png'>&nbsp;&nbsp;<?php echo ($currentType["proName"]); ?>商品分类
				</div>
				<ul>
					<?php if(is_array($currentType["child"])): foreach($currentType["child"] as $key=>$val): ?><li><a href='<?php echo U('List/index',array('cat'=>$val['proPath']));?>'><?php echo ($val["proName"]); ?></a></li><?php endforeach; endif; ?>
				</ul>
				<?php if(is_array($linkType)): foreach($linkType as $key=>$val): ?><div class="relation"><a href='<?php echo U('Second/index',array('cat'=>$val['proPath']));?>'><?php echo ($val["proName"]); ?></a></div><?php endforeach; endif; ?>
			</div>
			<div class="leftside2 common">
				<div class="leftside_title">
					推荐品牌
				</div>
				<ul>
					<?php if(is_array($imagelist)): foreach($imagelist as $key=>$val): ?><li>
						<a href="<?php echo U('List/index',array('cat'=>$val['proPath']));?>"><img src="/jd/Public/Uploads/Images/leftside2image<?php echo ($val["pic"]); ?>.jpg" alt="<?php echo ($val); ?>"></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="leftside3 common">
				<img  style="margin-top:10px" src="/jd/Public/Uploads/Images/leftsideimage1.jpg">
				<img style="margin-top:10px"  src="/jd/Public/Uploads/Images/leftsideimage2.jpg">
				<img style="margin-top:10px;width:211px;"  src="/jd/Public/Uploads/Images/leftsideimage3.jpg">
			</div>
		</div>
<!-- 二级页面主要内容区域，中间内容区域
 -->
		<div id="middle">
			<div class="middle1 common">
				<div class="middle1_inner">
					<ul class="images">
						<?php if(is_array($list)): foreach($list as $key=>$val): ?><li>
								<a href="<?php echo ($val["links"]); ?>">
									<img style="width:766px;height:240px" src="/jd/Public/Uploads/Advance/<?php echo ($val["img"]); ?>">
								</a>
							</li><?php endforeach; endif; ?>
					</ul>
					<ul class="num">
						<li>1</li>
						<li>2</li>
						<li>3</li>
						<li>4</li>
						<li>5</li>
						<li>6</li>
						<li>7</li>
						<li style="background-color:#ca2f2c">8</li>
					</ul>
				</div>
			</div>
			<div class="middle2 common">
				<div class="middle_title">
					<span>疯狂抢购</span>
				</div>
				<ul>
					<?php if(is_array($middle2List)): foreach($middle2List as $key=>$val): ?><li>
						<div class="link_img">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><img style='width:130px;height:130px;'src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>"></a>
						</div>
						<div class="desc">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>">
								<?php echo ($val["prodInfo"]); ?>
							</a>
						</div>
						<div class="price">
							<span style="font-size:13px;">京东价:</span>
							<b style='color:#ca2f2c'>￥<?php echo ($val["price1"]); ?></b>
						</div>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="middle3 common">
				<div class="middle_title">
					<ul>
						<li style="background-color:red">1</li>
						<li>2</li>
					</ul>
					<span>新品热卖</span>
				</div>
				<ul>
					<?php if(is_array($middle3List1)): foreach($middle3List1 as $key=>$val): ?><li na='0'>	
						<div class="link_img">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><img style='width:100px;height:100px;'src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>"></a>
						</div>
						<div class="desc">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>">
								<?php echo ($val["prodInfo"]); ?>
							</a>
						</div>
						<div class="price">
							<span style="font-size:13px;">京东价:</span>
							<b style='color:#ca2f2c'>￥<?php echo ($val["price1"]); ?></b>
						</div>
					</li><?php endforeach; endif; ?>
					<?php if(is_array($middle3List2)): foreach($middle3List2 as $key=>$val): ?><li style="display:none" na="1">
						<div class="link_img">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><img style='width:100px;height:100px;'src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>"></a>
						</div>
						<div class="desc">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>">
								<?php echo ($val["prodInfo"]); ?>
							</a>
						</div>
						<div class="price">
							<span style="font-size:13px;">京东价:</span>
							<b style='color:#ca2f2c'>￥<?php echo ($val["price1"]); ?></b>
						</div>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="middle4 common">
				<div class="middle_title">
					<span>降价推荐</span>
				</div>
				<ul>
					<?php if(is_array($middle4List)): foreach($middle4List as $key=>$val): ?><li>
						<div class="link_img">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><img style='width:100px;height:100px;'src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>"></a>
						</div>
						<div class="desc">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>">
								<?php echo ($val["prodInfo"]); ?>
							</a>
						</div>
						<div class="price">
							<span style="font-size:13px;">京东价:</span>
							<b style='color:#ca2f2c'>￥<?php echo ($val["price2"]); ?></b>
						</div>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
<!-- 二级页面主要内容区域，右侧内容区域
 -->
		<div id="rightside">
			<div class="rightside1 common">
				<div class="rightside_title">
					<span>促销信息</span>
				</div>
				<ul>
					<?php if(is_array($rightSide1)): foreach($rightSide1 as $key=>$val): ?><li><a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><?php echo ($val["newsInfo"]); ?></a></li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="rightside2 common">
				<div class="rightside_title">
					<span>限时抢购</span>
				</div>
				<ul>
					<?php if(is_array($rightSide2List)): foreach($rightSide2List as $key=>$val): ?><li>
						<div class="link_img">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><img style=
							'width:100px;height:100px;'src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>"></a>
						</div>
						<div class="desc">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>">
								<?php echo ($val["prodInfo"]); ?>
							</a>
						</div>
						<div class="price">
							<span style="font-size:13px;">京东价:</span>
							<b style='color:#ca2f2c'>￥<?php echo ($val["price1"]); ?></b>
						</div>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="rightside3 common">
				<img src="/jd/Public/Uploads/Images/image2.jpg">
			</div>
		</div>
<!-- 二级页面主要内容区域，底部上边图片区域
 -->
		<div class="middle_image">
			<img style="width:100%;" src="/jd/Public/Uploads/Images/image3.jpg">
		</div>
		<div class="clear"></div>
		<div id="rightside-bottom">
			<img src="/jd/Public/Uploads/Images/image1.jpg">
		</div>
<!-- 二级页面主要内容区域，底部内容区域
 -->
		<div id="bottom">
			<div class="bottom_title">
				<span>精品推荐</span>
			</div>
			<ul>
					<?php if(is_array($middle5List)): foreach($middle5List as $key=>$val): ?><li>
						<div class="link_img">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><img style='width:100px;height:100px;'src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>"></a>
						</div>
						<div class="desc">
							<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>">
								<?php echo ($val["prodInfo"]); ?>
							</a>
						</div>
						<div class="price">
							<span style="font-size:13px;">京东价:</span>
							<b style='color:#ca2f2c'>￥<?php echo ($val["price1"]); ?></b>
						</div>
					</li><?php endforeach; endif; ?>
				</ul>
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
</body>

<style type="text/css">
	.form .button{
		width: 88px;
	}
	.form .keywords{
		height: 30px;
	}
</style>

</script>
</html>