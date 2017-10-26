<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<title>列表页</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="/jd/Application/Home/Common/Css//list.css" />
		<script src="/jd/Application/Home/Common/Js//jquery-1.8.3.js"></script>
		<script src="/jd/Application/Home/Common/Js//list.js"></script>
		<script>
			//定义数据发送地址
			var address = "<?php echo U('Cart/addCart');?>";
			var compareListNum=<?php  $compareList=cookie("prodIdCookie"); if(!empty($compareList)){ echo count($compareList); }else{ echo 0; } ?>;
			var sessionExist=<?php
 if(!empty($_SESSION['user'])){ echo 1; }else{ echo -1; } ?>;
		</script>
	</head>
	<body>
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
	<!-------------------面包屑导航start---------------------->
		<div class="w">
			<div class="breadcrumb">
				<strong>
					<a href="<?php echo U("Index/index");?>"><?php echo ($breadLead[0]['proName']); ?></a>
				</strong>
				<span>
					&nbsp;>&nbsp;
					<a href="<?php echo U("Second/index",array('cat'=>$breadLead[1]['proPath']));?>"><?php echo ($breadLead[1]['proName']); ?></a>
					&nbsp;>&nbsp;
					<a href="<?php echo U("List/index",array('cat'=>$breadLead[2]['proPath']));?>"><?php echo ($breadLead[2]['proName']); ?></a>
				</span>
				</strong>
			</div>
		</div>
		<!-------------------面包屑导航end---------------------->
		<!-------------------主体start---------------------->
		<div id="main" class="w">
		<!-------------------左内容start---------------------->
			<div class="left_list">
			<!-------------------左列表start---------------------->
				<div id="sortlist" class="m">
					<div class="mc">
						<?php if(is_array($leftCate)): foreach($leftCate as $key=>$cate2): ?><div class='item <?php echo ($catestatus==$cate2['proTypeId'])?'current1':'';?>'>
								<h3><b></b><?php echo ($cate2["proName"]); ?></h3>
								<ul>
									<?php if(is_array($cate2["child"])): foreach($cate2["child"] as $key=>$cate3): ?><li><a href='<?php echo U('List/index',array('cat'=>$cate3[proPath]));?>'><?php echo ($cate3["proName"]); ?></a></li><?php endforeach; endif; ?>
								</ul>
							</div><?php endforeach; endif; ?>
					</div>
				</div>
				<!-------------------左列表end---------------------->
				<!-------------------左抢购start---------------------->
				<div id="limitBuy">
					<div class="m limitbuy">
						<div class="mt">
							<h2>IT数码</h2>
						</div>
						<div class="mc">
						<?php if(!empty($limitSale)){?>
							<div id="clock" class="clock1">
								
							</div>
						<?php } ?>
							<div>
								<ul>
									<?php if(is_array($limitSale)): foreach($limitSale as $key=>$val): ?><li>
										<div class="p-img">
											<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>" target="_blank"><img src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>" style="width:100px" /></a>
											<div class="pi9"></div>
										</div>
										<div class="p-name"><a target="_blank" href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><?php echo ($val["prodInfo"]); ?></a></div>
										<div class="p-price">抢购价：<strong><?php echo ($val["price2"]); ?></strong></div>
									</li><?php endforeach; endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-------------------左列表end---------------------->
				<!-------------------左商品start---------------------->
				<div class="j_box">
					<div class="j_logo">
						推广商品
					</div>
					<div class=".j_boxcontent">
						<div id="cont" class="j_skulist">
							<ul style='display:<?php echo empty($popSale)?"none":"block"?>' id="list1" class="clearfix">
								<li>
									<div class="p_img">
										
										<a href="<?php echo U("Details/details",array('id'=>$popSale['prodId']));?>"><img src="/jd/Public/Uploads/<?php echo ($popSale["img"]); ?>" style="width:160px;height:160px;"/></a>
									</div>
									<div class="p_name"><a href="<?php echo U("Details/details",array('id'=>$popSale['prodId']));?>"><?php echo ($popSale["prodInfo"]); ?></a></div>
									<div class="p_price">
										<span style="display:none"></span>
										<span class="tag_title">￥</span>
										<span class="tag_content"><?php echo ($popSale["price2"]); ?></span>
									</div>
									<div class="p_promo">
										<span>
											<div>
												<span class="tag_title">加价购</span>
												<span>满999加99即赠</span>
											</div>
										</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-------------------左商品end---------------------->
				<!-------------------周销售start---------------------->	
				<div id="weekRank" class="rank m">
					<div class="mt">
						<h2>一周销量排行</h2>
					</div>
					<div class="mc">
						<ul class="tabcon">
							<li class="fore" style="border-top:none;">
								<span>1</span>
								<div class="p-img">
									<a href="<?php echo U('Details/details',array('id'=>$rankSale[0]['prodId']));?>" target="_blank">
										<img src="/jd/Public/Uploads/<?php echo ($rankSale[0]['simimg']); ?>" alt="笔记本" />
									</a>
								</div>
								<div class="p-name">
									<a href="<?php echo U('Details/details',array('id'=>$rankSale[0]['prodId']));?>" tartget="_blank"><?php echo ($rankSale[0]['prodInfo']); ?></a>
								</div>
								<div class="p-price">
									<strong>￥<?php echo ($rankSale[0]['price1']); ?></strong>
								</div>
							</li>

							<li class="fore fore1" >
								<span>2</span>
								<div class="p-img">
									<a href="<?php echo U('Details/details',array('id'=>$rankSale[1]['prodId']));?>" target="_blank">
										<img src="/jd/Public/Uploads/<?php echo ($rankSale[1]['simimg']); ?>" alt="笔记本" />
									</a>
								</div>
								<div class="p-name">
									<a href="<?php echo U('Details/details',array('id'=>$rankSale[1]['prodId']));?>" tartget="_blank"><?php echo ($rankSale[1]['prodInfo']); ?></a>
								</div>
								<div class="p-price">
									<strong>￥<?php echo ($rankSale[1]['price1']); ?></strong>
								</div>
							</li>

						</ul>
					</div>
				</div>
				<!-------------------周销售end---------------------->	
			</div>
			<!-------------------左内容end---------------------->
			<!-------------------右内容start---------------------->
			<div class="right_list">
				<!-------------------右推荐start---------------------->
				<div id="i-right" class="m">
					<div class="j_box1">
						<div class="j_logo1">热卖推荐</div>
						<div class="j_boxcontent1">
							<div id="cont" class="j_skulist1">
								<div class="j_skulist_inner1">
									<ul id="list1" class="clearfix">
									<?php if(is_array($hotSale)): foreach($hotSale as $key=>$val): ?><li>
											<div class="p_img">
												<a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><img src="
												/jd/Public/Uploads/<?php echo ($val["img"]); ?>"/></a>
											</div>
											<div class="p_name"><a href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>" target="_blank"><?php echo ($val["prodInfo"]); ?></a></div>
											<div class="p_price">
												<span>特价:</span>
												<span class="tag_title">￥</span>
												<span class="tag_content"><?php echo ($val["price1"]); ?></span>
											</div>
											<div class="p_cont_cj">
												<div class="p_comment"></div>

											</div>
											<div class="p_buy" prodId='<?php echo ($val["prodId"]); ?>'>
												<a href="javascript:;">立即抢购</a>
											</div>
											<div class="clr"></div>
										</li><?php endforeach; endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div id="market">
						<div class="mt">
							<h2>促销活动</h2>
						</div>
						<div class="mc">
							<ul>
								<?php if(is_array($proSale)): foreach($proSale as $key=>$val): ?><li>
									<a target="_blank" href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>"><?php echo ($val["newsInfo"]); ?></a>
								</li><?php endforeach; endif; ?>
							</ul>

						</div>
					</div>
				</div>
				<!-------------------右推荐end---------------------->
				<!-------------------右搜索start---------------------->
				<div id="select" class="m">
					<div class="mt">
						<h1><?php echo ($currentType); ?>-<strong>商品筛选</strong></h1>
					</div>
					<div class="mc attrs">
						<div class="brand-attr">
							<div class="attr">
								<div class="a-key">品牌：</div>
								<div class="a-values">
									<div class="v-option">
										<span class="o-more" option="more">
											<b></b>更多
										</span>
										<span class="o-more fold hide" option="less">
											<b></b>收起
										</span>
									</div>
									<div class="v-tabs">
										<ul class="tab hide">
											<li class="curr" rel="0">
												所有品牌
												<b></b>
											</li>
										</ul>
										<div class="tabcon">
											<?php if(is_array($brandCate)): foreach($brandCate as $key=>$val): ?><div>
													<a style='<?php if($_GET['brandId']==$val['brandId']){echo 'color:red';} ?>'href="<?php echo U('List/index',array('cat'=>$_GET['cat'],'sizeId'=>$_GET['sizeId'],'priceName'=>$_GET['priceName'],'colorId'=>$_GET['colorId'],'sort'=>$_GET['sort'],'p'=>1,'brandId'=>$val['brandId']));?>"><?php echo ($val["brandName"]); ?></a>
												</div><?php endforeach; endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="prop-attrs">
							<div class="attr">
								<div class="a-key">价格：</div>
								<div class="a-values">
									<div class="v-fold">
										<ul class="f-list">
											<?php if(is_array($priceCate)): foreach($priceCate as $key=>$val): ?><li><a style='<?php if($_GET['priceName']==$val['priceName']){echo 'color:red';} ?>'href="<?php echo U('List/index',array('cat'=>$_GET['cat'],'sizeId'=>$_GET['sizeId'],'colorId'=>$_GET['colorId'],'brandId'=>$_GET['brandId'],'sort'=>$_GET['sort'],'p'=>1,'priceName'=>$val[priceName]));?>"><?php echo ($val["priceName"]); ?></a></li><?php endforeach; endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="prop-attrs">
							<div class="attr">
								<div class="a-key">尺寸：</div>
								<div class="a-values">
									<div class="v-fold">
										<ul class="f-list">
											<?php if(is_array($sizeCate)): foreach($sizeCate as $key=>$val): ?><li><a style='<?php if($_GET['sizeId']==$val['sizeId']){echo 'color:red';} ?>' href="<?php echo U('List/index',array('cat'=>$_GET['cat'],'colorId'=>$_GET['colorId'],'brandId'=>$_GET['brandId'],'priceName'=>$_GET['priceName'],'sort'=>$_GET['sort'],'p'=>1,'sizeId'=>$val[sizeId]));?>"><?php echo ($val["sizeName"]); ?></a></li><?php endforeach; endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="prop-attrs">
							<div class="attr">
								<div class="a-key">颜色：</div>
								<div class="a-values">
									<div class="v-fold">
										<ul class="f-list">
											<?php if(is_array($colorCate)): foreach($colorCate as $key=>$val): ?><li><a style='<?php if($_GET['colorId']==$val['colorId']){echo 'color:red';} ?>'href="<?php echo U('List/index',array('cat'=>$_GET['cat'],'sizeId'=>$_GET['sizeId'],'brandId'=>$_GET['brandId'],'priceName'=>$_GET['priceName'],'sort'=>$_GET['sort'],'p'=>1,'colorId'=>$val[colorId]));?>"><?php echo ($val["colorName"]); ?></a></li><?php endforeach; endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-------------------右搜索end---------------------->
				<div class="clear"></div>
				<!-------------------排序start---------------------->
				<div id="filter">
					
					<div class="fore1">
						<dl class="order">
							<dt>排序：</dt>
							<dd class="<?php echo ($_GET['sort']=='saleNum_desc')?'curr':'';if($_GET['sort']==''){echo 'curr';} ?>" >
								<a href="<?php echo U('List/index',array('cat'=>$_GET['cat'],'sizeId'=>$_GET['sizeId'],'priceName'=>$_GET['priceName'],'colorId'=>$_GET['colorId'],'brandId'=>$_GET['brandId'],'p'=>1,'sort'=>'saleNum_desc'));?>">销量</a>
							</dd>
							<dd class="<?php echo ($_GET['sort']=='price_asc')?'curr':'';?>" >
								<a href="<?php echo U('List/index',array('cat'=>$_GET['cat'],'sizeId'=>$_GET['sizeId'],'priceName'=>$_GET['priceName'],'colorId'=>$_GET['colorId'],'brandId'=>$_GET['brandId'],'p'=>1,'sort'=>'price_asc'));?>">价格</a>
							</dd >
							<dd class="<?php echo ($_GET['sort']=='commentNum_desc')?'curr':'';?>" >
								<a href="<?php echo U('List/index',array('cat'=>$_GET['cat'],'sizeId'=>$_GET['sizeId'],'priceName'=>$_GET['priceName'],'colorId'=>$_GET['colorId'],'brandId'=>$_GET['brandId'],'p'=>1,'sort'=>'commentNum_desc'));?>">评论数</a>
							</dd>
							<dd class="<?php echo ($_GET['sort']=='addtime_desc')?'curr':'';?>" >
								<a href="<?php echo U('List/index',array('cat'=>$_GET['cat'],'sizeId'=>$_GET['sizeId'],'priceName'=>$_GET['priceName'],'colorId'=>$_GET['colorId'],'brandId'=>$_GET['brandId'],'p'=>1,'sort'=>'addtime_desc'));?>">上架时间</a>
							</dd>
						</dl>
					</div>
					<div class="clear"></div>
				</div>
				<!-------------------排序end---------------------->
				<div class="clear"></div>
				<!-------------------商品展示start---------------------->
				<div id="plist" class="m plist-n7a ordinary-prebuy">
					<ul class="list-h">
						<?php if(is_array($dataList)): foreach($dataList as $key=>$val): ?><li>
							<div class="1h-wrap">
								<div class="p-img">
									<a target="_blank" href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>">
										<img width="220" height="220" src="/jd/Public/Uploads/<?php echo ($val["img"]); ?>" />
									</a>
								</div>
								<div  class="p-name">
									<a target="_blank" href="<?php echo U('Details/details',array('id'=>$val['prodId']));?>">
										<?php echo ($val["prodInfo"]); ?>
									</a>
								</div>
								<div class="p-price">
									<strong>￥<?php echo ($val["price1"]); ?></strong>
								</div>
								<div class="extra">
									<span class="evaluate">
										<a target="_blank" href="<?php echo U('Comments/comments',array('id'=>$val['prodId']));?>">
											已有<?php echo ($val["commentNum"]); ?>人评价
										</a>
									</span>
								</div>
								<div class="stocklist">
									<span class="st33">北京有货</span>
								</div>
								<div class="btns">
									<a prodId="<?php echo ($val["prodId"]); ?>" class="btn-buy scart" href="javascript:;">加入购物车</a>
									<a prodId="f_<?php echo ($val["prodId"]); ?>" class="btn-coll" href="javascript:;">关注</a>
									<a  prodId="a_<?php echo ($val["prodId"]); ?>" 
										name='<?php echo ($val["prodId"]); ?>'
										class="
											btn-compare btn-compare-s
											<?php if(in_array($val['prodId'],$prodIdCookieList)){ echo 'btn-compare-s-active'; } ?>
										">
										<span></span>对比
									</a>
								</div>
							</div>
						</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<!-------------------商品展示end---------------------->
				<!-------------------分页start---------------------->
				<div class="m clearfix">
					<div class="pagin fr">
						<?php echo ($page); ?>
					</div>
				</div>
				<!-------------------分页end---------------------->
			</div>
			<!-------------------右内容end---------------------->
			<div class="clear"></div>
			<!-------------------最新浏览start---------------------->
			<div id="footmark" class="w footmark">
				<div class="m recent-view">
					<div class="mt">
						<h2 class="title">
							最近浏览
						</h2>
						<div class="extra">
							<a href="#" target="_blank">更多浏览记录</a>
						</div>
					</div>
					<div class="mc">
						<ul class="recent-view-list clearfix">
						<?php if(is_array($historyView)): foreach($historyView as $key=>$data): ?><li>
								<div class="p-img">
									<a href="<?php echo U('Details/details',array('id'=>$data['prodId']));?>">
										<img src="/jd/Public/Uploads/<?php echo ($data["simimg"]); ?>" />
									</a>
								</div>
								<div class="p-price">￥<?php echo ($data["price1"]); ?></div>
							</li><?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<!-------------------最新浏览end---------------------->
		</div>
		<!-------------------主体end---------------------->

		<!--=========对比栏start==========-->
		
		<div id="pop-compare" class="pop-compare" data-load="true" style="overflow:visible;bottom: 0px;<?php if(!empty($prodIdCookieData)){ echo 'display:block'; } ?>">
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
								<?php $__FOR_START_32025__=$prodIdCookieNum;$__FOR_END_32025__=5;for($i=$__FOR_START_32025__;$i < $__FOR_END_32025__;$i+=1){ ?><dl class="item-empty">
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
		<!--=========加入购物车栏start==========-->
		<div id="success-cart" class="pop-compare" data-load="true" style="overflow:visible;bottom: 0px;">
			<div class="pop-wrap" style="left:0px">
				<div class="pop-inner" data-widget="tabs">
					<div class="diff-hd">
						<ul class="tab-btns clearfix">
							<li class="current1" data-widget="tab-item">
								<a href="javascript:;">购物栏</a>
							</li>
						</ul>
						<div class="operate">
							<a class="hide-me" href="javascript:void()">关闭</a>
						</div>
					</div>
					<div class="diff-bd tab-cons">
						<div class="tab-con" data-widget="tab-content" style="display: block;">
							<div id="diff-cart" class="diff-items clearfix">
								<div class="m" id="succeed">
									<div class="success-b">
										<h3>商品已成功加入购物车</h3>				
									</div>
									<span id="initCart_next_go">
										<a id="GotoShoppingCart" class="btn-pay" href="javascript:location.href='/jd/index.php/Cart/index'">去结算</a>
										<a class="btn-continue" href="javascript:void(0)">继续购物</a>
									</span>
								</div>
							</div>
							
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
		<!--=========加入购物车栏start==========-->
		<!--------------------弹层效果---------------------->
		<div class='thickdiv' style="display:none"></div>
		<div class='thickbox' style='display:none'>
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
		<!--------------------关注成功提醒------------------>
		<div class="careBox" style="display:none;">
			<div class='careInfo'>
				<div class='infotext'><h1></h1></div>
			</div>
		</div>
		<!--------------------关注成功提醒------------------->
		<!--______________________问卷调查_________________________-->
		<div class="survey">
			<a href="<?php echo U('Survey/index');?>">调查问卷</a>
		</div>
		<!--______________________问卷调查_________________________-->
	</body>
</html>