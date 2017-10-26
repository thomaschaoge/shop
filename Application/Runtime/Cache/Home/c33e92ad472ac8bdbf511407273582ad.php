<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>购物车</title>
		<link rel="stylesheet" href="/jd/Application/Home/Common/Css//orderInfo.css" />
		<script src="/jd/Application/Home/Common/Js//jquery-1.8.3.min.js"></script>
		<script src="/jd/Application/Home/Common/Js//orderInfo.js"></script>
	</head>
	<body>

		<!--===========导入头部start============-->
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
		<!--===========导入头部start============-->

		<!--===========logo start=============-->
		<div class="w2 w1 th clear-fix">
			<div id="logo">
				<a href="#">
					<img src="/jd/Application/Home/Common/Images//logo-201305.png" alt="返回京东商城首页" />
				</a>
			</div>
			<div class="progress clearfix">
				<ul class="progress-2">
					<li>1.我的购物车</li>
					<li class="s2">2.填写核对订单信息</li>
					<li class="s3">3.成功提交订单</li>
				</ul>
			</div>
		</div>

		<!--===========logo end=============-->
		<!--===========订单信息确认 start=============-->
		<div class="w2 m2">
			<div id="checkout">
				<div class="mt">
					<h2>填写并核对订单信息</h2>
				</div>
				<div id="wizard" class="checkout-steps">
					<div id="step-1" class="step step-complete step-current"><!--进入样式-->
						<div class="step-title">
							<div id="save-consignee-tip" class="step-right"> </div>
							<strong id="consigneeTitleDiv">收货人信息</strong>
							<span id="userAddress" class="step-action">
								<a id="saveConsigneeTitleMinDiv" href="" style="color:#005EA7;">保存收货人信息</a>
							</span>
						</div>
						<div class="step-content">
							<div id="consignee" class="sbox-wrap">
								<div class="sbox">
									<div id="addressOkInfo" class="s-content hide">
										<p>
										<?php echo ($list["receiver"]); ?> &nbsp;&nbsp;<?php echo ($list["tel"]); ?> &nbsp;&nbsp;<?php echo ($list["hometel"]); ?>&nbsp;&nbsp; <?php echo ($list["email"]); ?>  
										<br />
										<?php echo ($list["addressbie"]); ?> &nbsp;&nbsp;<?php echo ($list["address"]); ?>
										</p>
									</div>

								<!--===========-->
								
									<div id="addressInfo-verify" class="form1">
					
										<input type="hidden" name="hidden-uId" value="<?php echo ($userId); ?>" />
										<input type="hidden" name="hidden-aId" value="<?php echo ($list['addressId']); ?>" />

										<div id="consignee-list" name="consignee-list">
										<!--==============隐藏域 start========== -->
											<?php if(is_array($list)): foreach($list as $key=>$vo): ?><input type="hidden" name="hidden-<?php echo ($key); ?>" value="<?php echo ($vo); ?>" /><?php endforeach; endif; ?>
										<!--==============隐藏域 end========== -->
											<div class="item item-selected <?php echo ($list['isDefault']?'':'hide'); ?>" index="consignee_index_1"> 
												<label>
												<input id="consignee_radio" class="hookbox" type="radio" checked='' value="" name="consignee_radio">
													<b><?php echo ($list["receiver"]); ?></b>
												  <?php echo ($list["addressbie"]); echo ($list["address"]); ?>&nbsp;&nbsp; <?php echo ($list["tel"]); ?>
												</label>
												<span class="item-action" style="display: inline;">
													<a id="edit-address" href="javascript:void(0)">编辑</a>
													<a id="del-address" href="javascript:void(0)">删除</a>
												</span>
												
											</div>	
										</div>
										

										<div id="use-new-address" class="item">
											<input id="consignee_radio_new" class="hookbox" type="radio" name="consignee_radio" <?php echo ($list['isDefault']?'':'checked'); ?>>
											<label for="consignee_radio_new">使用新地址 </label>
										</div>
										<p id="hehehe"></p>
										<form>
											<div id="consignee-form" class="consignee-form <?php echo ($list['isDefault']?'hide':''); ?>" style="padding-left: 12px;" name="consignee-form">
												<div id="name_div" class="list">
													<span class="label">
														<em>*</em>
														收货人：
													</span>
													<div class="field">
														<input id="consignee_name" class="textbox" type="text"  maxlength="20" name="{consigneeParam.name}" value="">
													</div>
													<span id="name_div_error" class="status error"></span>
												</div>
												<div id="area_div" class="list select-address">
													<span class="label"><em>*</em>
													所在地区：
													</span>
													<div class="field">
														<span id="span_area">
															<span id="span_province">
																<select id="consignee_province" pId="1" name="consigneeParam.provinceId">
																	<option value="-1">请选择：</option>
																	<?php if(is_array($diqu)): foreach($diqu as $key=>$val): ?><option value="<?php echo ($val["areaid"]); ?>"><?php echo ($val["diqu"]); ?></option><?php endforeach; endif; ?> 
																</select>
															</span>
															<span id="span_city">
																<select id="consignee_city" name="consigneeParam.city">
																	<option value="-1">请选择：</option>
																	
																</select>
															</span>
															<span id="span_county">
																<select id="consignee_county" name="consigneeParam.countyId">
																	<option value="-1" >请选择：</option>
																
																</select>
															</span>
															<span id="span_town" style="display:none"></span>
														</span>
														<span class="form-tip">
															<span id="area_div_error" class="status error"></span>
													  		标“*”的为支持货到付款的地区,
															<a id="codHelpUrl" href="http://help.jd.com/help/distribution-768-0-0-0-0-1411719655700.html" target="_blank" style="color:#005EA7">查看货到付款地区</a>
														</span>
													</div>
												</div>
												<div id="address_div" class="list full-address">
													<span class="label">
														<em>*</em>
														详细地址：
													</span>
													<div class="field">
														<span id="areaNameTxt" class="fl selected-address"></span>
														<input id="consignee_address" class="textbox" type="text" maxlength="50" name="consigneeParam.address">
													</div>
													<span id="address_div_error" class="status error"></span>
												</div>
												<div id="call_div" class="list">
													<span class="label">
														<em>*</em>
														手机号码：
													</span>
													<div class="field">
														<div class="phone">
															<input id="consignee_mobile" class="textbox" type="text" maxlength="11"name="consigneeParam.mobile">
															<em>或</em>
															<span>固定电话：</span>
															<input id="consignee_phone" class="textbox" type="text" maxlength="20"  name="consigneeParam.phone">
														</div>
														<span id="call_div_error" class="status error"></span>
													</div>
												</div>
												<div id="email_div" class="list">
													<span class="label">
														<em></em>
														邮箱：
														</span>
													<div class="field">
														<input id="consignee_email" class="textbox" type="text"  maxlength="50" name="consigneeParam.email">
														<span class="form-tip">用来接收订单提醒邮件，便于您及时了解订单状态</span>
													</div>
													<span id="email_div_error" class="status error"></span>
												</div>
											</div>

										</form>
										<div class="form-btn group">
											<a class="btn-submit" href="javascript:void(0)">
												<span id="saveConsigneeTitleDiv">保存收货人信息</span>
											</a>
										</div>

									</div>

								<!--====================-->
								</div>
							</div>
						</div>
					</div>
					<div id="step-2" class="step step-complete"><!--确定了加-->
						<div class="step-title">
							<div id="save-payAndShip-tip" class="step-right">
								<span class="save-consignee-payship">
								</span>
							</div>
							<strong>支付及配送方式</strong>
							<span id="payment-ship_edit_action" class="step-action">
								<font color="#B0B0B0">如需修改，请先保存收货人信息</font>
							</span>
						</div>
						<div class="step-content">
							<div id="payment-ship" class="sbox-wrap">

								<div id="payment-ok" class="sbox">
									<div class="s-content payment-info">
										<div class="payment-selected">
										<?php switch($$list['payment']): case "0": ?>货到付款<?php break;?>
											<?php case "1": ?>在线支付<?php break;?>
											<?php default: ?>分期付款<?php endswitch;?>
										
										</div>
										<div class="way-list">
											<div class="way-item">
												<?php if($list['delivery'] == 0): ?>京东快递
												<?php else: ?>
													上门自提<?php endif; ?>
											
											</div>
										</div>
									</div>
								</div>
							
								<div id="payment-terms" class="payment hide">
									<h3>支付方式</h3>
									<input id="instalmentPlan" type="hidden" value="false">
									<div style="padding-bottom:10px"></div>
									<div class="mc form1">
										<div class="item item-selected">
											<div class="label">
												<input id="pay-method-1" class="hookbox" type="radio" checked value="0" payname="货到付款" name="payment">
												<label for="pay-method-1">
													货到付款
													<span id="supportPaySkus-1" style="display:none"></span>
												</label>
											</div>
											<div class="field">
												<span class="tip">
													送货上门后再收款，支持现金、POS机刷卡、支票支付
													<a href="http://help.jd.com/help/distribution-768-1-2901-4135-0-1411722463863.html" target="_blank">查看服务及配送范围</a>
												</span>
											</div>
											<span class="clr"></span>
										</div>
										<div class="item">
											<div class="label">
												<input id="pay-method-2" class="hookbox" type="radio" value="1" payname="在线支付" name="payment">
												<label for="pay-method-1">
													在线支付
													<span id="supportPaySkus-1" style="display:none"> </span>
												</label>
											</div>
											<div class="field">
												<span class="tip">
													即时到帐，支持绝大数银行借记卡及部分银行信用卡 
													<a href="http://help.jd.com/help/distribution-768-1-2901-4135-0-1411722463863.html" target="_blank">查看银行及限额</a>
												</span>
											</div>
											<span class="clr"></span>
										</div>
										<div class="item">
											<div class="label">
												<input id="pay-method-3" class="hookbox" type="radio" payname="分期付款" value="2"  name="payment">
												<label for="pay-method-1">
													分期付款
													<span id="supportPaySkus-1" style="display:none"></span>
												</label>
											</div>
											<div class="field">
												<span class="tip">
													信用卡网上支付订单，按月还款，减轻资金周转压力 
													<a href="http://help.jd.com/help/distribution-768-1-2901-4135-0-1411722463863.html" target="_blank">查看分期付款帮助</a>
												</span>
											</div>
											<span class="clr"></span>
										</div>
										

									</div>
								</div>
								<div id="shipment" class="hide">
									<div class="way" style="padding-top:20px;">
										<h3>配送方式</h3>
										<div class="mc form1">
											<div id="jd-shipment-way-category" class="way-category way-category-selected" style="padding-top:5px;">
												<div class="item">
													<div class="label">
														<input id="jd-shipment" class="hookbox" type="radio" value="0" checked="" name="shipmentRadio">
														<label for="jd-shipment">京东快递</label>
													</div>
													<div class="field">
													<span id="jdShipmentTip" class="tip" style="">此订单支持预约配送，您可以选择指定的时间段</span>
													</div>
												</div>
												<div id="jd-shipment-extend-info" class="express-form">
													<div class="list warm-prompt">
														<span class="label">温馨提示：</span>
														<div class="field">
															<p>1.我们会努力按照您指定的时间配送，但因天气、交通等各类因素影响，您的订单有可能会有延误现象！</p>
															<p>2.部分服务仅在京东配送区域提供，非京东配送区域无法选择！</p>
														</div>
													</div>
												</div>
											</div>
											<div id="pick-shipment-way-category" class="way-category">
												<div id="pick-sku" class="way-category-label" style="padding-top:10px;">
													<div class="way-category-label-a">
														<div class="item">
															<div class="label">
																<input id="pick-shipment" class="hookbox" type="radio" value="1" name="shipmentRadio">
																<label style="color:#666" for="pick-shipment">上门自提</label>
															</div>
															<div class="field">
																<span class="tip">
																	自提时付款，支持现金、POS刷卡、支票支付
																	<a target="_blank" href="http://help.jd.com/help/question-64-1-2800-2849-0-0-1405075665554.html">查看自提流程</a>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<br />
										</div>
										<div class="form-btn group">
											<a class="btn-submit" href="javascript:void(0)">
											<span id="savePaymentDeliveryTitleDiv">保存支付及配送方式</span>
											</a>
										</div>
										<br />
									</div>
								</div>
							</div>
							
							
							<!--==========-->
						</div>
					</div>
					<div id="step-3" class="step step-complete">
						<div class="step-title">
							<div class="step-title">
								<strong>发票信息</strong>
								<span id="part-invoice_edit_action" class="step-action">
									<a href="#">[修改]</a>
								</span>
							</div>
						</div>
						<div class="step-content">
							<div id="payment-invoice" class="sbox-wrap">
								<div class="sbox">
									<div class="invoice">
										<div class="pinvoice-content">
											 普通发票（纸质）&nbsp;个人&nbsp;明细
											<br>
											<div class="ftx-04 invoice-prompt">
												<dl class="clearfix">
													<dt>温馨提示：</dt>
													<dd>
														<div>发票的开票金额不包括京东卡/京东E卡、优惠券和京豆支付部分</div>
													</dd>
												</dl>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="step-4" class="step step-complete">
						<div class="step-title">
							<a id="cartRetureUrl" class="return-edit" href="/jd/index.php/Cart/index">返回修改购物车</a>
							<strong>商品清单</strong>
						</div>
						<div class="step-content">
							<div id="part-order" class="sbox-wrap">
								<div class="sbox">
									<div id="order-cart">
										<div class="order-review">
											<span id="span-skulist">
												<table class="review-thead">
													<tbody>
														<tr>
														<td class="fore1">商品</td>
														<td class="fore2">京东价</td>
														<td class="fore3">优惠</td>
														<td class="fore4">数量</td>
														<td class="fore4">库存状态</td>
														</tr>
													</tbody>
												</table>
												<div class="review-body">
													
												<?php if(is_array($goods)): foreach($goods as $key=>$vo): if(($key != 'tsum') AND ($key != 'tprice') ): ?><div class="review-tbody">
														<table class="order-table">
															<tbody>
																<tr>
																	<td class="fore1">
																		<div class="p-goods">
																			<div class="p-img">
																				<a href="#">
																					<img src="/jd/Public/Uploads/<?php echo ($vo["simimg"]); ?>" alt="" />
																				</a>
																			</div>
																			<div class="p-detail">
																				<div class="p-name">
																					<a target="_blank" href="http://item.jd.com/1127691.html"><?php echo ($vo["prodName"]); ?></a>
																				</div>
																				<div class="p-more">
																					商品编号：<?php echo ($vo["productId"]); ?>
																					<br>
																					<span id="promise_1127691" class="promise411"></span>
																				</div>
																			</div>
																		</div>
																	</td>
																	<td class="p-price">
																		<strong>￥<?php echo ($vo["price1"]); ?></strong>
																	</td>
																	<td class="p-price" style="width:150px">
																		<strong>￥<?php echo ($vo["price2"]); ?></strong>
																	</td>
																	<td class="fore2">x <?php echo ($vo["num"]); ?></td>
																	<td class="fore2 p-inventory" skuid="1127691">有货</td>
																</tr>
															</tbody>
														</table>
													</div><?php endif; endforeach; endif; ?>

												</div>
											</span>
											<div class="order-summary">
												<div class="statistic fr">
													<div class="list">
														<span>
															<em id="span-skuNum"><?php echo ($goods['tsum']); ?></em>
														件商品，总商品金额：
														</span>
														<em id="warePriceId" class="price" v="null">￥<?php echo ($goods['tprice']); ?></em>
													</div>
													<div id="showFreightPrice" class="list" style="padding-left:140px;">
														<span id="freightSpan" style="width:40px;">运费：</span>
														<em id="freightPriceId" class="price"> ￥0.00</em>
													</div>
													<div class="list">
														<span>应付总额：</span>
														<em id="sumPayPriceId" class="price">￥<?php echo ($goods['tprice']); ?></em>
													</div>
													<div class="span clr"></div>
												</div>
												<div class="span clr"></div>
												<div class="order-coupon" data-bind="coupon">
													<div id="orderCouponItem" class="item">
														<div class="toggle-title">
															<a class="toggler"  href="javascript:void(0)">
															<b></b>
															使用优惠券抵消部分总额
															</a>
														</div>
														<div class="toggle-wrap hide">
															<div class="cbox">
																<div class="beans">
																	暂时不支持此功能
																</div>
															</div>
														</div>
													</div>
													<div id="orderGiftCardItem" class="item">
														<div class="toggle-title">
															<a class="toggler"  href="javascript:void(0)">
																<b></b>
																京东卡
															</a>
														</div>
														<div class="toggle-wrap hide">
															<div class="cbox">
																<div class="beans">
																	暂时不支持此功能
																</div>
															</div>
														</div>
													</div>
													<div id="orderECardItem" class="item">
														<div class="toggle-title">
															<a class="toggler"  href="javascript:void(0)">
																<b></b>
																京东E卡（此卡不能与京东卡同时使用）
															</a>
														</div>
														<div class="toggle-wrap hide">
															<div class="cbox">
																<div class="beans">
																	暂时不支持此功能
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="checkCodeDiv" class="check-code group"></div>
									<span class="clr"></span>
								</div>
								<div id="checkCodeDiv" class="check-code group"></div>
								<span class="clr"></span>
							</div>
							<div id="checkout-floatbar" class="checkout-buttons group">
								<div class="sticky-wrap">
									<div class="inner">
										<button id="order-submit" class="checkout-submit checkout-submit-disabled" type="submit">
											提交订单
											<b></b>
										</button>
										<span class="total">
											应付总额：
											<strong id="payPriceId">￥<?php echo ($goods['tprice']); ?></strong>
											元 
										</span>
									</div>
								</div>

								<div id="submit_check_info_message" class="submit-check-info">
									<span>
										您需先保存
										<a href="#consigneeFocus" style="color:#005EA7;">收货人信息</a>
										，再提交订单
									</span>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
		<!--===========订单信息确认 end==============-->
		<div class="clear"></div>
		<!--===========导入尾部start============-->
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
		<!--===========导入尾部end============-->

	</body>
</html>