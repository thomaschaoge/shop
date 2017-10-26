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
                <!-- 商品的回复信息 -->
               
                <div class="mws-panel grid_8 callback" style="font-size:10px;">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> Data Table with Numbered Pagination</span>
                        <span style="float:right;margin-top:-30px;cursor:pointer;"><i class="icon-remove"></i></span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable-fn mws-table">
                            <thead>
                                <tr>
                                    <th>商品编号</th>
                                    <th>评价人</th>
                                    <th>回复人</th>
                                    <th>回复内容</th>
                                    <th>回复时间</th>
                                    <th><span style="color:#555;"><i class="icon-tools"></i></span>&nbsp;操作</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php if(is_array($arr1)): foreach($arr1 as $key=>$vo): ?><tr>
                                    <td><?php echo ($vo['prodId']); ?></td>
                                    <td><?php echo ($vo['objectName']); ?></td>
                                    <td><?php echo ($vo['userName']); ?></td>
                                    <td><?php echo ($vo['cbContent']); ?></td>
                                    <td><?php echo date('Y-m-d H:i:s',$vo['cbTime'])?></td>
                                    <td><a href="<?php echo U('Comments/do_del_callback?id='.$vo['callbackId']);?>"><span style="color:#555;">删除该条回复</span></a></td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- 商品评论信息 -->
            	<div class="mws-panel grid_8" style="font-size:10px;">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> Data Table with Numbered Pagination</span>
                        <span style="float:right;margin-top:-20px;cursor:pointer;"><i class="icon-hand-right"></i> <a href="<?php echo U('Comments/callback');?>">查看回复信息</a></span></span>

                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable-fn mws-table">
                            <thead>
                                <tr>
                                    <th>商品编号</th>
                                    <th>评价人</th>
                                    <th>商品缩图</th>
                                    <th>商品名称</th>
                                    <th>评价等级</th>
                                    <th>评价内容</th>
                                    <th>买家印象</th>
                                    <th>评价时间</th>
                                    <th>商品得分</th>
                                    <th>卖家服务得分</th>
                                    <th>物流得分</th>
                                    <th><span style="color:#555;"><i class="icon-tools"></i></span>&nbsp;操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($arr)): foreach($arr as $key=>$volist): ?><tr>
                                    <td><?php echo ($volist['productId']); ?></td>
                                    <td><?php echo ($volist['uname']); ?></td>
                                    <td><img src="/jd/Public/Uploads/<?php echo ($volist['simimg']); ?>"></td>
                                    <td width="80px"><?php echo ($volist['prodName']); ?></td>
                                    <td>
                                    <?php
 if($volist['commentsdj'] == 1){ echo "好评"; }else if($volist['commentsdj'] == 2){ echo "中评"; }else if($volist['commentsdj'] == 3){ echo "差评"; } ?>
                                    </td>
                                    <td><?php echo ($volist['content']); ?></td>
                                    <td width="90px">
                                        <?php
 $impression = explode(",", $volist['mjyx']); foreach($impression as $vo){ switch ($vo['mjyx']) { case '0': echo "配置不错<br/>"; break; case '1': echo "电脑还不错<br/>"; break; case '3': echo "屏幕够清晰<br/>"; break; case '4': echo "运行流畅<br/>"; break; case '5': echo "速度快<br/>"; break; case '6': echo "外观漂亮<br/>"; break; case '7': echo "散热好<br/>"; break; default: echo "东西很好"; break; } } ?>
                                    </td>
                                    <td><?php echo date('Y-m-d H:i:s',$volist['commentsTime'])?></td>
                                    <td>
                                        <span style="color:#f90;">
                                           <?php
 for($i = 0; $i<$volist['Gcode'];$i++){ echo "★"; } ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span style="color:#f90;">
                                           <?php
 for($i = 0; $i<$volist['Scode'];$i++){ echo "★"; } ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span style="color:#f90;">
                                           <?php
 for($i = 0; $i<$volist['Tcode'];$i++){ echo "★"; } ?>
                                        </span>
                                    </td>
                                <style type="text/css">
                                    #caozuo span{
                                        color:#555;
                                        font-size:20px;
                                        border:1px solid #ccc;
                                        width:30px;
                                        display:block;
                                        text-align:center;
                                        background-color:#fff;
                                        height:20px;
                                        float: left;
                                        margin-left: 5px;
                                        border-radius: 5px;
                                    }
                                </style>
                                    <td id="caozuo"><a href="<?php echo U('Comments/do_del_comments?id='.$volist['commentsId']);?>"><span ><i class="icon-trash"></i></span></a></span> <a href="<?php echo U('Comments/comments?id='.$volist['cId']);?>"><span><i class="icon-comment"></i></span></a></span></a></td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
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
    <script src="/jd/Application/Admin/Common/Template/js/libs/jquery-1.8.3.min.js"></script>
  
    <!-- Plugin Scripts -->
    <script src="/jd/Application/Admin/Common/Template/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- Core Script -->

    <script src="/jd/Application/Admin/Common/Template/bootstrap/js/bootstrap.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//js/core/mws.js"></script>


    <!-- Themer Script (Remove if not needed) -->
   <!-- <script src="/jd/Application/Admin/Common/Js/core/themer.js"></script>-->

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/jd/Application/Admin/Common/Template/js/demo/demo.table.js"></script>
    <!-- myself -->
    <script src="/jd/Application/Admin/Common/Js/user.js"></script>

</body>
</html>