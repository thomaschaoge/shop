<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" href="/jd/Application/Admin/Common/Template/plugins/plupload/jquery.plupload.queue.css" media="screen">
<link rel="stylesheet" href="/jd/Application/Admin/Common/Template/plugins/elfinder/css/elfinder.css"media="screen" >

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template/css/themer.css" media="screen">

<title>MWS Admin - Table</title>

</head>

<body>
    <!-- Header -->
        <script>
        var session=new Array();
            session['levelId']='<?php session_start(); echo $_SESSION['admin']['levelId']; ?>'; 
</script>
<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/jd/Application/Admin/Common/Template//images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/jd/Application/Admin/Common/Template//example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                       你好,<?php echo ($_SESSION['admin']['nickName']); ?>
                    </div>
                    <ul>
                    	<li><a href="javascript:void(0)">
                        <?php  $level=$_SESSION['admin']['levelId']; if($level==1){ echo "超级管理员"; }elseif($level==2){ echo "高级管理员"; }elseif ($level==3) { echo "中级管理员"; }else{ echo "初级管理员"; } ?></a></li>
                        <li><a href="<?php echo U("Aedit/gedit");?>">更改密码</a></li>
                        <li><a href="<?php echo U("Logout/logout");?>">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
         	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <div id="mws-navigation">
                <ul>  
                    <li>
                        <a href="<?php echo U('Home/index');?>"><i class="icon-home"></i>显示</a>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(2,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="<?php echo U('Admin/index');?>"><i class="icon-users"></i>管理员系统</a>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(3,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                       <a href='<?php echo U("Window/showWindow");?>'><i class="icon-monitor"></i>橱窗信息管理</a>
                    </li>
                    <li>
                        <a href='<?php echo U("Aedit/gEdit");?>'><i class="icon-pencil"></i>管理员信息修改</a>
                    </li>

                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(4,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href='<?php echo U("User/user");?>'><i class="icon-user"></i>会员信息管理</a>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(5,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href='<?php echo U("Comments/comments");?>'><i class="icon-comments"></i>商品评论管理</a>
                    </li>
                   
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(6,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-shopping-cart"></i>订单管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Order/orderAll');?>">订单列表</a></li>

                        </ul>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(7,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-television"></i>广告管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('advance/advance');?>">广告列表</a></li>
                            <li><a href="<?php echo U('advance/advanceAdd');?>">添加广告</a></li>
                        </ul>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(8,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-bended-arrow-down"></i>友情链接</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('link/link');?>">链接列表</a></li>
                            <li><a href="<?php echo U('link/addLink');?>">添加链接</a></li>
                        </ul>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(9,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-cogs"></i> 分类管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Cate/index');?>">浏览分类</a></li>
                            <li><a href="<?php echo U('Cate/add');?>">添加分类</a></li>
                        </ul>
                    </li>

                     <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(10,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-tools"></i> 商品管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Goods/index');?>">浏览商品</a></li>
                            <li><a href="<?php echo U('Goods/add');?>">添加商品</a></li>
                        </ul>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(11,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-clubs"></i> 品牌管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Brands/index');?>">浏览品牌</a></li>
                            <li><a href="<?php echo U('Brands/add');?>">添加品牌</a></li>
                        </ul>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(12,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-magic"></i> 尺寸管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Sizes/index');?>">浏览尺寸</a></li>
                            <li><a href="<?php echo U('Sizes/add');?>">添加尺寸</a></li>
                        </ul>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(13,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-feather"></i> 颜色配置</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Colors/index');?>">浏览颜色</a></li>
                            <li><a href="<?php echo U('Colors/add');?>">添加颜色</a></li>
                        </ul>
                    </li>
                    <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(14,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a href="#"><i class="icon-camera"></i> 多图管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Multipics/index');?>">浏览</a></li>
                            
                        </ul>
                    </li>
                     <li style='display:<?php  if($_SESSION['admin']['power']==1){ echo 'block'; }else{ if(in_array(15,$_SESSION['admin']['power'])){ echo 'block'; }else{ echo 'none'; } } ?>'>
                        <a id='15' href="#"><i class="icon-newspaper"></i>站内新闻</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('News/news');?>">新闻展示</a></li>
                            <li><a href="<?php echo U('News/addNews');?>">添加新闻信息</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-box-add"></i>站内信管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Message/messageAll');?>">站内信息列表</a></li>
                            <li><a href="<?php echo U('Message/addMessage');?>">发送站内信息</a></li>
                        </ul>
                    </li>
					<li>
                        <a href="<?php echo U('Survey/index');?>"><i class="icon-question-sign"></i>问卷调查</a>
                    </li>
                </ul>
            </div>         
        </div>
      
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">

                
                <!-- Panels Start -->
                 <!-- 会员详细信息查询 -->
                <?php if(is_array($arr2)): foreach($arr2 as $key=>$volist): ?><div class="mws-panel grid_8">
                        <div class="mws-panel-header">
                            <span><i class="icon-pencil"></i> 会员信息详情</span>
                        </div>
                        <div class="mws-panel-body no-padding">
                            <form class="mws-form" action="form_elements.html">
                                <div class="mws-form-inline">
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">用户编号：</label>
                                        <div class="mws-form-item" style="height:30px;">
                                            <?php echo ($volist['userId']); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">真实姓名：</label>
                                        <div class="mws-form-item">
                                            <?php echo ($volist['lzhengNamen']); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">会员积分：</label>
                                        <div class="mws-form-item">
                                            <?php echo ($volist['userJF']); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">昵称：</label>
                                        <div class="mws-form-item">
                                           <?php echo ($volist['nickName']); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">购物次数：</label>
                                        <div class="mws-form-item">
                                            <?php echo ($volist['userGCS']); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">购物行为评级：</label>
                                        <div class="mws-form-item">
                                        <?php
 if($volist['userGWdjimg']) ?>
                                            <img src="/jd/Public/Uploads/Images/<?php echo ($volist['userGWdjimg']); ?>">&nbsp;&nbsp;<?php echo ($volist['userGWdjId']); ?>&nbsp;级
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">成长值：</label>
                                        <div class="mws-form-item">
                                            <?php echo ($volist['userCZ']); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">身份证号：</label>
                                        <div class="mws-form-item">
                                            <?php echo ($volist['sfz']); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">所在地：</label>
                                        <div class="mws-form-item">
                                            <?php echo ($dizhi); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">生日：</label>
                                        <div class="mws-form-item">
                                            <?php echo ($volist['userday']); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">婚姻状况：</label>
                                        <div class="mws-form-item">
                                            <?php  if($volist['hunyi']==0){ echo '保密'; }else if($volist['hunyi']==1){ echo '已婚'; }else if($volist['hunyi']==2){ echo '未婚'; } ?>
                                        </div>
                                        
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">月收入：</label>
                                        <div class="mws-form-item">
                                            ￥<?php echo ($volist['ymoney']); ?>
                                        </div>
                                    </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">兴趣爱好：</label>
                                        <div class="mws-form-item">
                                            <?php echo ($volist['xqah']); ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>      
                    </div><?php endforeach; endif; ?>
                <!-- 订单查询 -->
                
                    <div class="mws-panel grid_8">
                        <div class="mws-panel-header">
                            <span><i class="icon-table"></i> 会员收货信息详情</span>
                        </div>
                        <div class="mws-panel-body no-padding">
                            <table class="mws-table">
                                <thead>
                                    <tr>
                                        <th>订单编号</th>
                                        <th>用户名</th>
                                        <th>收货人</th>
                                        <th>联系电话</th>
                                        <th>家庭电话</th>
                                        <th>收货地址</th>
                                        <th>地址别名</th>
                                        <th>邮箱</th>
                                        <th>下单时间</th>
                                        <th>订单状态</th>
                                        <th>是否默认</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($arr1)): foreach($arr1 as $key=>$volist): ?><tr>
                                        <td><?php echo ($volist['addressId']); ?></td>
                                        <td><?php echo ($volist['uname']); ?></td>
                                        <td><?php echo ($volist['receiver']); ?></td>
                                        <td><?php echo ($volist['tel']); ?></td>
                                        <td><?php echo ($volist['hometel']); ?></td>
                                        <td><?php echo ($volist['address']); ?></td>
                                        <td><?php echo ($volist['addressbie']); ?></td>
                                        <td><?php echo ($volist['email']); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',time())?></td>
                                        <td><?php  if($volist['orderState'] == 0){ echo '待发货'; }else if($volist['orderState'] == 1){ echo '已发货'; }else if($volist['orderState'] == 2){ echo '交易完成'; }else if($volist['orderState'] == 3){ echo "取消订单"; } ?></td>
                                        <td>
                                        <?php  if($volist['isDefault'] == 0){ echo '否'; }else if($volist['isDefault'] == 1){ echo "是"; } ?>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                
             <!-- Data Table with Numbered Pagination -->
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> 会员基本信息</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable-fn mws-table" style="font-size:12px;">
                            <thead>
                                <tr>
                                    <th>用户编号</th>
                                    <th>用户头像</th>
                                    <th>会员等级</th>
                                    <th>账户名</th>
                                    <th>邮箱</th>
                                    <th>手机号码</th>
                                    <th><span style="color:#777;"><i class="icon-tools"></i></span>&nbsp;&nbsp;操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($arr)): foreach($arr as $key=>$volist): ?><tr>
                                    <td><?php echo ($volist['userId']); ?></td>
                                    <td><a href="user.html?id=<?php echo ($volist['userId']); ?>"><img src="<?php
 if(!empty($volist['userimg'])){ echo '/jd/Public/Uploads/'.$volist['userimg']; }else{ ?>
                                        	/jd/Public/Uploads/Images/<?php echo ($volist['userHYdjimg']); ?>
                                        <?php
 } ?>"
                                    width="50px" /></a></td>
                                    <td><?php echo ($volist['userHYdjId']); ?></td>
                                    <td><?php echo ($volist['uname']); ?></td>
                                    <td><?php echo ($volist['useremail']); ?></td>
                                    <td><?php echo ($volist['usertel']); ?></td>
                                    <td><a href="user.html?id=<?php echo ($volist['userId']); ?>"><span style="color:#555;">查看会员订单信息</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="user.html?aid=<?php echo ($volist['userId']); ?>"><span style="color:#555;">查看会员详情</span></a></td>
                                    
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
               </div>
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/jd/Application/Admin/Common/Template//js/libs/jquery-1.8.3.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/jd/Application/Admin/Common/Template//plugins/datatables/jquery.dataTables.min.js"></script>

   
    <script src="/jd/Application/Admin/Common/Template//bootstrap/js/bootstrap.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//js/core/mws.js"></script>
 <!-- Core Script 
    <script src="/jd/Application/Admin/Common/Js/core/themer.js"></script>-->
    <!-- Demo Scripts (remove if not needed) -->
    <script src="/jd/Application/Admin/Common/Template/js/demo/demo.table.js"></script>
     <script src="/jd/Application/Admin/Common/Js/user.js"></script>
</body>
</html>