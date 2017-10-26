<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta content="text/html;charset=UTF-8"/>
	<title>个人中心</title>
	<link rel="stylesheet" type="text/css" href="/jd/Application/Home/Common/Css/user.css"/>
	<link rel="stylesheet" type="text/css" href="/jd/Public/Multicuploads/uploadify.css">
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
	<!--header结束了-->
	<div id="container">
		<div class="wrap">
			<div id="shortcut">
				<div class="tit">
					<a href="#">我的京东</a>
				</div>
				<div class="mypage" uid="<?php echo ($uid); ?>">
					<!-- <a href="<?php echo U('Ucenter/index');?>">站内消息</a> -->
					<dl class="mynews">
						<dt><span>站内消息</span><b></b></dt>
						<dd>
							<?php if(empty($mess)): ?><span>暂无消息</span>
							<?php else: ?>
								<?php if(is_array($mess)): foreach($mess as $key=>$vo): ?><a href="javascript:;" data-mid="<?php echo ($vo['messageId']); ?>"><?php echo (mb_substr($vo['title'],0,5,'UTF-8')); ?></a><?php endforeach; endif; endif; ?>
						</dd>
					</dl>
				</div>
				<dl class="myset">
					<dt><span>设置</span><b></b></dt>
					<dd>
						<a href="javascript:;" id="info">个人信息</a>
						<a href="javascript:;" id="uimg">上传图像</a>
						<a href="javascript:;" id="address">修改密码</a>
					</dd>
				</dl>
			</div>
			<!--测试用例-->
		
			<!---->
			<div id="main">
				<div id="left">
					<div id="menu">
						<h3>我的交易</h3>
						<ul>

							<li><a href="#myorder">我的订单</a></li>
							<li><a href="#care">关注的商品</a></li>
							<li><a href="#history">浏览历史</a></li>
						</ul>
					</div>
				</div>
				<div id="center">
					<div id="user-info">
						<div class="u-pic">
							<!--图片地址判断是在控制器中进行判断的-->
							<img src="/jd/Public/Uploads/<?php echo ($userInfo['userimg']); ?>" alt="#">
							<div class="mask"></div>
						</div>
						<div class="u-info">
							<div class="u-name">
								<a href="javascript:;"><?php echo ($userInfo['uname']); ?></a>
							</div>
							<div class="u-signature"><?php echo ($greeting[$hint]); ?></div>
							<div class="u-level">
								<span class="rank r3">
									<s></s><a href="javascript:;"><?php echo ($rank[$userInfo['userHYdjId']]); ?></a>
								</span>
							</div>
							<div class="u-safe">
								<span>账户安全:</span>
								<i id="cla" class="safe-rank5"></i>
								<strong class="rank-text">较高</strong>
							</div>
						</div>
						<ul class="acco-info">
							<li class="fore1">
								<div class="jinku-info">
									<div class="mt" id="income">
										昨天收益<span class="ftx">（元）</span>
									</div>
									<div id="profit" class="profit">
										0.00
									</div>
									<div class="mb" id="balance">
										<a href="#">小金库</a>:
										<span><a href="#">0.00</a></span>
									</div>
									<div class="mb hide">
										<a href="#" class="alink">转入小金库，马上赚钱</a>
									</div>
								</div>
							</li>
							<li class="fore2">
								<div class="baitiao-info">
									<div class="mb5">京东白条</div>
									<div>
										<a href="#" class="alink">立即激活</a>
									</div>
								</div>
							</li>
							<li class="fore3">
								<div class="mt">
									<span>余额:</span>
									<a href="#">0.00</a>
								</div>
								<div class="mt"><span>京豆:</span><a href="#">0.00</a></div>
								<div class="mb"><span>京东卡:</span><a href="#">0</a></div>
								<div class="mb"><span>优惠券:</span><a href="#">0</a></div>
							</li>
						</ul>
					</div>
					<div id="order-list" class="mod-main">
						<div class="mt">
							<h3 id="myorder">我的订单</h3>
							<div class="extra-r">
								<a href="<?php echo U('Ucenter/orderlist','uid='.$userInfo['userId']);?>"></a>
							</div>
						</div>
						<div class="mc">
							<div class="tb-order">
							<?php if(empty($orderData)): ?>暂无订单
							<?php else: ?>
							<table width="100%" >
								<tr>
									<th>商品*数量</th>
									<th>收货人</th>
									<th>支付方式</th>
									<th>时间</th>
									<th>状态</th>
									<th>操作</th>
								</tr>

							<?php if(is_array($orderData)): foreach($orderData as $key=>$vo): ?><tbody class="fore<?php echo ($key+1); ?>"><tr>
									<td>
										<div class="imglist">
											<a href="#"><img src="/jd/Public/Uploads/<?php echo ($vo['simimg']); ?>" alt=""></a>
											<span>数量: <?php echo ($vo['amount']); ?></span>
										</div>
									</td>
									<td>
										<div class="u-name">
											<?php echo ($vo['receiver']); ?>
										</div>
									</td>
									<td>
										￥<?php echo ($vo['price']*$vo['amount']); ?><br/>
										<?php echo ($payments[$payment['payment']]); ?>
									</td>
									<td>
										<span>
											<?php echo (date('Y-m-d',$vo['orderTime'])); ?><br/>
											 <?php echo (date('H:i:s',$vo['orderTime'])); ?>
										</span>
									</td>
									<td>
										<strong class="ftx04">
											<?php switch($vo['orderState']): case "0": ?>等待发货<?php break;?>
												<?php case "1": ?>已经发货<?php break;?>
												<?php case "2": ?>已确认收货<?php break;?>
												<?php case "3": ?>已取消订单<?php break; endswitch;?>
										</strong>
									
									</td>
									<td class="order-doi">
										<strong class="ftx04">
											<a href="<?php echo U('Ucenter/orderDetail','id='.$vo['orderId']."&pid=".$vo['productId']);?>" target="_blank">查看</a>
											<?php switch($vo['orderState']): case "0": ?><a href="<?php echo U('Ucenter/cancel','orderId='.$vo['orderId']);?>" onclick="return confirm('真的不爱了么')"><?php echo ($actions[0]); ?></a><?php break;?>
												<?php case "1": ?><a href="<?php echo U('Ucenter/confirm','orderId='.$vo['orderId']);?>" ><?php echo ($actions[1]); ?></a><?php break;?>
												<?php case "2": ?><a href="<?php echo U('Comments/comments','id='.$vo['prodId']);?>" target="_blank"><?php echo ($actions[2]); ?></a><?php break;?>
												<?php case "3": ?><a href="javascript:;"><?php echo ($actions[3]); ?></a><?php break; endswitch;?>
										</strong>
									</td>
								</tr>
								</tbody><?php endforeach; endif; ?>
							</table><?php endif; ?>
								
								<div>
									<?php echo ($page); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="clr"></div>
					<div id="goods-list" class="mod-main">
						<div class="mt">
							<h3 id="care">我关注的商品</h3>
							<!-- <ul class="extra-l">
								<li><a href="#">降价商品<em class="ftx03">0</em></a></li>
								<li><a href="#">促销商品<em class="ftx03">0</em></a></li>
								<li><a href="#">现货商品<em class="ftx01">1</em></a></li>
							</ul> -->
							<div class="extra-r">
								<!-- <a href="#">查看更多</a> -->
							</div>
						</div>
						<div class="mc">
							<div class="iloading" style="display:none">正在加载，请稍候...</div>
							<div class="ac nocont-box hide">您还没有关注任何商品，看到感兴趣的商品就果断关注吧！看看大家都关注了什么！</div>
							<div id="fol-p-con" class="follow" style="width:700px">
								<a href="javascript:;" class="prev ctrl"><b></b></a>
								<a href="javascript:;" class="next ctrl"><b></b></a>
								<div class="slide-show">
									<div class="slide-show-ctn">
									<?php if(empty($careGoods)): ?>您暂时没哟关注商品，赶紧去关注吧
										<?php else: ?>
										<ul>
											<?php if(is_array($careGoods)): foreach($careGoods as $key=>$vo): ?><li>
													<div class="p-img">
														<a href="<?php echo U('Details/details','id='.$vo['prodId']);?>" target="_blank"><img src="/jd/Public/Uploads/<?php echo ($vo['img']); ?>" width="100px" height="100px" alt=""></a>
													</div>
													<div class="p-price">￥<?php echo ($vo['price2']); ?></div>
												</li><?php endforeach; endif; ?>
											</ul><?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="shop-list" class="mod-main">
						<div class="mt" id="history">
							<h3>我的浏览记录</h3>
							<!-- ul class="extra-l">
								<li><a href="#">最近浏览记录<em class="ftx01">1</em></a></li>
							</ul> -->
							<div class="extra-r"><!-- <a href="#">查看更多</a> --></div>
						</div>
						<div class="mc">
							
							<div class="iloading" style="display:none">正在加载，请稍候...</div>
							<div class="ac nocont-box hide">您还没有关注任何商品，看到感兴趣的商品就果断关注吧！看看大家都关注了什么！</div>
							<div id="fol-p-con" class="follow" style="width:700px">
								<a href="javascript:;" class="prev ctrl"><b></b></a>
								<a href="javascript:;" class="next ctrl"><b></b></a>
								<div class="slide-show">
									<div class="slide-show-ctn">
										<?php if(empty($historyGoods)): ?>您还没有浏览过任何商品，赶紧去看看都有那些自己喜欢的东西吧~~<?php endif; ?>
										<ul>
											<?php if(is_array($historyGoods)): foreach($historyGoods as $key=>$vo): ?><li>
												<div class="p-img">
													<a href="<?php echo U('Details/details','id='.$vo['prodId']);?>"><img src="/jd/Public/Uploads/<?php echo ($vo['img']); ?>" alt="" width="108px"></a>
												</div>
												<div class="p-name"><a href="<?php echo U('Details/details','id='.$vo['prodId']);?>"><?php echo ($vo['prodName']); ?></a></div>
												<!-- <div class="p-follow mb5 mt5"><?php echo ($vo['price2']); ?></div>
												<span class="p-cut">
													促销活动
													<span class="num">0</span>
												</span> -->
											</li><?php endforeach; endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="right" class="mod-main">
					<div id="recommend">
						<div class="mt">
							<h3>会员推荐</h3>
							<div class="extra-r">
								
							</div>
						</div>
						<div class="mc">
							<div class="economical">
								<div class="gain-beans">
									<div class="g-b-num">
										会员俱乐部
									</div>
									<div class="g-b-btn" id="eco-item">
										<a href="#">进入</a>
									</div>
								</div>
								<ul class="eco-item">
									<li>
										<div class="da-item">
										<div class="ext1">定期送</div>
										<div class="ext2">食品自动周期送货上门</div>
										<a href="#"><img src="/jd/Application/Home/Common/Images/commercial_1.jpg" width="110" height="60" alt=""></a>
										</div>
									</li>
									<li>
										<div class="da-item">
										<div class="ext1">定期送</div>
										<div class="ext2">食品自动周期送货上门</div>
										<a href="#"><img src="/jd/Application/Home/Common/Images/commercial_2.jpg" width="110" height="60" alt=""></a>
										</div>
									</li>
									<li>
										<div class="da-item">
										<div class="ext1">定期送</div>
										<div class="ext2">食品自动周期送货上门</div>
										<a href="#"><img src="/jd/Application/Home/Common/Images/commercial_3.jpg" width="110" height="60" alt=""></a>
										</div>
									</li>
									<li>
										<div class="da-item">
										<div class="ext1">定期送</div>
										<div class="ext2">食品自动周期送货上门</div>
										<a href="#"><img src="/jd/Application/Home/Common/Images/commercial_1.jpg" width="110" height="60" alt=""></a>
										</div>
									</li>
									<li>
										<div class="da-item">
										<div class="ext1">定期送</div>
										<div class="ext2">食品自动周期送货上门</div>
										<a href="#"><img src="/jd/Application/Home/Common/Images/commercial_2.jpg" width="110" height="60" alt=""></a>
										</div>
									</li>
									<li>
										<div class="da-item">
										<div class="ext1">定期送</div>
										<div class="ext2">食品自动周期送货上门</div>
										<a href="#"><img src="/jd/Application/Home/Common/Images/commercial_3.jpg" width="110" height="60" alt=""></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="service">
						
					</div>
					<div class="history">
						
					</div>
				</div>
				<span class="clr"></span>
			</div>
		</div>
	</div>
	<div class="clr"></div>
	<div class="w">
	<div id="service-2014">
		<dl class="fore1">
			<dt><b></b><strong>购物指南</strong></dt>
			<dd>
				<div><a href="#">购物流程</a></div>
				<div><a href="#">会员介绍</a></div>
				<div><a href="#">团购/机票</a></div>
				<div><a href="#">常见问题</a></div>			
				<div><a href="#">大家电</a></div>
				<div><a href="#">联系客服</a></div>
			</dd>
		</dl>
		<dl class="fore2">
			<dt><b></b><strong>购物指南</strong></dt>
			<dd>
				<div><a href="#">购物流程</a></div>
				<div><a href="#">会员介绍</a></div>
				<div><a href="#">团购/机票</a></div>
				<div><a href="#">常见问题</a></div>			
				<div><a href="#">大家电</a></div>
				<div><a href="#">联系客服</a></div>
			</dd>
		</dl>
		<dl class="fore3">
			<dt><b></b><strong>购物指南</strong></dt>
			<dd>
				<div><a href="#">购物流程</a></div>
				<div><a href="#">会员介绍</a></div>
				<div><a href="#">团购/机票</a></div>
				<div><a href="#">常见问题</a></div>			
				<div><a href="#">大家电</a></div>
				<div><a href="#">联系客服</a></div>
			</dd>
		</dl>
		<dl class="fore4">
			<dt><b></b><strong>购物指南</strong></dt>
			<dd>
				<div><a href="#">购物流程</a></div>
				<div><a href="#">会员介绍</a></div>
				<div><a href="#">团购/机票</a></div>
				<div><a href="#">常见问题</a></div>			
				<div><a href="#">大家电</a></div>
				<div><a href="#">联系客服</a></div>
			</dd>
		</dl>
		<dl class="fore5">
			<dt><b></b><strong>购物指南</strong></dt>
			<dd>
				<div><a href="#">购物流程</a></div>
				<div><a href="#">会员介绍</a></div>
				<div><a href="#">团购/机票</a></div>
				<div><a href="#">常见问题</a></div>			
				<div><a href="#">大家电</a></div>
				<div><a href="#">联系客服</a></div>
			</dd>
		</dl>
		<span class="clr"></span>
	</div>
    <script src="/jd/Public/Multicuploads/jquery.uploadify.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(function(){
		//获取用户id
		$uid = $('#shortcut .mypage').attr('uid');

		//鼠标hover效果
		$('#shortcut .myset').hover(function(){
			$(this).addClass('hover');
			$(this).find('dd').css('display','block');
		},function(){
			$(this).removeClass('hover');
			$(this).find('dd').css('display','none');
		})

		$('#shortcut .mynews').hover(function(){
			$(this).addClass('hover');
			$(this).find('dd').css('display','block');
		},function(){
			$(this).removeClass('hover');
			$(this).find('dd').css('display','none');
		})

		//无刷新文件上传
		$('#file_upload').uploadify({
		    //formData用于传递一些数据到后台
		    'formData'     : {
		        'uid' : $uid,
		    },
		    'swf'      : '/jd/Public/Multicuploads/uploadify.swf',
		    'uploader' : '<?php echo U('Ucenter/multiupload');?>',
		    'method'   : 'post',
		    'buttonText':'选择图片',
		    'progressData':'percentage',
		    'removeCompleted':true,
		    'onUploadSuccess' : function(file, data) {
		    	//避免在调试模式下的返回值的问题
		    	//var path = data.substring(0,data.search("<"));
		    	var path = data;
		          $('#user-info .u-pic img')[0].src = '/jd/Public/Uploads/'+path;
		        },
		    'onQueueComplete':function(file,data){
		    	$('#dialog2').fadeOut();
		    	$('#feedback').fadeIn().html('<font color="green" style="margin-bottom:20px;">上传成功</font><br/><br/>');
		    	// $('#userimg').html('<font color="green" style="margin-bottom:20px;">上传成功</font><br/><br/>');
				setTimeout(function(){
					$('#mask').fadeOut();
					$('#feedback').fadeOut();
				},1500);
				
		    }
		});

		//定义show函数 用来显示2个模块 mask和dialog
		function show(){
			$('#mask').css('display','block');
			$('#dialog').css('display','block');
		}

		function fadding(){
			$('#mask').fadeOut();
			$('#dialog').fadeOut();
		}
		//隐藏这2个模块
		function hide(){
			$('#mask').css('display','none');
			$('#dialog').css('display','none');
		}

		function clear(){
			$('#dialog form').html('');
		}

		//当用户点击编辑个人信息时候
		$('#info').live('click',function(){
			show();
			$.ajax({
				'type':'get',
				//这里的type参数用来指定用户需要修改的是那部分数据，便于返回对应的数据
				'url':'<?php echo U('Ucenter/getUserInfo');?>',
				'data':'uid='+ $uid + "&type=1",
				'success':function(data){
					$('#dialog #normal').html(data);
				}
			});
		})

		//当点击图片的时候
		$('#uimg').click(function(){
			$('#mask').fadeIn();
			$('#dialog2').fadeIn();
			$('#userimg').css('display','block');
		})

		//点击关闭按钮的时候隐藏遮罩层
		$('#d_close').click(function(){
			hide();
			$('#mask').css('display','none');
			$('#dialog').css('display','none');
		})

		
		$('#i_close').click(function(){
			$('#mask').css('display','none');
			$('#dialog2').css('display','none');
		})

		
		$('#a_close').live('click',function(){
			$('#mask').css('display','none');
			$('#newAddress').css('display','none');
		})
		
		
		$('#address').click(function(){
			$('#mask').css('display','block');
			$('#newAddress').css('display','block');
		})

		//点击添加地址数据到数据库
		var $addhtml = $('#newAddress').html();
		var	$oriIpt = $('input[name="oripass"]');
		var	$upwdIpt = $('input[name="upwd"]');
		var	$upwdedIpt = $('input[name="upwded"]');
		var $tips = $('span.tip');
		var $onOff = true;

		//js判断用户原密码框用户是否有输入值
		$oriIpt.live('blur',function(){
			if($(this).val() == ""){
				$(this).siblings('.tip').html('<font color="red">原密码不能为空</font>');
			}else{
				$(this).siblings('.tip').html('');
			}
		})

		//判断用户是否输入新密码
		$upwdIpt.live('blur',function(){
			if($(this).val() == ""){
				$(this).siblings('.tip').html('<font color="red">新密码不能为空</font>');
			}else{
				$(this).siblings('.tip').html('');
			}
		})

		//js判断用户是否再次输入新密码
		$upwdedIpt.live('blur',function(){
			if($(this).val() == ""){
				$(this).siblings('.tip').html('<font color="red">重复新密码不能为空</font>');
			}else if($(this).val() != $upwdIpt.val()){
				$(this).siblings('.tip').html('<font color="red">重复新密码和新密码不匹配</font>');
			}else{
				$(this).siblings('.tip').html('');
			}
		})

		$('#add').live('click',function(){
			//判断是否有错误存在
			$.each($tips,function(i,n){
				console.log(n.innerHTML);
				if(n.innerHTML != ''){
					$onOff = false;
				}else{
					$onOff = true;
				}
				console.log($onOff);
			})

			//如果存在错误，则返回，不提交ajax操作
			if(!$onOff){
				return false;
			}

			$data = $('#newAddress :input').serialize();
				
			$.ajax({
				'type':'post',
				//这里的type参数用来指定用户需要修改的是那部分数据，便于返回对应的数据
				'url':'<?php echo U('Ucenter/addAddress');?>',
				'data': $data,
				'success':function(data){
					if(data == 1){
						$('#newAddress').fadeOut();
						$('#feedback').fadeIn().html('<font style="color:green">修改成功</font><br/><br/>');

						setTimeout(function(){
							$('#feedback').fadeOut();
							$('#mask').fadeOut();
							$('#newAddress').html($addhtml);
						},1000);
					}else if(data == 0){
						$('#newAddress').fadeOut();
						$('#feedback').fadeIn().html('<font style="color:red">原密码错误</font><br/><br/>');

						setTimeout(function(){
							$('#feedback').fadeOut();
							$('#mask').fadeOut();
							$('#newAddress').html($addhtml);
						},1000);
					}else{
						$('#newAddress').fadeOut();
						$('#feedback').fadeIn().html('<font style="color:red">密码修改失败</font><br/><br/>');

						setTimeout(function(){
							$('#feedback').fadeOut();
							$('#mask').fadeOut();
							$('#newAddress').html($addhtml);
						},1000);
					}
				}
			});
		})

		//省市县三级联动效果
		//当点击省的时候
		$('#province').live('change',function(){
			$.ajax({
				'url':'<?php echo U('Ucenter/getNext');?>',
				'data':'pid='+this.value,
				'dataType':'json',
				'success':function(data){
					$('#city').html(data['city']);
					$('#county').html(data['county']);
				}
			})
		})

		$('#city').live('change',function(){
			$.ajax({
				'url':'<?php echo U('Ucenter/getNext');?>',
				'data':'pid='+this.value,
				'dataType':'json',
				'success':function(data){
					$('#county').html(data['city']);
				}
			})
		})

		$('#commit input[type=submit]').live('click',function(){
			//拼凑相关表单数据
			$nickName = $('#nickName').val();
			$userId = $('#userId').val();
			$userday = $('#birthdayYear').val() + '/' + $('#birthdayMonth').val() + "/" + $('#birthdayDay').val();
			$userdizhi = $('#province').val()+'/'+$('#city').val() +'/' + $('#county').val();
			$data = "nickName="+$nickName + "&userId="+$userId+"&userday="+$userday+"&userdizhi="+$userdizhi;

			$.ajax({
				'type':'post',
				'data':$data,
				'url':'<?php echo U('Ucenter/addUserInfo');?>',
				'success':function(data){
					if(data == "添加成功"){
						$('#dialog').fadeOut();
						$('#feedback').css('display','block').html('<font color="green" style="font-weight:bold">'+data+'</font><br/><br/>');
						setTimeout(function(){
							$("#feedback").fadeOut();
							$('#mask').fadeOut();
						},1000);
						
					}
				}
			})
		})

		//滚动函数
		function myslide(obj){
			var $ul = $(obj).find('ul');
			var $li = $(obj).find('li').eq(0);
			var $wrapWidth = $(obj).find('.follow').width();
			obj.total = 0;	//最大能够滚动的距离,需要使用自定义属性，不然会有兼容性问题
			obj.iNow = 0;	//当前滚动的位置，也是使用自定义属性，避免相互影响
			if($li){
				var $slideWidth = $li.outerWidth();
				var $width = $li.outerWidth(true);
				var $totalWidth = $width * $(obj).find('li').length;
				$ul.css({'width':$totalWidth});
				if($totalWidth > $wrapWidth){
					obj.total = Math.ceil(($totalWidth - $wrapWidth)/$width); 	//判断能够滚动的最大距离
					$(obj).find('.next').css({'display':'block'});
				}
				$(obj).find('.next').on('click',function(){
					obj.iNow--;
					$pos = $ul.position().left - $width;
					if(!($ul.is(':animated')) && Math.abs(obj.iNow) <= obj.total){
						$ul.animate({left:$pos});
					}
					console.log(obj.iNow + ":" + obj.total);
					if(Math.abs(obj.iNow) >= obj.total){	
						$(this).css('display','none');
					}

					if(obj.iNow < 0){
						$(obj).find('.prev').css('display',"block");
					}
				})

				$(obj).find('.prev').on('click',function(){
							obj.iNow++;
							$pos = $ul.position().left + $width;
							if(!($ul.is(':animated'))){
								$ul.animate({left:$pos});
							}
							console.log(obj.iNow + ":" + obj.total);
							if(obj.iNow >= 0){
								$(obj).find('.prev').css('display','none');
								$(obj).find('.next').css('display','block');
							}
						})
			}
		}

		//调用滚动函数
		var shops = $("#shop-list")[0];
		var goods = $('#goods-list')[0];
		myslide(shops);
		myslide(goods);

		//站内新闻查看
		$("#shortcut .mynews dd a").live('click',function(){
			$('#mess').fadeIn();
			$('#mask').fadeIn();
			$(this).fadeOut();
			console.log($('#shortcut .mynews dd').html());
			// if($('#shortcut .mynews dd').html() == ''){
			// 	$this.html("<span>暂无消息</span>");
			// };

			$.ajax({
				'url':'<?php echo U('Ucenter/getNews');?>',
				'data':'mid='+$(this).attr('data-mid'),
				'dataType':'json',
				'success':function(data){
					if(data){
						$('#mess .title').html(data.title);
						$('#mess .content').html(data.message);
					}else{
						$('#mess .title').html("站内新闻查看失败");
					}
			}
		})
	})

		$('#mess_close').live('click',function(){
			$('#mess').fadeOut();
			$('#mask').fadeOut();
		})

});
	</script>
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

	<!--遮罩层-->
	<div id='mask'></div>
	<div id="feedback">
		
	</div>
	<!-- //图片弹出层，因为 -->
	<div class="user-set userset-lcol" id="dialog2">
		<a href="javascript:;" id="i_close">×</a>
		<form id="userimg">
				<div class="form"><div class="item"><div id="queue"></div><input id="file_upload" name="file_upload" type="file" multiple="true"></div></div>
		</form>
	</div>

	<!-- //对话框层 -->
	<div class="user-set userset-lcol" id="dialog">
		<a href="javascript:;" id="d_close">×</a>
		<form id="normal">
		</form>
		
		<div id="commit">
			<input type="submit" value="更新">
		</div>
	</div>
	<!--站内消息弹出框-->
	<div id="mess">
		<a href="javascript:;" id="mess_close">×</a>
		<div class="title">
			哈哈哈哈哈哈哈哈哈哈
		</div>
		<div class="content">
			哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈嘿嘿嘿黑恶化哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈呵呵呵呵呵
		</div>
	</div>

	<!-- 修改密码弹出框 -->
	<div class="user-set userset-lcol" id="newAddress">
		<a href="javascript:;" id="a_close">×</a>
		<div class="form">
			    <div class="item">
			        <span class="label"><em>*</em>原密码：</span>
			        <div class="fl">
			            <input type="password" class="itxt" maxlength="20" id="receiver" name="oripass"/>
			            <span class="tip"></span>
			            <div class="clr"></div>
			        </div>
			    </div>
			    <div class="item">
			        <span class="label"><em>*</em>新密码：</span>
			        <div class="fl">
			            <input type="password" class="itxt" maxlength="20" id="tel" name="upwd"/>
			            <span class="tip"></span>
			            <div class="clr"></div>
			        </div>
			    </div>
			    <div class="item">
			        <span class="label"><em>*</em>重复新密码：</span>
			        <div class="fl">
			            <input type="password" class="itxt" maxlength="20" id="tel" name="upwded"/>
			            <span class="tip"></span>
			            <div class="clr"></div>
			        </div>
			    </div>
			    <input type="hidden" name="userId" value="<?php echo ($uid); ?>">
			    <div class="item">
			        <div class="fl">
			            <input type="button" id="add" value="修改">
			        </div>
			    </div>
		</div>
	</div>
<!--测试用-->
</body>
</html>