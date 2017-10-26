<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>京东首页</title>
	<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/main.css"/>
	<script type="text/javascript" src="/jd/Application/Home/Common/Js/jquery-1.8.3.min.js"></script>
	
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
			

			<!--头部结束-->
			<div id="top_con">
			<div class="top_con_center">
				<div class="slide">
					<ul>
						<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li><a href="<?php echo ($vo["links"]); ?>"><img style="width:670px;height:240px" src="/jd/Public/Uploads/Advance/<?php echo ($vo["img"]); ?>"/></a></li><?php endforeach; endif; ?>
					</ul>
					<p class="slide_control">
						<span class="selected">1</span>
						<span>2</span>
						<span>3</span>
						<span>4</span>
						<span>5</span>
					</p>
				</div>
				<div class="hot_slide">
					<a href="javascript:;" class="hot_prev">
						<b></b>
					</a>
					<div class="mscrollwrap">
					<div class="mscroll">
						<ul>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_01.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_02.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_03.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_04.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_05.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_06.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_04.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_05.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_04.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_04.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_05.jpg" width="202" height="159"/></a></li>
							<li><a href="#"><img src="/jd/Public/Uploads/Images/hot_slide_06.jpg" width="202" height="159"/></a></li>
						</ul>
					</div>
					</div>
					<a href="javascript:;" class="hot_next">
						<b></b>
					</a>
				</div>
			</div>
			<div class="top_con_r">
				<div class="top_con_r_ad">
					<img src="/jd/Public/Uploads/Images/top_con_r_ad.jpg" alt="" width="310px" height="70">
				</div>
				<div class="top_news">
					<div class="news_t">
						<h2>京东快报</h2><span><a href="#">更多快报&nbsp;&gt;</a></span>
					</div>
					<div class="news_c">
						<ul>
							<li class="odd"><a href="#">薄，等你来挑战！</a></li>
							<li><a href="#">新款冬靴预售5折封顶</a></li>
							<li class="odd"><a href="#">“羊”眉吐气，创艺音响</a></li>
							<li><a href="#">99元往返韩国</a></li>
							<li class="odd"><a href="#">百大品牌0.5折起再满减</a></li>
							<li><a href="#">﻿﻿休闲零食任选8件79折</a></li>
							<li class="odd"><a href="#">买电视送空中营救</a></li>
							<li><a href="#">关于假冒京东客服诈骗的</a></li>
						</ul>
					</div>
				</div>
				<div class="affairs">
					<div class="affairs_up">
						<ul>
							<li class="affairs1"><a href="#"><s></s>话费<i></i></a></li>
							<li class="affairs2"><a href="#"><s></s>旅行<i></i></a></li>
							<li class="affairs3"><a href="#"><s></s>彩票<i></i></a></li>
							<li class="affairs4"><a href="#"><s></s>游戏<i></i></a></li>
						</ul>
						<ul class="life">
							<li class="affairs1"><a href="#"><s></s>机票</a></li>
							<li class="affairs2"><a href="#"><s></s>电影票</a></li>
							<li class="affairs3"><a href="#"><s></s>理财</a></li>
							<li class="affairs4"><a href="#"><s></s>水煤电</a></li>
						</ul>
					</div>
					<div class="affairs_down">
						<!-- 这里放翻转的内容 -->
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="s2">
				<div class="s2_top" style="margin:10px 0 10px 0">
					<img src="/jd/Public/Uploads/Images/s2_h2.png"/>
				</div>
				<div class="s2_center">
					<ul>
						<li class="t_item">
							<div class="aside">
								<a href="#" class="s_link"></a>
								<h3>品牌街</h3>
								<div class="s_name">
									<a href="#">秋季运动会</a>
								</div>
								<div class="s_ext">
									<b>大牌低至5折</b>
								</div>
								<ul class="s_hotword">
									<li><i></i>更多品牌</li>
									<li><i></i>进入品牌街</li>
								</ul>
							</div>
							<a class="s_img" href="#"><img src="/jd/Public/Uploads/Images/s2_1.jpg" alt="" width="305px" height="190px" /></a>
						</li>
						<li class="t_item">
							<div class="aside">
								<a href="#" class="s_link"></a>
								<h3>天天低价</h3>
								<div class="s_name">
									<a href="#">iPad Air 16G</a>
								</div>
								<div class="s_ext">
									<b>3338元秒杀</b>
								</div>
								<ul class="s_hotword">
								</ul>
							</div>
							<a class="s_img" href="#"><img src="/jd/Public/Uploads/Images/s2_2.jpg" alt="" width="305px" height="190px" /></a>
						</li>
						<li class="t_item">
							<div class="aside">
								<a href="#" class="s_link"></a>
								<h3>精品周刊</h3>
								<div class="s_name">
									<a href="#">横行霸道</a>
								</div>
								<div class="s_ext">
									<b>Bose Mini1880</b>
								</div>
								<ul class="s_hotword">
									<li><i></i>装备横行</li>
								</ul>
							</div>
							<a class="s_img" href="#"><img src="/jd/Public/Uploads/Images/s2_3.jpg" alt="" width="305px" height="190px" /></a>
						</li>
						<li class="t_item">
							<div class="aside">
								<a href="#" class="s_link"></a>
								<h3>今日团购</h3>
								<div class="s_name">
									<a href="#">果冻月光表</a>
								</div>
								<div class="s_ext">
									<b></b>
								</div>
								<a class="s_tuangou" href="#">
									<em>团购价</em>
									<strong>￥45</strong>
								</a>
							</div>
							<a class="s_img" href="#"><img src="/jd/Public/Uploads/Images/s2_4.png" alt="" width="305px" height="190px" /></a>
						</li>
						<li class="t_item">
							<div class="aside">
								<a href="#" class="s_link"></a>
								<h3>京东首发</h3>
								<div class="s_name">
									<a href="#">智能体脂秤</a>
								</div>
								<div class="s_ext">
									<b>关爱全家的健康</b>
								</div>
								<ul class="s_hotword">
								</ul>
							</div>
							<a class="s_img" href="#"><img src="/jd/Public/Uploads/Images/s2_5.jpg" alt="" width="305px" height="190px" /></a>
						</li>
						<li class="t_item">
							<div class="aside">
								<a href="#" class="s_link"></a>
								<h3>品牌特卖</h3>
								<div class="s_name">
									<a href="#">国庆出游</a>
								</div>
								<div class="s_ext">
									<b>99元往返首尔</b>
								</div>
								<ul class="s_hotword">
								</ul>
							</div>
							<a class="s_img" href="#"><img src="/jd/Public/Uploads/Images/s2_6.jpg" alt="" width="305px" height="190px" /></a>
						</li>
						<li class="t_item">
							<div class="aside">
								<a href="#" class="s_link"></a>
								<h3>京东预售</h3>
								<div class="s_name">
									<a href="#">OPPO R7005</a>
								</div>
								<div class="s_ext">
									<b>独家首发预售</b>
								</div>
								<ul class="s_hotword">
								</ul>
							</div>
							<a class="s_img" href="#"><img src="/jd/Public/Uploads/Images/s2_7.jpg" alt="" width="305px" height="190px" /></a>
						</li>
						<li class="t_item">
							<div class="aside">
								<a href="#" class="s_link"></a>
								<h3>金融精选</h3>
								<div class="s_name">
									<a href="#">爱赚钱不冒险</a>
								</div>
								<div class="s_ext">
									<b>稳稳的高收益</b>
								</div>
								<ul class="s_hotword">
								</ul>
							</div>
							<a class="s_img" href="#"><img src="/jd/Public/Uploads/Images/s2_8.jpg" alt="" width="305px" height="190px" /></a>
						</li>
					</ul>
				</div>
				<div class="s2_bottom">
					<a href="#"><img src="/jd/Public/Uploads/Images/s2_bottom.jpg"/></a>
				</div>
			
		</div>
		<div class="floor_list" id="floor_list">
			<div class="w w1" id="electronics" data-fid="0">
				<div class="f_cat">
					<div class="mt">
						<div class="floor">
							<b class="fixpng b1">
							</b>
							<b class="fixpng b2">
								1F
							</b>
							<b class="fixpng b3">
							</b>
						</div>
						<h2>家电通讯</h2>
					</div>
					<div class="mc">
						<div class="style1">
							<ul class="cl">
							<?php if(is_array($f1nav)): foreach($f1nav as $key=>$f1nav): ?><li><a href="<?php echo U('List/index','cat='.$f1nav['proPath']);?>" target="_blank"><?php echo ($f1nav['proName']); ?></a></li><?php endforeach; endif; ?>
								<!-- <li><a href="#">手机</a></li>
								<li><a href="#">空调</a></li>
								<li><a href="#">手机配件</a></li>
								<li><a href="#">平板电视</a></li>
								<li><a href="#">话费补贴</a></li>
								<li><a href="#">冰箱</a></li>
								<li><a href="#">生活电器</a></li>
								<li><a href="#">洗衣机</a></li>
								<li><a href="#">厨房电器</a></li>
								<li><a href="#">热水器</a></li>
								<li><a href="#">个护健康</a></li>
								<li><a href="#">烟机/灶具</a></li>
								<li><a href="#">五金家装</a></li>
								<li><a href="#">家庭影院</a></li>
								<li><a href="#">酒柜冷柜</a></li>
								<li><a href="#">汽车用品</a></li> -->
							</ul>
							<span>
								<a href="#"><img src="/jd/Public/Uploads/Images/1f_cat.jpg" alt=""></a>
							</span>
						</div>
					</div>
				</div>
				<div class="p_list">
					<div class="tab_arrow">
						<b></b>
					</div>
					<?php if(is_array($proList_f1)): foreach($proList_f1 as $key=>$vo): if(($key) == "0"): ?><div class="curr sm fore<?php echo ($key+1); ?>"><?php endif; ?>
					<?php if(($key) > "0"): ?><div class="sm fore<?php echo ($key+1); ?>"><?php endif; ?>
					
						<div class="smt">
							<h3><?php echo ($titles[$key]); ?></h3>
						</div>
						<div class="smc">
							<?php if(($key) == "0"): ?><div class="slide">
								<div class="slide_itemswrap">
									<div class="slide_items">
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_01.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_02.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_03.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_04.jpg" alt="" width="473" height="180px"></a>
										</div>
									</div>
								</div>
								<div class="slide_controls">
									<span><b></b></span>
									<span><b></b></span>
									<span><b></b></span>
									<span class="curr"><b></b></span>
								</div>
							</div><?php endif; ?>
							<ul class="clist style<?php echo ($key+1); ?>">
							<?php if(is_array($vo)): foreach($vo as $key=>$list): ?><li class="fore<?php echo ($key+1); ?>">
									<div class="p_img">
										<a href="<?php echo U('Details/details','id='.$list['prodId']);?>" target="_blank">
											<img src="/jd/Public/Uploads/<?php echo ($list['img']); ?>" alt="#" width="100px" />
										</a>
									</div>
									<div class="p_name">
										<a href="<?php echo U('Details/details','id='.$list['prodId']);?>" target="_blank"><?php echo ($list['prodInfo']); ?></a>
									</div>
									<div class="p_price">
										<span><?php echo ($list['price2']); ?></span>
									</div>
								</li><?php endforeach; endif; ?>
								<!-- <li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li> -->
							</ul>
						</div>
					</div><?php endforeach; endif; ?>
					<!-- <div class="sm fore2">
						<div class="smt">
							<h3>大家电</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div> -->
					<!-- <div class="sm fore3">
						<div class="smt">
							<h3>小家电</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div> -->
					<!-- <div class="sm fore4">
						<div class="smt">
							<h3>手机通讯</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div> -->
					<!-- <div class="sm fore5">
						<div class="smt">
							<h3>汽车五金</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div> -->
				</div>
				<div class="sm1 brands">
					<div class="smt">
						<h3>品牌旗舰店</h3>
						<div class="extra">
							<a href="#">合约计划说明<b></b></a>
							<a href="#">大家电配送<b></b></a>
						</div>
					</div>
					<div class="smc">
						<ul class="blist">
							<li class="fore1"><a href="#"><img src="/jd/Public/Uploads/Images/brand_1.gif" alt="#"></a></li>
							<li class="fore2"><a href="#"><img src="/jd/Public/Uploads/Images/brand_2.gif" alt="#"></a></li>
							<li class="fore3"><a href="#"><img src="/jd/Public/Uploads/Images/brand_3.gif" alt="#"></a></li>
							<li class="fore4"><a href="#"><img src="/jd/Public/Uploads/Images/brand_4.jpg" alt="#"></a></li>
							<li class="fore5"><a href="#"><img src="/jd/Public/Uploads/Images/brand_5.jpg" alt="#"></a></li>
							<li class="fore6"><a href="#"><img src="/jd/Public/Uploads/Images/brand_6.jpg" alt="#"></a></li>
							<li class="fore7"><a href="#"><img src="/jd/Public/Uploads/Images/brand_7.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_8.jpg" alt="#"></a></li>
							<li class="fore9"><a href="#"><img src="/jd/Public/Uploads/Images/brand_9.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_10.jpg" alt="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="f_hot">
					<div class="slide">
						<div class="slide_itemswrap">
							<div class="slide_items">
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_1.jpg" alt=""></a></div>
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_2.jpg" alt=""></a></div>
							</div>
						</div>
						<div class="slide_controls">
							<span><b></b></span>
							<span class="curr"><b></b></span>
						</div>
					</div>
				</div>
			</div>
			<div class="w w1" id="digitals" data-fid="1">
				<div class="f_cat">
					<div class="mt">
						<div class="floor">
							<b class="fixpng b1">
							</b>
							<b class="fixpng b2">
								2F
							</b>
							<b class="fixpng b3">
							</b>
						</div>
						<h2>电脑数码</h2>
					</div>
					<div class="mc">
						<div class="style1">
							<ul class="cl">
								<li><a href="#">手机</a></li>
								<li><a href="#">空调</a></li>
								<li><a href="#">手机配件</a></li>
								<li><a href="#">平板电视</a></li>
								<li><a href="#">话费补贴</a></li>
								<li><a href="#">冰箱</a></li>
								<li><a href="#">生活电器</a></li>
								<li><a href="#">洗衣机</a></li>
								<li><a href="#">厨房电器</a></li>
								<li><a href="#">热水器</a></li>
								<li><a href="#">个护健康</a></li>
								<li><a href="#">烟机/灶具</a></li>
								<li><a href="#">五金家装</a></li>
								<li><a href="#">家庭影院</a></li>
								<li><a href="#">酒柜冷柜</a></li>
								<li><a href="#">汽车用品</a></li>
							</ul>
							<span>
								<a href="#"><img src="/jd/Public/Uploads/Images/1f_cat.jpg" alt=""></a>
							</span>
						</div>
					</div>
				</div>
				<div class="p_list">
					<div class="tab_arrow">
						<b></b>
					</div>
					<div class="sm fore1 curr">
						<div class="smt">
							<h3>特价商品</h3>
						</div>
						<div class="smc">
							<div class="slide">
								<div class="slide_itemswrap">
									<div class="slide_items">
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_01.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_02.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_03.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_04.jpg" alt="" width="473" height="180px"></a>
										</div>
									</div>
								</div>
								<div class="slide_controls">
									<span><b></b></span>
									<span><b></b></span>
									<span><b></b></span>
									<span class="curr"><b></b></span>
								</div>
							</div>
							<ul class="clist style1">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">评论晒单送评论晒单送评论晒单送空中营评论晒单送评论晒单送救电影票</a>
									</div>
									<div class="p_price">
										<span>39英寸电视1599</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore2">
						<div class="smt">
							<h3>笔记本</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore3">
						<div class="smt">
							<h3>数码影音</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore4">
						<div class="smt">
							<h3>DIY攒机</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore5">
						<div class="smt">
							<h3>外设办公</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sm1 brands">
					<div class="smt">
						<h3>品牌旗舰店</h3>
						<div class="extra">
							<a href="#">DIY装机大师<b></b></a>
							<a href="#">游戏社区<b></b></a>
						</div>
					</div>
					<div class="smc">
						<ul class="blist">
							<li class="fore1"><a href="#"><img src="/jd/Public/Uploads/Images/brand_1.gif" alt="#"></a></li>
							<li class="fore2"><a href="#"><img src="/jd/Public/Uploads/Images/brand_2.gif" alt="#"></a></li>
							<li class="fore3"><a href="#"><img src="/jd/Public/Uploads/Images/brand_3.gif" alt="#"></a></li>
							<li class="fore4"><a href="#"><img src="/jd/Public/Uploads/Images/brand_4.jpg" alt="#"></a></li>
							<li class="fore5"><a href="#"><img src="/jd/Public/Uploads/Images/brand_5.jpg" alt="#"></a></li>
							<li class="fore6"><a href="#"><img src="/jd/Public/Uploads/Images/brand_6.jpg" alt="#"></a></li>
							<li class="fore7"><a href="#"><img src="/jd/Public/Uploads/Images/brand_7.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_8.jpg" alt="#"></a></li>
							<li class="fore9"><a href="#"><img src="/jd/Public/Uploads/Images/brand_9.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_10.jpg" alt="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="f_hot">
					<div class="slide">
						<div class="slide_itemswrap">
							<div class="slide_items">
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_1.jpg" alt=""></a></div>
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_2.jpg" alt=""></a></div>
							</div>
						</div>
						<div class="slide_controls">
							<span><b></b></span>
							<span class="curr"><b></b></span>
						</div>
					</div>
				</div>
					
			</div>
			<div class="w w1" id="clothing" data-fid="2">
				<div class="f_cat">
					<div class="mt">
						<div class="floor">
							<b class="fixpng b1">
							</b>
							<b class="fixpng b2">
								3F
							</b>
							<b class="fixpng b3">
							</b>
						</div>
						<h2>服饰鞋包</h2>
					</div>
					<div class="mc">
						<div class="style1">
							<ul class="cl">
								<li><a href="#">手机</a></li>
								<li><a href="#">空调</a></li>
								<li><a href="#">手机配件</a></li>
								<li><a href="#">平板电视</a></li>
								<li><a href="#">话费补贴</a></li>
								<li><a href="#">冰箱</a></li>
								<li><a href="#">生活电器</a></li>
								<li><a href="#">洗衣机</a></li>
								<li><a href="#">厨房电器</a></li>
								<li><a href="#">热水器</a></li>
								<li><a href="#">个护健康</a></li>
								<li><a href="#">烟机/灶具</a></li>
								<li><a href="#">五金家装</a></li>
								<li><a href="#">家庭影院</a></li>
								<li><a href="#">酒柜冷柜</a></li>
								<li><a href="#">汽车用品</a></li>
							</ul>
							<span>
								<a href="#"><img src="/jd/Public/Uploads/Images/1f_cat.jpg" alt=""></a>
							</span>
						</div>
					</div>
				</div>
				<div class="p_list">
					<div class="tab_arrow">
						<b></b>
					</div>
					<div class="sm fore1 curr">
						<div class="smt">
							<h3>特价商品</h3>
						</div>
						<div class="smc">
							<div class="slide">
								<div class="slide_itemswrap">
									<div class="slide_items">
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_01.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_02.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_03.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_04.jpg" alt="" width="473" height="180px"></a>
										</div>
									</div>
								</div>
								<div class="slide_controls">
									<span><b></b></span>
									<span><b></b></span>
									<span><b></b></span>
									<span class="curr"><b></b></span>
								</div>
							</div>
							<ul class="clist style1">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">评论晒单送评论晒单送评论晒单送空中营评论晒单送评论晒单送救电影票</a>
									</div>
									<div class="p_price">
										<span>39英寸电视1599</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore2">
						<div class="smt">
							<h3>笔记本</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore3">
						<div class="smt">
							<h3>数码影音</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore4">
						<div class="smt">
							<h3>DIY攒机</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore5">
						<div class="smt">
							<h3>外设办公</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sm1 brands">
					<div class="smt">
						<h3>品牌旗舰店</h3>
						<div class="extra">
							<a href="#">DIY装机大师<b></b></a>
							<a href="#">游戏社区<b></b></a>
						</div>
					</div>
					<div class="smc">
						<ul class="blist">
							<li class="fore1"><a href="#"><img src="/jd/Public/Uploads/Images/brand_1.gif" alt="#"></a></li>
							<li class="fore2"><a href="#"><img src="/jd/Public/Uploads/Images/brand_2.gif" alt="#"></a></li>
							<li class="fore3"><a href="#"><img src="/jd/Public/Uploads/Images/brand_3.gif" alt="#"></a></li>
							<li class="fore4"><a href="#"><img src="/jd/Public/Uploads/Images/brand_4.jpg" alt="#"></a></li>
							<li class="fore5"><a href="#"><img src="/jd/Public/Uploads/Images/brand_5.jpg" alt="#"></a></li>
							<li class="fore6"><a href="#"><img src="/jd/Public/Uploads/Images/brand_6.jpg" alt="#"></a></li>
							<li class="fore7"><a href="#"><img src="/jd/Public/Uploads/Images/brand_7.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_8.jpg" alt="#"></a></li>
							<li class="fore9"><a href="#"><img src="/jd/Public/Uploads/Images/brand_9.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_10.jpg" alt="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="f_hot">
					<div class="slide">
						<div class="slide_itemswrap">
							<div class="slide_items">
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_1.jpg" alt=""></a></div>
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_2.jpg" alt=""></a></div>
							</div>
						</div>
						<div class="slide_controls">
							<span><b></b></span>
							<span class="curr"><b></b></span>
						</div>
					</div>
				</div>
					
			</div>
			<div class="w w1" id="jewellery" data-fid="3">
				<div class="f_cat">
					<div class="mt">
						<div class="floor">
							<b class="fixpng b1">
							</b>
							<b class="fixpng b2">
								4F
							</b>
							<b class="fixpng b3">
							</b>
						</div>
						<h2>美容珠宝</h2>
					</div>
					<div class="mc">
						<div class="style1">
							<ul class="cl">
								<li><a href="#">手机</a></li>
								<li><a href="#">空调</a></li>
								<li><a href="#">手机配件</a></li>
								<li><a href="#">平板电视</a></li>
								<li><a href="#">话费补贴</a></li>
								<li><a href="#">冰箱</a></li>
								<li><a href="#">生活电器</a></li>
								<li><a href="#">洗衣机</a></li>
								<li><a href="#">厨房电器</a></li>
								<li><a href="#">热水器</a></li>
								<li><a href="#">个护健康</a></li>
								<li><a href="#">烟机/灶具</a></li>
								<li><a href="#">五金家装</a></li>
								<li><a href="#">家庭影院</a></li>
								<li><a href="#">酒柜冷柜</a></li>
								<li><a href="#">汽车用品</a></li>
							</ul>
							<span>
								<a href="#"><img src="/jd/Public/Uploads/Images/1f_cat.jpg" alt=""></a>
							</span>
						</div>
					</div>
				</div>
				<div class="p_list">
					<div class="tab_arrow">
						<b></b>
					</div>
					<div class="sm fore1 curr">
						<div class="smt">
							<h3>特价商品</h3>
						</div>
						<div class="smc">
							<div class="slide">
								<div class="slide_itemswrap">
									<div class="slide_items">
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_01.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_02.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_03.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_04.jpg" alt="" width="473" height="180px"></a>
										</div>
									</div>
								</div>
								<div class="slide_controls">
									<span><b></b></span>
									<span><b></b></span>
									<span><b></b></span>
									<span class="curr"><b></b></span>
								</div>
							</div>
							<ul class="clist style1">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">评论晒单送评论晒单送评论晒单送空中营评论晒单送评论晒单送救电影票</a>
									</div>
									<div class="p_price">
										<span>39英寸电视1599</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore2">
						<div class="smt">
							<h3>笔记本</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore3">
						<div class="smt">
							<h3>数码影音</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore4">
						<div class="smt">
							<h3>DIY攒机</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore5">
						<div class="smt">
							<h3>外设办公</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sm1 brands">
					<div class="smt">
						<h3>品牌旗舰店</h3>
						<div class="extra">
							<a href="#">DIY装机大师<b></b></a>
							<a href="#">游戏社区<b></b></a>
						</div>
					</div>
					<div class="smc">
						<ul class="blist">
							<li class="fore1"><a href="#"><img src="/jd/Public/Uploads/Images/brand_1.gif" alt="#"></a></li>
							<li class="fore2"><a href="#"><img src="/jd/Public/Uploads/Images/brand_2.gif" alt="#"></a></li>
							<li class="fore3"><a href="#"><img src="/jd/Public/Uploads/Images/brand_3.gif" alt="#"></a></li>
							<li class="fore4"><a href="#"><img src="/jd/Public/Uploads/Images/brand_4.jpg" alt="#"></a></li>
							<li class="fore5"><a href="#"><img src="/jd/Public/Uploads/Images/brand_5.jpg" alt="#"></a></li>
							<li class="fore6"><a href="#"><img src="/jd/Public/Uploads/Images/brand_6.jpg" alt="#"></a></li>
							<li class="fore7"><a href="#"><img src="/jd/Public/Uploads/Images/brand_7.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_8.jpg" alt="#"></a></li>
							<li class="fore9"><a href="#"><img src="/jd/Public/Uploads/Images/brand_9.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_10.jpg" alt="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="f_hot">
					<div class="slide">
						<div class="slide_itemswrap">
							<div class="slide_items">
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_1.jpg" alt=""></a></div>
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_2.jpg" alt=""></a></div>
							</div>
						</div>
						<div class="slide_controls">
							<span><b></b></span>
							<span class="curr"><b></b></span>
						</div>
					</div>
				</div>
					
			</div>
			<div class="w w1" id="life" data-fid="4">
				<div class="f_cat">
					<div class="mt">
						<div class="floor">
							<b class="fixpng b1">
							</b>
							<b class="fixpng b2">
								5F
							</b>
							<b class="fixpng b3">
							</b>
						</div>
						<h2>居家生活</h2>
					</div>
					<div class="mc">
						<div class="style1">
							<ul class="cl">
								<li><a href="#">手机</a></li>
								<li><a href="#">空调</a></li>
								<li><a href="#">手机配件</a></li>
								<li><a href="#">平板电视</a></li>
								<li><a href="#">话费补贴</a></li>
								<li><a href="#">冰箱</a></li>
								<li><a href="#">生活电器</a></li>
								<li><a href="#">洗衣机</a></li>
								<li><a href="#">厨房电器</a></li>
								<li><a href="#">热水器</a></li>
								<li><a href="#">个护健康</a></li>
								<li><a href="#">烟机/灶具</a></li>
								<li><a href="#">五金家装</a></li>
								<li><a href="#">家庭影院</a></li>
								<li><a href="#">酒柜冷柜</a></li>
								<li><a href="#">汽车用品</a></li>
							</ul>
							<span>
								<a href="#"><img src="/jd/Public/Uploads/Images/1f_cat.jpg" alt=""></a>
							</span>
						</div>
					</div>
				</div>
				<div class="p_list">
					<div class="tab_arrow">
						<b></b>
					</div>
					<div class="sm fore1 curr">
						<div class="smt">
							<h3>特价商品</h3>
						</div>
						<div class="smc">
							<div class="slide">
								<div class="slide_itemswrap">
									<div class="slide_items">
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_01.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_02.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_03.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_04.jpg" alt="" width="473" height="180px"></a>
										</div>
									</div>
								</div>
								<div class="slide_controls">
									<span><b></b></span>
									<span><b></b></span>
									<span><b></b></span>
									<span class="curr"><b></b></span>
								</div>
							</div>
							<ul class="clist style1">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">评论晒单送评论晒单送评论晒单送空中营评论晒单送评论晒单送救电影票</a>
									</div>
									<div class="p_price">
										<span>39英寸电视1599</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore2">
						<div class="smt">
							<h3>笔记本</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore3">
						<div class="smt">
							<h3>数码影音</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore4">
						<div class="smt">
							<h3>DIY攒机</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore5">
						<div class="smt">
							<h3>外设办公</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sm1 brands">
					<div class="smt">
						<h3>品牌旗舰店</h3>
						<div class="extra">
							<a href="#">DIY装机大师<b></b></a>
							<a href="#">游戏社区<b></b></a>
						</div>
					</div>
					<div class="smc">
						<ul class="blist">
							<li class="fore1"><a href="#"><img src="/jd/Public/Uploads/Images/brand_1.gif" alt="#"></a></li>
							<li class="fore2"><a href="#"><img src="/jd/Public/Uploads/Images/brand_2.gif" alt="#"></a></li>
							<li class="fore3"><a href="#"><img src="/jd/Public/Uploads/Images/brand_3.gif" alt="#"></a></li>
							<li class="fore4"><a href="#"><img src="/jd/Public/Uploads/Images/brand_4.jpg" alt="#"></a></li>
							<li class="fore5"><a href="#"><img src="/jd/Public/Uploads/Images/brand_5.jpg" alt="#"></a></li>
							<li class="fore6"><a href="#"><img src="/jd/Public/Uploads/Images/brand_6.jpg" alt="#"></a></li>
							<li class="fore7"><a href="#"><img src="/jd/Public/Uploads/Images/brand_7.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_8.jpg" alt="#"></a></li>
							<li class="fore9"><a href="#"><img src="/jd/Public/Uploads/Images/brand_9.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_10.jpg" alt="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="f_hot">
					<div class="slide">
						<div class="slide_itemswrap">
							<div class="slide_items">
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_1.jpg" alt=""></a></div>
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_2.jpg" alt=""></a></div>
							</div>
						</div>
						<div class="slide_controls">
							<span><b></b></span>
							<span class="curr"><b></b></span>
						</div>
					</div>
				</div>
					
			</div>
			<div class="w w1" id="boby" data-fid='5'>
				<div class="f_cat">
					<div class="mt">
						<div class="floor">
							<b class="fixpng b1">
							</b>
							<b class="fixpng b2">
								6F
							</b>
							<b class="fixpng b3">
							</b>
						</div>
						<h2>母婴玩具</h2>
					</div>
					<div class="mc">
						<div class="style1">
							<ul class="cl">
								<li><a href="#">手机</a></li>
								<li><a href="#">空调</a></li>
								<li><a href="#">手机配件</a></li>
								<li><a href="#">平板电视</a></li>
								<li><a href="#">话费补贴</a></li>
								<li><a href="#">冰箱</a></li>
								<li><a href="#">生活电器</a></li>
								<li><a href="#">洗衣机</a></li>
								<li><a href="#">厨房电器</a></li>
								<li><a href="#">热水器</a></li>
								<li><a href="#">个护健康</a></li>
								<li><a href="#">烟机/灶具</a></li>
								<li><a href="#">五金家装</a></li>
								<li><a href="#">家庭影院</a></li>
								<li><a href="#">酒柜冷柜</a></li>
								<li><a href="#">汽车用品</a></li>
							</ul>
							<span>
								<a href="#"><img src="/jd/Public/Uploads/Images/1f_cat.jpg" alt=""></a>
							</span>
						</div>
					</div>
				</div>
				<div class="p_list">
					<div class="tab_arrow">
						<b></b>
					</div>
					<div class="sm fore1 curr">
						<div class="smt">
							<h3>特价商品</h3>
						</div>
						<div class="smc">
							<div class="slide">
								<div class="slide_itemswrap">
									<div class="slide_items">
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_01.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_02.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_03.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_04.jpg" alt="" width="473" height="180px"></a>
										</div>
									</div>
								</div>
								<div class="slide_controls">
									<span><b></b></span>
									<span><b></b></span>
									<span><b></b></span>
									<span class="curr"><b></b></span>
								</div>
							</div>
							<ul class="clist style1">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">评论晒单送评论晒单送评论晒单送空中营评论晒单送评论晒单送救电影票</a>
									</div>
									<div class="p_price">
										<span>39英寸电视1599</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore2">
						<div class="smt">
							<h3>笔记本</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore3">
						<div class="smt">
							<h3>数码影音</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore4">
						<div class="smt">
							<h3>DIY攒机</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore5">
						<div class="smt">
							<h3>外设办公</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sm1 brands">
					<div class="smt">
						<h3>品牌旗舰店</h3>
						<div class="extra">
							<a href="#">DIY装机大师<b></b></a>
							<a href="#">游戏社区<b></b></a>
						</div>
					</div>
					<div class="smc">
						<ul class="blist">
							<li class="fore1"><a href="#"><img src="/jd/Public/Uploads/Images/brand_1.gif" alt="#"></a></li>
							<li class="fore2"><a href="#"><img src="/jd/Public/Uploads/Images/brand_2.gif" alt="#"></a></li>
							<li class="fore3"><a href="#"><img src="/jd/Public/Uploads/Images/brand_3.gif" alt="#"></a></li>
							<li class="fore4"><a href="#"><img src="/jd/Public/Uploads/Images/brand_4.jpg" alt="#"></a></li>
							<li class="fore5"><a href="#"><img src="/jd/Public/Uploads/Images/brand_5.jpg" alt="#"></a></li>
							<li class="fore6"><a href="#"><img src="/jd/Public/Uploads/Images/brand_6.jpg" alt="#"></a></li>
							<li class="fore7"><a href="#"><img src="/jd/Public/Uploads/Images/brand_7.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_8.jpg" alt="#"></a></li>
							<li class="fore9"><a href="#"><img src="/jd/Public/Uploads/Images/brand_9.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_10.jpg" alt="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="f_hot">
					<div class="slide">
						<div class="slide_itemswrap">
							<div class="slide_items">
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_1.jpg" alt=""></a></div>
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_2.jpg" alt=""></a></div>
							</div>
						</div>
						<div class="slide_controls">
							<span><b></b></span>
							<span class="curr"><b></b></span>
						</div>
					</div>
				</div>
					
			</div>
			<div class="w w1" id="food" data-fid="6">
				<div class="f_cat">
					<div class="mt">
						<div class="floor">
							<b class="fixpng b1">
							</b>
							<b class="fixpng b2">
								7F
							</b>
							<b class="fixpng b3">
							</b>
						</div>
						<h2>食品保健</h2>
					</div>
					<div class="mc">
						<div class="style1">
							<ul class="cl">
								<li><a href="#">手机</a></li>
								<li><a href="#">空调</a></li>
								<li><a href="#">手机配件</a></li>
								<li><a href="#">平板电视</a></li>
								<li><a href="#">话费补贴</a></li>
								<li><a href="#">冰箱</a></li>
								<li><a href="#">生活电器</a></li>
								<li><a href="#">洗衣机</a></li>
								<li><a href="#">厨房电器</a></li>
								<li><a href="#">热水器</a></li>
								<li><a href="#">个护健康</a></li>
								<li><a href="#">烟机/灶具</a></li>
								<li><a href="#">五金家装</a></li>
								<li><a href="#">家庭影院</a></li>
								<li><a href="#">酒柜冷柜</a></li>
								<li><a href="#">汽车用品</a></li>
							</ul>
							<span>
								<a href="#"><img src="/jd/Public/Uploads/Images/1f_cat.jpg" alt=""></a>
							</span>
						</div>
					</div>
				</div>
				<div class="p_list">
					<div class="tab_arrow">
						<b></b>
					</div>
					<div class="sm fore1 curr">
						<div class="smt">
							<h3>特价商品</h3>
						</div>
						<div class="smc">
							<div class="slide">
								<div class="slide_itemswrap">
									<div class="slide_items">
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_01.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_02.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_03.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_04.jpg" alt="" width="473" height="180px"></a>
										</div>
									</div>
								</div>
								<div class="slide_controls">
									<span><b></b></span>
									<span><b></b></span>
									<span><b></b></span>
									<span class="curr"><b></b></span>
								</div>
							</div>
							<ul class="clist style1">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">评论晒单送评论晒单送评论晒单送空中营评论晒单送评论晒单送救电影票</a>
									</div>
									<div class="p_price">
										<span>39英寸电视1599</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore2">
						<div class="smt">
							<h3>酒饮冲调</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore3">
						<div class="smt">
							<h3>中外美食</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore4">
						<div class="smt">
							<h3>营养健康</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore5">
						<div class="smt">
							<h3>粮油生鲜</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sm1 brands">
					<div class="smt">
						<h3>品牌旗舰店</h3>
						<div class="extra">
							<a href="#">DIY装机大师<b></b></a>
							<a href="#">游戏社区<b></b></a>
						</div>
					</div>
					<div class="smc">
						<ul class="blist">
							<li class="fore1"><a href="#"><img src="/jd/Public/Uploads/Images/brand_1.gif" alt="#"></a></li>
							<li class="fore2"><a href="#"><img src="/jd/Public/Uploads/Images/brand_2.gif" alt="#"></a></li>
							<li class="fore3"><a href="#"><img src="/jd/Public/Uploads/Images/brand_3.gif" alt="#"></a></li>
							<li class="fore4"><a href="#"><img src="/jd/Public/Uploads/Images/brand_4.jpg" alt="#"></a></li>
							<li class="fore5"><a href="#"><img src="/jd/Public/Uploads/Images/brand_5.jpg" alt="#"></a></li>
							<li class="fore6"><a href="#"><img src="/jd/Public/Uploads/Images/brand_6.jpg" alt="#"></a></li>
							<li class="fore7"><a href="#"><img src="/jd/Public/Uploads/Images/brand_7.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_8.jpg" alt="#"></a></li>
							<li class="fore9"><a href="#"><img src="/jd/Public/Uploads/Images/brand_9.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_10.jpg" alt="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="f_hot">
					<div class="slide">
						<div class="slide_itemswrap">
							<div class="slide_items">
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_1.jpg" alt=""></a></div>
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_2.jpg" alt=""></a></div>
							</div>
						</div>
						<div class="slide_controls">
							<span><b></b></span>
							<span class="curr"><b></b></span>
						</div>
					</div>
				</div>
					
			</div>
			<div class="w w1" id="book" data-fid="7">
				<div class="f_cat">
					<div class="mt">
						<div class="floor">
							<b class="fixpng b1">
							</b>
							<b class="fixpng b2">
								8F
							</b>
							<b class="fixpng b3">
							</b>
						</div>
						<h2>图书音像</h2>
					</div>
					<div class="mc">
						<div class="style1">
							<ul class="cl">
								<li><a href="#">手机</a></li>
								<li><a href="#">空调</a></li>
								<li><a href="#">手机配件</a></li>
								<li><a href="#">平板电视</a></li>
								<li><a href="#">话费补贴</a></li>
								<li><a href="#">冰箱</a></li>
								<li><a href="#">生活电器</a></li>
								<li><a href="#">洗衣机</a></li>
								<li><a href="#">厨房电器</a></li>
								<li><a href="#">热水器</a></li>
								<li><a href="#">个护健康</a></li>
								<li><a href="#">烟机/灶具</a></li>
								<li><a href="#">五金家装</a></li>
								<li><a href="#">家庭影院</a></li>
								<li><a href="#">酒柜冷柜</a></li>
								<li><a href="#">汽车用品</a></li>
							</ul>
							<span>
								<a href="#"><img src="/jd/Public/Uploads/Images/1f_cat.jpg" alt=""></a>
							</span>
						</div>
					</div>
				</div>
				<div class="p_list">
					<div class="tab_arrow">
						<b></b>
					</div>
					<div class="sm fore1 curr">
						<div class="smt">
							<h3>特价商品</h3>
						</div>
						<div class="smc">
							<div class="slide">
								<div class="slide_itemswrap">
									<div class="slide_items">
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_01.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_02.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_03.jpg" alt="" width="473" height="180px"></a>
										</div>
										<div>
											<a href="#"><img src="/jd/Public/Uploads/Images/ele_slide_04.jpg" alt="" width="473" height="180px"></a>
										</div>
									</div>
								</div>
								<div class="slide_controls">
									<span><b></b></span>
									<span><b></b></span>
									<span><b></b></span>
									<span class="curr"><b></b></span>
								</div>
							</div>
							<ul class="clist style1">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">评论晒单送评论晒单送评论晒单送空中营评论晒单送评论晒单送救电影票</a>
									</div>
									<div class="p_price">
										<span>39英寸电视1599</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">电信4G</a>
									</div>
									<div class="p_price">
										<span>￥729.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore2">
						<div class="smt">
							<h3>文学/经管</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore3">
						<div class="smt">
							<h3>生活/少儿</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore4">
						<div class="smt">
							<h3>数字商品</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sm fore5">
						<div class="smt">
							<h3>音像产品</h3>
						</div>
						<div class="smc">
							<ul class="clist style3">
								<li class="fore1">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore2">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore3">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/p_img_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore4">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_1.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">熊猫（PANDA） LE32D69 32英寸 夏普技术屏高清</a>
									</div>
									<div class="p_price">
										<span>￥1199.00</span>
									</div>
								</li>
								<li class="fore5">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_2.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">长虹55吋智能3D，预约价3699元，9.18日10点</a>
									</div>
									<div class="p_price">
										<span>￥4199.00</span>
									</div>
								</li>
								<li class="fore6">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_3.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【每满1000减100】格兰仕1.5匹超薄变频冷暖空调</a>
									</div>
									<div class="p_price">
										<span>￥2399.00</span>
									</div>
								</li>
								<li class="fore7">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_4.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">【优惠+满减劲爆2299！】海尔235升 三门冰箱（</a>
									</div>
									<div class="p_price">
										<span>￥2499.00</span>
									</div>
								</li>
								<li class="fore8">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_5.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">康佳（KONKA） BCD-192MT 192升 三门冰箱 （银</a>
									</div>
									<div class="p_price">
										<span>￥1098.00</span>
									</div>
								</li>
								<li class="fore9">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_6.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">小家电-减值疯了！</a>
									</div>
									<div class="p_price">
										<span>满200元立减30元！</span>
									</div>
								</li>
								<li class="fore10">
									<div class="p_img">
										<a href="#">
											<img src="/jd/Public/Uploads/Images/da_7.jpg" alt="#"/>
										</a>
									</div>
									<div class="p_name">
										<a href="#">夏普(SHARP) LCD-60LX640A 60英寸 3D LED 智</a>
									</div>
									<div class="p_price">
										<span>￥7999.00</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sm1 brands">
					<div class="smt">
						<h3>品牌旗舰店</h3>
						<div class="extra">
							<a href="#">DIY装机大师<b></b></a>
							<a href="#">游戏社区<b></b></a>
						</div>
					</div>
					<div class="smc">
						<ul class="blist">
							<li class="fore1"><a href="#"><img src="/jd/Public/Uploads/Images/brand_1.gif" alt="#"></a></li>
							<li class="fore2"><a href="#"><img src="/jd/Public/Uploads/Images/brand_2.gif" alt="#"></a></li>
							<li class="fore3"><a href="#"><img src="/jd/Public/Uploads/Images/brand_3.gif" alt="#"></a></li>
							<li class="fore4"><a href="#"><img src="/jd/Public/Uploads/Images/brand_4.jpg" alt="#"></a></li>
							<li class="fore5"><a href="#"><img src="/jd/Public/Uploads/Images/brand_5.jpg" alt="#"></a></li>
							<li class="fore6"><a href="#"><img src="/jd/Public/Uploads/Images/brand_6.jpg" alt="#"></a></li>
							<li class="fore7"><a href="#"><img src="/jd/Public/Uploads/Images/brand_7.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_8.jpg" alt="#"></a></li>
							<li class="fore9"><a href="#"><img src="/jd/Public/Uploads/Images/brand_9.jpg" alt="#"></a></li>
							<li class="fore8"><a href="#"><img src="/jd/Public/Uploads/Images/brand_10.jpg" alt="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="f_hot">
					<div class="slide">
						<div class="slide_itemswrap">
							<div class="slide_items">
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_1.jpg" alt=""></a></div>
								<div><a href="#"><img src="/jd/Public/Uploads/Images/brand_slide_2.jpg" alt=""></a></div>
							</div>
						</div>
						<div class="slide_controls">
							<span><b></b></span>
							<span class="curr"><b></b></span>
						</div>
					</div>
				</div>
					
			</div>
		</div>
	</div>
	<div class="clr"></div>
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
				<a href="#"><img src="/jd/Public/Uploads/Images/authentication_1.gif" alt=""></a>
				<a href="#"><img src="/jd/Public/Uploads/Images/authentication_2.gif" alt=""></a>
				<a href="#"><img src="/jd/Public/Uploads/Images/authentication_3.png" alt=""></a>
				<a href="#"><img src="/jd/Public/Uploads/Images/authentication_4.png" alt=""></a>
			</div>
		</div>
	</div>
	<div class="goto">
		<div class="panel" id="floorlist">
			<div class="backpanel-inner">
				<div class="floor_fore0">
					<a href="javascript:;" class="floor_fore0">家电通讯</a>
				</div>
				<div class="floor_fore1">
					<a href="javascript:;" class="floor_fore1">电脑数码</a>
				</div>
				<div class="floor_fore2">
					<a href="javascript:;" class="floor_fore2">服饰鞋包</a>
				</div>
				<div class="floor_fore3">
					<a href="javascript:;" class="floor_fore3">美容珠宝</a>
				</div>
				<div class="floor_fore4">
					<a href="javascript:;" class="floor_fore4">居家生活</a>
				</div>
				<div class="floor_fore5">
					<a href="javascript:;" class="floor_fore5">母婴玩具</a>
				</div>
				<div class="floor_fore6">
					<a href="javascript:;" class="floor_fore6">食品保健</a>
				</div>
				<div class="floor_fore7">
					<a href="javascript:;" class="floor_fore7">图书音像</a>
				</div>
			</div>
		</div>
		<div class="panel"id="back_top">
			<div class="backpanel-inner">
				<div class="survery"><a href="javascript:;">我要反馈</a></div>
				<div class="back_to_top"><a href="javascript:;">返回顶部</a></div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/jd/Application/Home/Common/Js/index.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#nav_2014 .sub_nav').css('display','block');
			$('#nav_2014').off('mouseenter');
			$('#nav_2014').off('mouseleave');
		})
	</script>
</body>
</html>