<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>详情页面</title>
		<meta charset="utf-8"/>
		<script type="text/javascript">
			var path="<?php echo U('Details/demo');?>";
			var fenlei = "<?php echo U('Details/fenlei');?>";
			var imgurl = "/jd/Public/Uploads/"; 
			var peijian ="<?php echo U('Details/accessories');?>";
			var callbackurl = "<?php echo U('Details/do_callback');?>";
		</script>
		<script>
			//定义数据发送地址
			var address = "<?php echo U('Cart/addCart');?>";
			var addressIndex = "<?php echo U('Cart/index');?>";
			var compareListNum=<?php  $compareList=cookie("prodIdCookie"); if(!empty($compareList)){ echo count($compareList); }else{ echo 0; } ?>;
			var sessionExist=<?php
 if(!empty($_SESSION['user'])){ echo 1; }else{ echo -1; } ?>;
		</script>
	
		<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/detail.css" />
		<script type="text/javascript" src="/jd/Application/Home/Common/Js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="/jd/Application/Home/Common/Js/detail.js"></script>
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
	
<!-- <body> -->
	<!-- 详情页 -->
	<div id='container'>
	<?php
 $totalGcode = 0; ?>
	<?php if(is_array($arr)): foreach($arr as $key=>$prod): endforeach; endif; ?>
	
		
		<!-- 商品基本信息 -->
		<div id="jianjie">
			<!-- 商品图片区 -->
			<div id="left_img">
				<div id="left_bimg">
					<ul>
					<?php if(is_array($prods)): $i = 0; $__LIST__ = $prods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prodimg): $mod = ($i % 2 );++$i;?><li class="bimgs<?php echo ($i); ?>">
							<img src="/jd/Public/Uploads/<?php echo ($prodimg['image']); ?>" width="350px" height="350px" imgid="<?php echo ($i-1); ?>">
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div id="fdj">
					<ul>
					<?php if(is_array($prods)): $i = 0; $__LIST__ = $prods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prodimg): $mod = ($i % 2 );++$i;?><li class="bimgs<?php echo ($i); ?>">
							<img src="/jd/Public/Uploads/<?php echo ($prodimg['image']); ?>" imgid="<?php echo ($i-1); ?>" width="800px" height="800px">
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div id="left_simg">
					<ul>
						<li class="b1"> &lt; </li>
						<?php if(is_array($prods)): foreach($prods as $key=>$prodimg): ?><li class="b3">
							<span><img src="/jd/Public/Uploads/<?php echo ($prodimg['image']); ?>" width="50px" height="50px"></span>
						</li><?php endforeach; endif; ?>
						<li class="b2"> &gt; </li>
					</ul>
				</div>
				<!-- 查看大图 对比 分享商品 -->
				<div id="left_link">
					<ul>
						<li><a href="<?php echo U('Bigimg/bigimg?id='.$prod['prodId']);?>" target="_blank"><span class='b3'><img src="/jd/Public/Uploads/images/fd.jpg">查看大图</a></span></li>
						<li name="<?php echo ($prod['prodId']); ?>" id="duibi"
						class="
							btn-compare btn-compare-s
							<?php if(in_array($prod['prodId'],$prodIdCookieList)){ echo 'btn-compare-s-active'; } ?>
						"
						><a href="javascript:;"><span class='b3'><input type="checkbox" name="chec"> 加入对比</span></a></li>
					</ul>
				</div>
			</div>
	<!--=========对比栏start==========-->
		
		<div id="pop-compare" class="pop-compare" data-load="true" style="z-index:2000;overflow:visible;bottom: 0px;<?php if(!empty($prodIdCookieData)){echo 'display:block';} ?>">
			<div class="pop-wrap" style="left:0px">
				<div class="pop-inner" data-widget="tabs">
					<div class="diff-hd">
						<ul class="tab-btns clearfix">
							<li class="current1" data-widget="tab-item">
								<a href="javascript:;">对比栏</a>
							</li>
						</ul>
						<div class="operate">
							<a class="hide-me" href="javascript:;">隐藏</a>
						</div>
					</div>
					<div class="diff-bd tab-cons">
						<div class="tab-con" data-widget="tab-content" style="display: block;">
							<div id="diff-items" class="diff-items clearfix">
								<?php if(is_array($prodIdCookieData)): foreach($prodIdCookieData as $key=>$val): ?><dl id="cmp_item_<?php echo ($val["prodId"]); ?>">
									<dt><a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>" target="_blank"><img width="50" height="50" src="/jd/Public/Uploads/<?php echo ($val['simimg']); ?>"></a></dt>
									<dd><a class="diff-item-name" href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>" target="_blank"><?php echo ($val["prodInfo"]); ?></a><span class="p-price"><strong class="J-p-1093625">￥<?php echo ($val["price1"]); ?></strong><a class="del-comp-item" style="visibility: hidden;">删除</a></span></dd>
								</dl><?php endforeach; endif; ?>
								<?php $__FOR_START_18587__=$prodIdCookieNum;$__FOR_END_18587__=5;for($i=$__FOR_START_18587__;$i < $__FOR_END_18587__;$i+=1){ ?><dl class="item-empty">
									<dt><?php echo ($i); ?></dt>
									<dd>您还可以继续添加</dd>
								</dl><?php } ?>
							</div>
							<div class="diff-operate">
								<a id="goto-contrast" class="btn-compare-b" style='cursor:pointer;<?php  if($prodIdCookieNum>=3){ echo 'background-color:#E4393C;
																color:#fff;'; } ?>' 
								href="<?php echo U('Compare/compareShow');?>" target="_blank">对比</a>
								<a style='cursor:pointer;'class="del-items">清空对比栏</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--=========对比栏end==========-->

			<!-- 商品简介 -->
			<div id="right_content">
				<!-- 商品简述 -->
				<div id="right_content_header">
					<span class='desc'><?php echo ($prod['prodInfo']); ?></span><br/>
					
				</div>
				<!-- 商品基本信息 -->
				<div id='right_content_center'>
					<ul>
						<li>京东价：<span class='a1'>￥<?php echo ($prod['price2']); ?></span> <a href	='#'>(降价通知)</a></li>
						<li>原价：<del>￥<?php echo ($prod['price1']); ?></del></li>
						<li>商品编号：<span><?php echo ($prod['productId']); ?></span></li>
						<input type="hidden" name="goodsProdId" value="<?php echo ($prod['prodId']); ?>" />
						<li>商品评分：<span class='a2'>
						<?php
 for($i=0;$i<$prod['Gcode'];$i++){ echo "★"; } ?>
						</span><span class="aa">
						<?php
 for($i=0;$i<5-$prod['Gcode'];$i++){ echo "★"; } ?>
						</span><a href="#">(已有<?php echo ($commentsCount); ?>人评价)</a> <a href="#"><img src="/jd/Public/Uploads/images/jimi-ico-v1.png"></a></li>
						<li style="margin-bottom:0px;">
							<b style="float:left;">配送至:</b>
							<div id="adtitle">
								北京&nbsp;朝阳区&nbsp;管庄&nbsp;<b>∨</b>
							</div>
							<span class='a3'>&nbsp;&nbsp;有货，</span>
							15:00之前完成下单，可预约今晚送达
						</li>
						<li style="margin-left:10px;margin-top:0px;">
							<div class="adlist">
								<div class="ad0" name="ad0">
									<div id="city-nav">
									<span  name="a">省份</span>
									<span  name="b">城市</a></span>
									<span class="show" name="c">地区</span>
									</div>
									<div style="clear:both;"></div>
									<ul class="show" name="a">
										<?php if(is_array($areas)): foreach($areas as $key=>$volist): ?><li><?php echo ($volist['diqu']); ?></li><?php endforeach; endif; ?>
									</ul>
									<ul name="b">
										
									</ul>
									<ul name="c">
										
									</ul>
								</div>
							</div>
						</li>
						<li>服务：由京东发货并提供售后服务。支持：
						<a href="#"><img src="/jd/Public/Uploads/images/night.jpg"><span class='a4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;夜间配</span></a>&nbsp;&nbsp;
						<a href="#"><img src="/jd/Public/Uploads/images/pay.jpg"><span class='a4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;先款送京豆</span></a>&nbsp;
						<a href="#"><img src="/jd/Public/Uploads/images/lock.jpg"><span class='a4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;自提</span></a>&nbsp;
						<a href="#"><img src="/jd/Public/Uploads/images/home.jpg"><span class='a4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;售后到家</span></a>
						</li>
					</ul>
				</div>
				<!-- 商品销售信息 -->
				<div id='right_content_check'>
					<ul>
						<li>
							<span class='a6'>选择颜色：</span>
							<?php if(is_array($arr)): foreach($arr as $key=>$colors): ?><span class='a5'><?php echo ($colors['colorName']); ?></span><?php endforeach; endif; ?>
						</li><br/><br/><br/>
						<li>
							<span class='a6'>购买数量：</span>
							<span class='a7'>-</span>
							<input type="text" size="4" name="n" value="1">
							<span class='a7'>+</span>
						</li><br/><br/><br/>
						<li class="a8">
							<span class='a6'>京东服务：</span>
							<div class="yh yh1">
								<img src="/jd/Public/Uploads/images/time.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>特惠延长保修1年 ￥299.00</span>
							</div>
							<div class="yh2">
								<img src="/jd/Public/Uploads/images/time.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>特惠延长保修2年 ￥399.00</span>
							</div>
							<div class="yh">
								<img src="/jd/Public/Uploads/images/bao.jpg"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>特惠意外保护1年 ￥269.00</span>
							</div>
							<div class="yh">
								<img src="/jd/Public/Uploads/images/fuwu.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>远程服务 ￥28.00</span>
							</div>
						</li><br/><br/>
						<li class="a9"><a href="#">详情</a></li>
					</ul>
				</div>
				<!-- 已选所要购买的商品的型号 -->
				<div class="checked"></div>
				<!-- 选择所要购买的商品 -->
				<div class='buy'>
					<ul>
						<li><a href="javascript:void(0)"><span style="cursor:pointer;"><img src="/jd/Public/Uploads/images/buy_cart.jpg"></span></a></li>
						<li><a href="#"><img src="/jd/Public/Uploads/images/pay_method.jpg"></a></li>
						<li id='care' name="<?php echo ($prod['prodId']); ?>"><a href="javascript:;"><img src="/jd/Public/Uploads/images/care.jpg"></a></li>
						<li class="a10"><a href="#"><img src="/jd/Public/Uploads/images/youhui.jpg"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--------------------关注成功提醒------------------>
		<div class="careBox" style="display:none;">
			<div class='careInfo'>
				<div class='infotext'><h1></h1></div>
			</div>
		</div>
		<!--------------------关注成功提醒------------------->
		<!-- 商品详情信息 -->
		<div id="content">
			<div class="left_content">
				<!-- 相关分类 -->
				<div class="xgfl">
					<div class="daohang">
						<span>相关分类</span>
					</div>
					<div class="c1">
						<ul class="left">
						<?php if(is_array($arr8)): foreach($arr8 as $key=>$protype): ?><li><a href="<?php echo U('Second/index?cat='.$protype['proPath']);?>" target="_blank"><?php echo ($protype['proName']); ?></a></li><?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
				<!-- 其他同类品牌推荐 -->
				<div class="other_goods">
					<div class="daohang">
						<span>同类其他品牌</span>
					</div>
					<div class="c2">
						<ul class="left">
						<?php if(is_array($arr9)): foreach($arr9 as $key=>$pro): ?><li><a href="<?php echo U('List/index?cat='.$pro['proPath']);?>" target="_blank"><?php echo ($pro['proName']); ?></a></li><?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
				<!-- 游戏本销量排行榜 -->
				<div class="games">
					<div class="daohang">
						<span>游戏本排行榜</span>
					</div>
					<div class="t_daohang">
						<ul>
							<li class="xz">同价位</li>
							<li>同品牌</li>
							<li>同类别</li>
						</ul>
					</div>
					<!-- 同价位商品 -->
					<?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$price): $mod = ($i % 2 );++$i;?><div class="shangpin1">
						<?php
 if($i<4){ $class = "y1"; }else{ $class = "yy"; } echo "<div class=".$class.">".$arr2[$i-1]."</div>"; ?>
						<div class="y2">
							<a href="<?php echo U('Details/details?id='.$price['prodId']);?>" target="_blank"><img src="/jd/Public/Uploads/<?php echo ($price['simimg']); ?>" width="50px" height="50px"></a>
						</div>
						<div class="y3">
							<div class="top">
								<a href="<?php echo U('Details/details?id='.$price['prodId']);?>" target="_blank"><?php echo ($price['prodName']); ?></a>
								<div class="bottom">￥<?php echo ($price['price2']); ?></div>
							</div>
							
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- 同品牌商品 -->
					<?php if(is_array($arr4)): $i = 0; $__LIST__ = $arr4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?><div class="shangpin2">
						<?php
 if($i<4){ $class = "y1"; }else{ $class = "yy"; } echo "<div class=".$class.">".$arr2[$i-1]."</div>"; ?>
						<div class="y2">
							<a href="<?php echo U('Details/details?id='.$brand['prodId']);?>" target="_blank"><img src="/jd/Public/Uploads/<?php echo ($brand['simimg']); ?>" width="50px" height="50px"></a>
						</div>
						<div class="y3">
							<div class="top"><a href="<?php echo U('Details/details?id='.$brand['prodId']);?>" target="_blank"><?php echo ($brand['prodName']); ?></a>
								<span class="bottom">
									<?php
 if($brand['price2'] == ""){ echo "暂无报价"; }else{ echo "￥".$brand['price2']; } ?>
							</span>
							</div>
							
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- 同类别商品 -->
					<?php if(is_array($arr5)): $i = 0; $__LIST__ = $arr5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$proType): $mod = ($i % 2 );++$i;?><div class="shangpin3">
						<?php
 if($i<4){ $class = "y1"; }else{ $class = "yy"; } echo "<div class=".$class.">".$arr2[$i-1]."</div>"; ?>
						<div class="y2">
							<a href="<?php echo U('Details/details?id='.$protype['prodId']);?>"><img src="/jd/Public/Uploads/<?php echo ($proType['simimg']); ?>" width="50px" height="50px"></a>
						</div>
						<div class="y3">
							<div class="top"><a href="<?php echo U('Details/details?id='.$protype['prodId']);?>"><?php echo ($proType['prodName']); ?>
								<span class="bottom">
									<?php
 if($proType['price2'] == ""){ echo "暂无报价"; }else{ echo "￥".$proType['price2']; } ?>
							</span>
							</div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<!-- 购买该商品的用户还购买的其他商品 -->
				<div class="other_personBuy">
					<div class="daohang">
						<span>购买了该商品的用户还该买了</span>
					</div>
					<?php if(is_array($sgoods)): foreach($sgoods as $key=>$go): ?><div class="qtsp">
						<div class="y4">
							<a href="<?php echo U('Details/details?id='.$go['prodId']);?>" target="_blank"><img src="/jd/Public/Uploads/<?php echo ($go['img']); ?>" width="100px" height="100px"></a>
						</div>
						<div class="y5">
							<a href="<?php echo U('Details/details?id='.$go['prodId']);?>" target="_blank"><?php echo ($go['prodName']); ?></a>
						</div>
						<div class="y6">￥<?php echo ($go['price2']); ?></div>
					</div><?php endforeach; endif; ?>
				</div>
				<!-- 浏览了该商品的用户还浏览了的其他商品 -->
				<div class="lljl">
					<div class="daohang">
						<span>浏览了该商品的用户还浏览了</span>
					</div>
					<?php if(is_array($cookieGoods)): foreach($cookieGoods as $key=>$cookieG): ?><div class="qtsp">
						<div class="y4">
							<a href="<?php echo U('Details/details?id='.$cookieG[0]['prodId']);?>" target="_blank"><img src="/jd/Public/Uploads/<?php echo ($cookieG[0]['img']); ?>" width='100px' height='100px'></a>
						</div>
						<div class="y5">
							<a href="<?php echo U('Details/details?id='.$cookieG[0]['prodId']);?>" target="_blank"><?php echo ($cookieG[0]['prodInfo']); ?></a>
						</div>
						<div class="y6">￥<?php echo ($cookieG[0]['price2']); ?></div>
					</div><?php endforeach; endif; ?>
				</div>
				<!-- 店长推荐 -->
				<div class="imgs">
					<div class="imgs1">
						<a href="#"><img src="/jd/Public/Uploads/images/541267bcN17636161.jpg"></a>
					</div>
					<div class="imgs1">
						<a href="#"><img src="/jd/Public/Uploads/images/54052767N022140c1.jpg"></a>
					</div>
					<div class="imgs1">
						<a href="#"><img src="/jd/Public/Uploads/images/54068421N5bdc130f.jpg"></a>
					</div>
				</div>
			</div>
			<div class="right_content">
				<!-- 推荐配件 -->
				<div class="tjpj">
					<!-- 标题 -->
					<div class="bt">
						<ul>
							<li class="title1">推荐配件</li>
							<li class="title2">人气组合</li>
						</ul>
					</div>
					<!-- 导航栏 -->
					<div class="dh">
						<ul>
							<li id="d1"><a href="javascript:void(0)" onclick="accessories(this)" prodId = "<?php echo ($prod['prodId']); ?>"><span  style="font-weight: bold;color:#222;">精美配件</span></a></li>
							<?php if(is_array($arr19)): foreach($arr19 as $key=>$fenlei): foreach($fenlei as $fenleiList){ ?>
							<li class="st"></li>
							<li><a href="javascript:void(0);" onclick="demo(this)" class="pro" typeid="<?php echo ($fenleiList['proTypeId']); ?>"><?php echo ($fenleiList['proName']); ?></a></li>
								<?php
 } endforeach; endif; ?>
						</ul>
					</div>
					
					<!-- 推荐商品详情 -->
					<div class="tjspxq">
						<ul>
							<!-- 主商品 -->
							<li prodId="<?php echo ($prod['prodId']); ?>" class="goods1 goods4">
								<div class="mimg"><a href="<?php echo U('Details/details?id='.$prod['prodId']);?>" target="_blank"><img src="/jd/Public/Uploads/<?php echo ($prod['img']); ?>" width="100px" height="100px"></a></div>
								<div class="descr"><a href="<?php echo U('Details/details?id='.$prod['prodId']);?>" target="_blank"><?php echo ($prod['prodName']); ?></a></div>
							</li>
						</ul>
							<!-- 配件 -->
						<div class="goods2">
							<ul id="peijian">
							<?php if(is_array($arr21)): foreach($arr21 as $key=>$peijian): $pjlb = array(); foreach($peijian as $v){ ?>
							<li class="jia">&nbsp;+&nbsp;</li>
							<li class="goods1">
								<div class="mimg"><a href="<?php echo U('Details/details?id='.$v['prodId']);?>" target="_blank"><img class="tidai" src="/jd/Public/Uploads/<?php echo ($v['img']); ?>" width="100px" height="100px"></a></div>
								<div class="descr"><a href="<?php echo U('Details/details?id='.$v['prodId']);?>" target="_blank"><?php echo ($v['prodName']); ?></a></div>
								<div class="price"><input type="checkbox" prodId="<?php echo ($v['prodId']); ?>" name="check" value="1">￥<span><?php echo ($v['price2']); ?></span></div>
								<div class="m_goods"><a href="<?php echo U('List/index?cat='.$v['proPath']);?>" target="_blank">更多<?php echo ($v['proName']); ?></a></div>
							</li>
							
							<?php	 } endforeach; endif; ?>
						</ul>
						</div>
						<!-- 所选商品及配件总价 -->
						<div class="goods3">
							<div class="enter"><a href="<?php echo U('Second/index?cat='.$prod['proPath']);?>" target="_blank">进入选购中心 &gt; </a></div>
							<div id="tuijianNum" class="cd">已选择0个配件</div>
							<div class="t_price">
								<ul>
									<li class="eq">&nbsp;=&nbsp;</li>
									<li>
										搭配价：<span>￥<span><?php echo ($prod['price2']); ?></span></span><br/>
										参考价：<del>￥<span style="color:#777;font-size:13px;"><?php echo ($prod['price1']); ?></span></del>
									</li>
								</ul>
							</div>
							<div id="tuiJian" class="shopping1"><button>立即购买</button></div>
						</div>
					</div>
					<!-- 人气组合 -->
					<div class="tjspxq1">
						<ul>
							<!-- 主商品 -->
							<li prodId="<?php echo ($prod['prodId']); ?>" class="goods1 goods4">
								<div class="mimg"><a href="#"><img src="/jd/Public/Uploads/<?php echo ($prod['img']); ?>" width="100px" height="100px"></a></div>
								<div class="descr"><a href="#"><?php echo ($prod['prodName']); ?></a></div>
							</li>
						</ul>
							<!-- 配件 -->
						<div class="goods2">
							<ul id="renqizuhe">
							<?php if(is_array($arr23)): foreach($arr23 as $key=>$rqzh): foreach($rqzh as $vo){ ?>
									<li class="jia">&nbsp;+&nbsp;</li>
									<li class="goods1">
										<div class="mimg"><a href="<?php echo U('Details/details?id='.$vo['prodId']);?>" target="_blank"><img src="/jd/Public/Uploads/<?php echo ($vo['img']); ?>" width="100px" height="100px"></a></div>
										<div class="descr"><a href="<?php echo U('Details/details?id='.$vo['prodId']);?>" target="_blank"><?php echo ($vo['prodName']); ?></a></div>
										<div class="price"><input prodId="<?php echo ($vo['prodId']); ?>" type="checkbox" name="check" value="1">￥<span><?php echo ($vo['price2']); ?></span></div>
										<div class="m_goods"><a href="<?php echo U('List/index?cat='.$vo['proPath']);?>" target="_blank">更多<?php echo ($vo['proName']); ?></a></div>
									</li>
									
							<?php
 } endforeach; endif; ?>
						</ul>
						</div>
						<!-- 所选商品及配件总价 -->
						<div class="goods3">
							<div class="enter"><a href="<?php echo U('Second/index?cat='.$prod['proPath']);?>" target="_blank">进入选购中心 &gt; </a></div>
							<div id="renqiNum" class="cd">已选择0个配件</div>
							<div class="t_price">
								<ul>
									<li class="eq">&nbsp;=&nbsp;</li>
									<li>
										搭配价：<span>￥<span><?php echo ($prod['price2']); ?></span></span><br/>
										参考价：<del>￥<span style="color:#777;font-size:13px;"><?php echo ($prod['price1']); ?></span></del>
									</li>
								</ul>
							</div>
							<div id="renqi" class="shopping1"><button>立即购买</button></div>
						</div>
					</div>
				</div>
				<!-- 商品介绍 -->
				<div class="spjs">
					<!-- 标题导航 -->
					<div class="bt">
						<ul>
							<li class="title1">商品介绍</li>
							<li class="title2">规格参数</li>
							<li class="title2">包装清单</li>
							<li class="title2">商品评价(<?php echo ($commentsCount); ?>)</li>
							<li class="title2">售后保障</li>
						</ul>
					</div>
					<!-- 商品信息 -->
					<div class="goods_messages">
						<ul>
						<?php if(is_array($arr10)): foreach($arr10 as $key=>$jieshao): ?><li>商品名称：<?php echo ($jieshao['prodName']); ?></li>
							<li>商品编号：<?php echo ($jieshao['productId']); ?></li>
							<li>品牌：<a href="<?php echo U('List/index?cat='.$jieshao['proPath']);?>" target="_blank"><?php echo ($jieshao['brandName']); ?></a></li>
							<li>上架时间：<?php echo date('Y-m-d H:i:s',$jieshao['addtime'])?></li>
							<li>颜色：<?php echo ($jieshao['colorName']); ?></li>
							<li>商品产地：中国大陆</li>
							<li>尺寸：<?php echo ($jieshao['sizeName']); ?></li><?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
				<!-- 错误提醒 -->
				<div class="notice">
					<span class="pic"><img src="/jd/Public/Uploads/images/notice.jpg"></span>
					<span class="text">如果您发现商品信息不准确，<a href="#">欢迎纠错</a></span>
				</div>
				<!-- 规格参数 -->
				<div id="canshu">
					<table border="1px" width="100%" style="border-collapse:collapse;border-color:#ccc;font-size:13px;">
						<tr>
							<td colspan="2" class="zhuti">主体</td>
						</tr>
						<tr>
							<td style="width:200px;" class="left_name">型号</td>
							<td>战神K650D-i5 D1</td>
						</tr>
						<tr>
							<td class="left_name">颜色</td>
							<td>灰色</td>
						</tr>
						<tr>
							<td colspan="2" class="zhuti">操作系统</td>
						</tr>
						<tr>
							<td class="left_name">平台</td>
							<td>Intel</td>
						</tr>
						<tr>
							<td class="left_name">操作系统</td>
							<td>Linx</td>
						</tr>
						<tr>
							<td class="zhuti" colspan="2">处理器</td>
						</tr>
						<tr>
							<td class="left_name">CPU类型</td>
							<td>第四代智能英特尔酷睿i5处理器</td>
						</tr>
						<tr>
							<td class="left_name">CUP型号</td>
							<td>i5-4210M</td>
						</tr>
						<tr>
							<td class="left_name">CPU速度</td>
							<td>2.6GHz</td>
						</tr>
						<tr>
							<td class="left_name">三级缓存</td>
							<td>3M</td>
						</tr>
						<tr>
							<td class="left_name">内建GPU</td>
							<td>Intel核芯显卡</td>
						</tr>
						<tr>
							<td class="left_name">核心</td>
							<td>双核</td>
						</tr>
						<tr>
							<td class="zhuti" colspan="2">芯片组</td>
						</tr>
						<tr>
							<td class="left_name">芯片组</td>
							<td>英特尔HM86芯片组</td>
						</tr>
						<tr>
							<td class="zhuti" colspan="2">内存</td>
						</tr>
						<tr>
							<td class="left_name">内存容量</td>
							<td>4GB</td>
						</tr>
						<tr>
							<td class="left_name">内存类型</td>
							<td>DDR3</td>
						</tr>
						<tr>
							<td class="left_name">插槽数量</td>
							<td>2×SO-DIMM</td>
						</tr>
						<tr>
							<td class="left_name">最大支持容量</td>
							<td>16GB</td>
						</tr>
						<tr>
							<td class="zhuti" colspan="2">硬盘</td>
						</tr>
						<tr>
							<td class="left_name">硬盘容量</td>
							<td>500GB</td>
						</tr>
						<tr>
							<td class="left_name">接口类型</td>
							<td>SATA</td>
						</tr>
						<tr>
							<td class="left_name">固态硬盘</td>
							<td>预留固态硬盘仓msata3.0</td>
						</tr>
						<tr>
							<td class="zhuti" colspan="2">显卡</td>
						</tr>
						<tr>
							<td class="left_name">类型</td>
							<td>集显+独显</td>
						</tr>
						<tr>
							<td class="left_name">显卡芯片</td>
							<td>HD4600+GTX850M 2GDDR3</td>
						</tr>
						<tr>
							<td class="left_name">显存容量</td>
							<td>独立2GB</td>
						</tr>
						<tr>
							<td class="left_name">双显卡</td>
							<td>支持</td>
						</tr>
						<tr>
							<td class="zhuti" colspan="2">显示器</td>
						</tr>
						<tr>
							<td class="left_name">屏幕尺寸</td>
							<td>15英寸</td>
						</tr>
						<tr>
							<td class="left_name">屏幕规格</td>
							<td>15.6英寸</td>
						</tr>
						<tr>
							<td class="left_name">显示比例</td>
							<td>宽屏16：9</td>
						</tr>
						<tr>
							<td class="left_name">物理分辨率</td>
							<td>1920×1080</td>
						</tr>
						<tr>
							<td class="left_name">屏幕类型</td>
							<td>LED背光</td>
						</tr>
						<tr>
							<td class="left_name">特征</td>
							<td>IPS屏</td>
						</tr>
					</table>
				</div>
				<!-- 包装清单 -->
				<div id="bzqd">
					<span>笔记本电脑×1 电池×1 电源适配器×1 驱动光盘×1 保修卡×1</span>
				</div>
				<div id="shfw">
					<ul>
						<li>本产品全国联保，享受三包服务，质保期为：一年质保</li>
						<li>您可以查询本品牌在各地售后服务中心的联系方式，<a href="#">请点击这儿查询......</a></li>
						<br/>
						<li>售后服务电话：4001069999</li>
						<li>品牌官方网站：<a href="http://www.hasee.com/cn/index.html">http://www.hasee.com/cn/index.html</a></li>
					</ul>
				</div>
				<!-- 商品信息展示 -->
				<div class="pics">
					<div class="pic1">
						<a href="#"><img src="/jd/Public/Uploads/images/53c4a8d4Nfc59415f.jpg"></a>
					</div>
					<div class="pic2">
						<a href="#"><img src="/jd/Public/Uploads/images/53fbe53dN47908647.gif"></a>
					</div>
					<?php if(is_array($prods)): $i = 0; $__LIST__ = $prods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prodimg): $mod = ($i % 2 );++$i;?><div class="pic3">
							<img src="/jd/Public/Uploads/<?php echo ($prodimg['image']); ?>" width="350px" height="350px" imgid="<?php echo ($i-1); ?>">
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<!-- 服务承若 -->
				<div class="fwcr">
					<div class="text2">服务承若：</div>
					<div class="text3">
						京东向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。凭质保证书及京东发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由京东联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。京东还为您提供具有竞争力的商品价格和运费政策，请您放心购买！ <br/><br/>
						<b>注：</b>因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！ 
					</div>
				</div>
				<!-- 权利声明 -->
				<div class="qlsm">
					<div class="text2">权利声明：</div>
					<div class="text3">
						京东上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东重要的经营资源，未经许可，禁止非法转载使用。<br/>
						<b>注：</b>本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。
					</div>
				</div>
				<!-- 商品总评 -->
				<?php if(is_array($arr11)): foreach($arr11 as $key=>$comments): $count = count($arr11); if($comments['commentsdj'] == 1){ $hp += 1; } if($comments['commentsdj'] == 2){ $zp += 1; } if($comments['commentsdj'] == 3){ $cp += 1; } $hpl = ceil(($hp/$count)*100); $zpl = ceil(($zp/$count)*100); $cpl = ceil(($cp/$count)*100); $arr12 = explode(',',$comments['mjyx']); if(in_array(0,$arr12)){ $pzbc += 1; } if(in_array(1, $arr12)){ $dnhbc += 1; } if(in_array(2, $arr12)){ $pmgqx += 1; } if(in_array(3, $arr12)){ $yxlc += 1; } if(in_array(4, $arr12)){ $sdk += 1; } if(in_array(5, $arr12)){ $wgpl += 1; } if(in_array(6, $arr12)){ $srh += 1; } endforeach; endif; ?>
				<div class="spzp">
					<div class="sppj"><span>商品评价</span></div>
					<div class="p_content">
						<div class="hpl">
							<span class="zhi">
							<?php
 if((isset($count)?$count:0) == 0){ echo 100; }else{ echo isset($hpl)?$hpl:0; } ?>
							%</span><br/>
							好评度
						</div>
						<div class="jindu">
							<ul>
								<li>
									好评(<?php
 if((isset($count)?$count:0) == 0){ echo 100; }else{ echo isset($hpl)?$hpl:0;} ?>%) 
									<span class="jindutiao">
										<?php
 if((isset($count)?$count:0) == 0){ for($i = 0;$i<100;$i++){ echo "<span class='jdt_red'></span>"; } }else{ for($i=0;$i<$hpl;$i++){ echo "<span class='jdt_red'></span>"; } } ?>
									</span>
								</li>
								<li>中评(<?php echo isset($zpl)?$zpl:0;?>%) 
									<span class="jindutiao">
										<?php
 for($i=0;$i<$zpl;$i++){ echo "<span class='jdt_red'></span>"; } ?>
										
									</span>
								</li>
								<li>差评(<?php echo isset($cpl)?$cpl:0;?>%) 
									<span class="jindutiao">
										<?php
 for($i=0;$i<$cpl;$i++){ echo "<span class='jdt_red'></span>"; } ?>
									</span>
								</li>
							</ul>
						</div>
						<div class="fgt"></div>
						<div class="mjyx">
							<div class="text">买家印象：</div>
							<ul>
								<li>配置不错(<?php echo isset($pzbc)?$pzbc:0;?>)</li>
								<li>电脑还不错(<?php echo isset($dnhbc)?$dnhbc:0;?>)</li>
								<li>屏幕够清晰(<?php echo isset($pmgqx)?$pmgqx:0;?>)</li>
								<li>运行流畅(<?php echo isset($yxlc)?$yxlc:0;?>)</li>
								<li>速度快({<?php echo isset($sdk)?$sdk:0;?>)</li>
								<li>外观漂亮(<?php echo isset($wgpl)?$wgpl:0;?>)</li>
								<li>散热好(<?php echo isset($srh)?$srh:0;?>)</li>
							</ul>
						</div>
						<div class="fgt"></div>
						<!-- 发表评论 -->
						<div class="fbpl">
							<div>您可对已购商品进行评价</div>
							<div class="button" style="cursor: pointer;"><a href="<?php echo U('Comments/comments/id/'.$prod['prodId']);?>" target='_blank'><button>发评价拿京豆</button></a></div>
							<div class="guize">前五名可获双倍京豆<a href="#">[规则]</a></div>
						</div>
					</div>
				</div>
				<!-- 评论详情 -->
				
					<div class="plxq">
						<div class="bt">
							<ul>
								<li class="title1">全部评价(<?php echo isset($count)?$count:0;?>)</li>
								<li class="title2">好评(<?php echo isset($hp)?$hp:0;?>)</li>
								<li class="title2">中评(<?php echo isset($zp)?$zp:0;?>)</li>
								<li class="title2">差评(<?php echo isset($cp)?$cp:0;?>)</li>
							</ul>
						</div>
					<?php if(is_array($arr13)): foreach($arr13 as $key=>$con): ?><!--  -->
						<div class="p_content p_content1">
							<!-- 所有评论 -->
							<!-- 会员 -->
							<div class="huiyuan">
								<div class="touxiang">
									<a href="#">
										<img src="
											<?php
 if(!empty($con['userimg'])){ echo "/jd/Public/Uploads/".$con['userimg']; }else{ ?>
												/jd/Public/Uploads/Images/<?php echo ($con['userHYdjimg']); ?>
											<?php
 } ?>
										" width="60px" height="60px">
									</a>
								</div>
								<div class="username">
									<a href="<?php echo U('Ucenter/index?uid='.$con['uId']);?>" target="_blank"><?php echo ($con['nickName']); ?></a>
								</div>
								<div class="dengji">
									<?php
 if($con['userHYdjId'] == 0){ echo "注册会员"; }else if($con['userHYdjId'] == 1){ echo "铜牌会员"; }else if($con['userHYdjId'] == 2){ echo "银牌会员"; }else if($con['userHYdjId'] == 3){ echo "金牌会员"; }else if($con['userHYdjId'] == 4){ echo "钻石会员"; } ?>
								</div>
							</div>
							<!-- 评论内容 -->
							
							<div class="content">
								<div class="xingji">
									<div class="xing1">
										<?php
 for($i = 0;$i<$con['Gcode'];$i++){ echo "★"; } ?>
									</div>
									<div class="xing2">
										<?php
 for($i = 0;$i<5-$con['Gcode'];$i++){ echo "★"; } ?>
									</div>
									<div class="add_time"><?php echo date('Y-m-d H:i:s',$con['commentsTime']);?></div>
								</div>
								<div class="yhpj">
									<ul>
										<li>标&nbsp;&nbsp;&nbsp;&nbsp;签：
										<?php
 $mjyx = array(); $mjyx = explode(",", $con['mjyx']); if(in_array(0,$mjyx)){ echo "<span>配置不错</span>"; } if(in_array(1, $mjyx)){ echo "<span>电脑还不错</span>"; } if(in_array(2, $mjyx)){ echo "<span>屏幕够清晰</span>"; } if(in_array(3, $mjyx)){ echo "<span>运行流畅</span>"; } if(in_array(4, $mjyx)){ echo "<span>速度快</span>"; } if(in_array(5, $mjyx)){ echo "<span>外观漂亮</span>"; } if(in_array(6, $mjyx)){ echo "<span>散热好</span>"; } ?>
										</li>
										<li>心&nbsp;&nbsp;&nbsp;&nbsp;得：<?php echo ($con['content']); ?></li>
										<li>颜&nbsp;&nbsp;&nbsp;&nbsp;色：<?php echo ($con['colorName']); ?></li>
										<li>尺&nbsp;&nbsp;&nbsp;&nbsp;寸：<?php echo ($con['sizeName']); ?></li>
										<li>购买日期：<?php echo date('Y-m-d H:i:s',$con['orderTime']);?></li>
									</ul>
								</div>
								<div class="hf">
									<ul>
										<li class="c_hf">回复(<?php echo ($cbCount); ?>)</li>
										
									</ul>
									<div class="callback1">
										<form action="<?php echo U('do_callback');?>" method="post" onSubmit="return callback(this)">
											<div id="h_back"><span>回复：<i><?php echo ($con['nickName']); ?></i>:</span></div>
											<input type="hidden" name="objectName"/>
											<input type="hidden" name="prodId" value="<?php echo ($comments['cId']); ?>">
											<input type="text" name="cbContent" id="c_back"/>
											<input type="submit" value="回复" id="button"/>
										</form>
									</div>
								</div>
								<script type="text/javascript">
									function callback(b){
										var username = $(b).find('i').text();
										//console.log(username);
										//return false;
										var content = $(b).find('input[name=cbContent]').val();
										$(b).find('input[name=objectName]').val(username);
										$(b).find('input[name=username]').val(uname);
										<?php
 if(empty($_SESSION['user'])){ ?>
										//console.log($(window).scrollTop());

										 $('.thickbox').show().offset({'top':2000,'left':450});
										$('.thickdiv').show();
										return false;
										<?php
 } ?>
									}
								</script>
						
								<div class="yhhfnr">
									<ul>
									<?php if(is_array($arr14)): $i = 0; $__LIST__ = $arr14;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$callback): $mod = ($i % 2 );++$i; if($con['uId'] == $callback['objectId']){ ?>
										<li>
											<span class="num"><?php echo ($n); ?></span><span class="yhm"><a href="#"><?php echo ($callback['userName']); ?></a> ：回复：<a href="#"><?php echo ($callback['objectName']); ?></a>：</span><span class="nr"><?php echo ($callback['cbContent']); ?></span>
											<div class="hfsj"><?php echo date('Y-m-d H:i:s',$callback['cbTime']);?><span style="float:right;color:#005AA0;margin-right:50px;display:none;cursor:pointer;">回复</span></div>
											<div class="callback">
												<form action="<?php echo U('do_callback');?>" method="post" onSubmit="return callback(this)">
													<div id="h_back"><span>回复：<i><?php echo ($callback['userName']); ?></i>:</span></div>
													<input type="hidden" name="objectName"/>
													<input type="hidden" name="prodId" value="<?php echo ($callback['prodId']); ?>">
													<input type="text" name="cbContent" id="c_back"/>
													<input type="submit" value="回复" id="button"/>
												</form>
											</div>
										</li>
										<?php
 } endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						</div>
						
						<!-- 所有好评 -->
						<?php
 if($con['commentsdj'] == 1){ ?>
						<div class="p_content p_content2">
							<!-- 会员 -->
							<div class="huiyuan">
								<div class="touxiang">
									<a href="#">
										<img src="
											<?php
 if(!empty($con['userimg'])){ echo "/jd/Public/Uploads/".$con['userimg']; }else{ ?>
												/jd/Public/Uploads/Images/<?php echo ($con['userHYdjimg']); ?>
											<?php
 } ?>
										" width="60px" height="60px">
									</a>
								</div>
								<div class="username">
									<a href="#"><?php echo ($con['nickName']); ?></a>
								</div>
								<div class="dengji">
									<?php
 if($con['userHYdjId'] == 0){ echo "注册会员"; }else if($con['userHYdjId'] == 1){ echo "铜牌会员"; }else if($con['userHYdjId'] == 2){ echo "银牌会员"; }else if($con['userHYdjId'] == 3){ echo "金牌会员"; }else if($con['userHYdjId'] == 4){ echo "钻石会员"; } ?>
								</div>
							</div>
							<!-- 评论内容 -->
							
							<div class="content">
								<div class="xingji">
									<div class="xing1">
										<?php
 for($i = 0;$i<$con['Gcode'];$i++){ echo "★"; } ?>
									</div>
									<div class="xing2">
										<?php
 for($i = 0;$i<5-$con['Gcode'];$i++){ echo "★"; } ?>
									</div>
									<div class="add_time"><?php echo date('Y-m-d H:i:s',$con['commentsTime']);?></div>
								</div>
								<div class="yhpj">
									<ul>
										<li>标&nbsp;&nbsp;&nbsp;&nbsp;签：
										<?php
 $mjyx = array(); $mjyx = explode(",", $con['mjyx']); if(in_array(0,$mjyx)){ echo "<span>配置不错</span>"; } if(in_array(1, $mjyx)){ echo "<span>电脑还不错</span>"; } if(in_array(2, $mjyx)){ echo "<span>屏幕够清晰</span>"; } if(in_array(3, $mjyx)){ echo "<span>运行流畅</span>"; } if(in_array(4, $mjyx)){ echo "<span>速度快</span>"; } if(in_array(5, $mjyx)){ echo "<span>外观漂亮</span>"; } if(in_array(6, $mjyx)){ echo "<span>散热好</span>"; } ?>
										</li>
										<li>心&nbsp;&nbsp;&nbsp;&nbsp;得：<?php echo ($con['content']); ?></li>
										<li>颜&nbsp;&nbsp;&nbsp;&nbsp;色：<?php echo ($con['colorName']); ?></li>
										<li>尺&nbsp;&nbsp;&nbsp;&nbsp;寸：<?php echo ($con['sizeName']); ?></li>
										<li>购买日期：<?php echo date('Y-m-d H:i:s',$con['orderTime']);?></li>
									</ul>
								</div>
								<div class="hf">
									<ul>
										<li class="c_hf">回复(<?php echo ($cbCount); ?>)</li>
										
									</ul>
									<div class="callback1">
										<form action="<?php echo U('do_callback');?>" method="post" onSubmit="return callback(this)">
											<div id="h_back"><span>回复：<i><?php echo ($con['nickName']); ?></i>:</span></div>
											<input type="hidden" name="objectName"/>
											<input type="hidden" name="prodId" value="<?php echo ($comments['cId']); ?>">
											<input type="text" name="cbContent" id="c_back"/>
											<input type="submit" value="回复" id="button"/>
										</form>
									</div>
								</div>
								<div class="yhhfnr">
									<ul>
									<?php if(is_array($arr14)): $i = 0; $__LIST__ = $arr14;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$callback): $mod = ($i % 2 );++$i; if($con['uId'] == $callback['objectId']){ ?>
										<li>
											<span class="num"><?php echo ($n); ?></span><span class="yhm"><a href="#"><?php echo ($callback['userName']); ?></a> ：回复：<a href="#"><?php echo ($callback['objectName']); ?></a>：</span><span class="nr"><?php echo ($callback['cbContent']); ?></span>
											<div class="hfsj"><?php echo date('Y-m-d H:i:s',$callback['cbTime']);?><span style="float:right;color:#005AA0;margin-right:50px;display:none;cursor:pointer;">回复</span></div>
											<div class="callback">
												<form action="<?php echo U('do_callback');?>" method="post" onSubmit="return callback(this)">
													<div id="h_back"><span>回复：<i><?php echo ($callback['userName']); ?></i>:</span></div>
													<input type="hidden" name="objectName"/>
													<input type="hidden" name="prodId" value="<?php echo ($callback['prodId']); ?>">
													<input type="text" name="cbContent" id="c_back"/>
													<input type="submit" value="回复" id="button"/>
												</form>
											</div>
										</li>
										<?php
 } endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						</div>
						<?php
 } ?>
						<!-- 所有中评 -->
						<?php
 if($con['commentsdj'] == 2){ ?>
						<div class="p_content p_content3">
							<!-- 所有评论 -->
							<!-- 会员 -->
							<div class="huiyuan">
								<div class="touxiang">
									<a href="#">
										<img src="
											<?php
 if(!empty($con['userimg'])){ echo "/jd/Public/Uploads/".$con['userimg']; }else{ ?>
												/jd/Public/Uploads/Images/<?php echo ($con['userHYdjimg']); ?>
											<?php
 } ?>
										" width="60px" height="60px">
									</a>
								</div>
								<div class="username">
									<a href="#"><?php echo ($con['nickName']); ?></a>
								</div>
								<div class="dengji">
									<?php
 if($con['userHYdjId'] == 0){ echo "注册会员"; }else if($con['userHYdjId'] == 1){ echo "铜牌会员"; }else if($con['userHYdjId'] == 2){ echo "银牌会员"; }else if($con['userHYdjId'] == 3){ echo "金牌会员"; }else if($con['userHYdjId'] == 4){ echo "钻石会员"; } ?>
								</div>
							</div>
							<!-- 评论内容 -->
							
							<div class="content">
								<div class="xingji">
									<div class="xing1">
										<?php
 for($i = 0;$i<$con['Gcode'];$i++){ echo "★"; } ?>
									</div>
									<div class="xing2">
										<?php
 for($i = 0;$i<5-$con['Gcode'];$i++){ echo "★"; } ?>
									</div>
									<div class="add_time"><?php echo date('Y-m-d H:i:s',$con['commentsTime']);?></div>
								</div>
								<div class="yhpj">
									<ul>
										<li>标&nbsp;&nbsp;&nbsp;&nbsp;签：
										<?php
 $mjyx = array(); $mjyx = explode(",", $con['mjyx']); if(in_array(0,$mjyx)){ echo "<span>配置不错</span>"; } if(in_array(1, $mjyx)){ echo "<span>电脑还不错</span>"; } if(in_array(2, $mjyx)){ echo "<span>屏幕够清晰</span>"; } if(in_array(3, $mjyx)){ echo "<span>运行流畅</span>"; } if(in_array(4, $mjyx)){ echo "<span>速度快</span>"; } if(in_array(5, $mjyx)){ echo "<span>外观漂亮</span>"; } if(in_array(6, $mjyx)){ echo "<span>散热好</span>"; } ?>
										</li>
										<li>心&nbsp;&nbsp;&nbsp;&nbsp;得：<?php echo ($con['content']); ?></li>
										<li>颜&nbsp;&nbsp;&nbsp;&nbsp;色：<?php echo ($con['colorName']); ?></li>
										<li>尺&nbsp;&nbsp;&nbsp;&nbsp;寸：<?php echo ($con['sizeName']); ?></li>
										<li>购买日期：<?php echo date('Y-m-d H:i:s',$con['orderTime']);?></li>
									</ul>
								</div>
								<div class="hf">
									<ul>
										<li class="c_hf">回复(<?php echo ($cbCount); ?>)</li>
										
									</ul>
									<div class="callback1">
										<form action="<?php echo U('do_callback');?>" method="post" onSubmit="return callback(this)">
											<div id="h_back"><span>回复：<i><?php echo ($con['nickName']); ?></i>:</span></div>
											<input type="hidden" name="objectName"/>
											<input type="hidden" name="prodId" value="<?php echo ($comments['cId']); ?>">
											<input type="text" name="cbContent" id="c_back"/>
											<input type="submit" value="回复" id="button"/>
										</form>
									</div>
								</div>
								<div class="yhhfnr">
									<ul>
									<?php if(is_array($arr14)): $i = 0; $__LIST__ = $arr14;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$callback): $mod = ($i % 2 );++$i; if($con['uId'] == $callback['objectId']){ ?>
										<li>
											<span class="num"><?php echo ($n); ?></span><span class="yhm"><a href="#"><?php echo ($callback['userName']); ?></a> ：回复：<a href="#"><?php echo ($callback['objectName']); ?></a>：</span><span class="nr"><?php echo ($callback['cbContent']); ?></span>
											<div class="hfsj"><?php echo date('Y-m-d H:i:s',$callback['cbTime']);?><span style="float:right;color:#005AA0;margin-right:50px;display:none;cursor:pointer;">回复</span></div>
											<div class="callback">
												<form action="<?php echo U('do_callback');?>" method="post" onSubmit="return callback(this)">
													<div id="h_back"><span>回复：<i><?php echo ($con['nickName']); ?></i>:</span></div>
													<input type="hidden" name="objectName"/>
													<input type="hidden" name="prodId" value="<?php echo ($callback['prodId']); ?>">
													<input type="text" name="cbContent" id="c_back"/>
													<input type="submit" value="回复" id="button"/>
												</form>
											</div>
										</li>
										<?php
 } endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						</div>
						<?php
 } ?>
						<!-- 所有差评 -->
						<?php
 if($con['commentsdj'] == 3){ ?>
						<div class="p_content p_content4">
							<!-- 所有评论 -->
							<!-- 会员 -->
							<div class="huiyuan">
								<div class="touxiang">
									<a href="#">
										<img src="
											<?php
 if(!empty($con['userimg'])){ echo "/jd/Public/Uploads/".$con['userimg']; }else{ ?>
												/jd/Public/Uploads/Images/<?php echo ($con['userHYdjimg']); ?>
											<?php
 } ?>
										" width="60px" height="60px">
									</a>
								</div>
								<div class="username">
									<a href="#"><?php echo ($con['nickName']); ?></a>
								</div>
								<div class="dengji">
									<?php
 if($con['userHYdjId'] == 0){ echo "注册会员"; }else if($con['userHYdjId'] == 1){ echo "铜牌会员"; }else if($con['userHYdjId'] == 2){ echo "银牌会员"; }else if($con['userHYdjId'] == 3){ echo "金牌会员"; }else if($con['userHYdjId'] == 4){ echo "钻石会员"; } ?>
								</div>
							</div>
							<!-- 评论内容 -->
							
							<div class="content">
								<div class="xingji">
									<div class="xing1">
										<?php
 for($i = 0;$i<$con['Gcode'];$i++){ echo "★"; } ?>
									</div>
									<div class="xing2">
										<?php
 for($i = 0;$i<5-$con['Gcode'];$i++){ echo "★"; } ?>
									</div>
									<div class="add_time"><?php echo date('Y-m-d H:i:s',$con['commentsTime']);?></div>
								</div>
								<div class="yhpj">
									<ul>
										<li>标&nbsp;&nbsp;&nbsp;&nbsp;签：
										<?php
 $mjyx = array(); $mjyx = explode(",", $con['mjyx']); if(in_array(0,$mjyx)){ echo "<span>配置不错</span>"; } if(in_array(1, $mjyx)){ echo "<span>电脑还不错</span>"; } if(in_array(2, $mjyx)){ echo "<span>屏幕够清晰</span>"; } if(in_array(3, $mjyx)){ echo "<span>运行流畅</span>"; } if(in_array(4, $mjyx)){ echo "<span>速度快</span>"; } if(in_array(5, $mjyx)){ echo "<span>外观漂亮</span>"; } if(in_array(6, $mjyx)){ echo "<span>散热好</span>"; } ?>
										</li>
										<li>心&nbsp;&nbsp;&nbsp;&nbsp;得：<?php echo ($con['content']); ?></li>
										<li>颜&nbsp;&nbsp;&nbsp;&nbsp;色：<?php echo ($con['colorName']); ?></li>
										<li>尺&nbsp;&nbsp;&nbsp;&nbsp;寸：<?php echo ($con['sizeName']); ?></li>
										<li>购买日期：<?php echo date('Y-m-d H:i:s',$con['orderTime']);?></li>
									</ul>
								</div>
								<div class="hf">
									<ul>
										<li class="c_hf">回复(<?php echo ($cbCount); ?>)</li>
										
									</ul>
									<div class="callback1">
										<form action="<?php echo U('do_callback');?>" method="post" onSubmit="return callback(this)">
											<div id="h_back"><span>回复：<i><?php echo ($con['nickName']); ?></i>:</span></div>
											<input type="hidden" name="objectName"/>
											<input type="hidden" name="prodId" value="<?php echo ($comments['cId']); ?>">
											<input type="text" name="cbContent" id="c_back"/>
											<input type="submit" value="回复" id="button"/>
										</form>
									</div>
								</div>
								<div class="yhhfnr">
									<ul>
									<?php if(is_array($arr14)): $i = 0; $__LIST__ = $arr14;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$callback): $mod = ($i % 2 );++$i; if($con['uId'] == $callback['objectId']){ ?>
										<li>
											<span class="num"><?php echo ($n); ?></span><span class="yhm"><a href="#"><?php echo ($callback['userName']); ?></a> ：回复：<a href="#"><?php echo ($callback['objectName']); ?></a>：</span><span class="nr"><?php echo ($callback['cbContent']); ?></span>
											<div class="hfsj"><?php echo date('Y-m-d H:i:s',$callback['cbTime']);?><span style="float:right;color:#005AA0;margin-right:50px;display:none;cursor:pointer;">回复</span></div>
											<div class="callback">
												<form action="<?php echo U('do_callback');?>" method="post" onSubmit="return callback(this)">
													<div id="h_back"><span>回复：<i><?php echo ($con['nickName']); ?></i>:</span></div>
													<input type="hidden" name="objectName"/>
													<input type="hidden" name="prodId" value="<?php echo ($callback['prodId']); ?>">
													<input type="text" name="cbContent" id="c_back"/>
													<input type="submit" value="回复" id="button"/>
												</form>
											</div>
										</li>
										<?php
 } endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						</div>
						<?php
 } endforeach; endif; ?>
					<div style="float:left;font-size:13px;margin-left:130px;margin-top:10px;">
						<a href="<?php echo U('Details/allComments?id='.$prod['prodId']);?>">查看评论详情</a>
					</div>
					<div style="float:right;margin:10px;font-size:16px;">
						<?php echo $show; ?>
					</div>
					</div>
				
			</div>
		</div>
		<div style="clear:both;"></div>
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
		<!--------------------弹层效果---------------------->
								<div class='thickdiv' style="display:none"></div>
								<div class='thickbox' style='top:1800px;display:none'>
									<div class="boxtitle">
										<b>您尚未登录</b>
										<a href='#'>×</a>
									</div>
									<div class='thickcon'>
										<ul>
											<li style="border-bottom:none;background:#fff;height:26px;"><b>登 录</b></li>
											<li style="background:#F7F7F7;margin-bottom:1px"><a href='<?php echo U('Register/register');?>'>注册</a></li>
										</ul>
										<form action="#" method="post" onsubmit="return false;">
										<div class="item fore1" style="	margin-top: 30px;">
											<span>邮箱/用户名</span>
											<div class="inputbox">
												<input type='text' name="uname">
												<i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
											</div>
											<label id='uname'></label>
										</div>
										<div class="item fore2">
											<span>密码</span>
											<div class="inputbox">
												<input type='password' name="upass">
												<i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
											</div>
											<label id='upass'></label>
										</div>
										<div class="item fore3">
											<span>&nbsp;</span>
											<div class="inputbox"  style="border:none">
												<input style='font-weight:bold;color:#E43F42;font-size:16px;'type='text' readonly>
											</div>
											<label id='errorinfo'></label>
										</div>
										<div class="item fore4">
						<!-- 					<span>&nbsp;</span>
						 -->					<div class="inputbox" style="border:none";>
												<input type='button' class="submit-button" value="登录">
											</div>
											<label id='tijiao'></label>
										</div>
										</form>
										<a style='margin-left:300px;color:purple;'href='<?php echo U('Findpwd/index');?>'>找回密码</a>
										<div class="item fore5">
											<span>合作网站</span>
											<div class="inputbox" style="border:none;">
													<em>QQ</em>
													<em>网易</em>
													<em>奇虎360</em>
													<em>开心</em>
													<em>豆掰</em>
													<em>搜狐</em>
											</div>
											<label id='collation'></label>
										</div>
									</div>
								</div>
								<!--------------------弹层效果---------------------->
	</div>
</body>
</html>