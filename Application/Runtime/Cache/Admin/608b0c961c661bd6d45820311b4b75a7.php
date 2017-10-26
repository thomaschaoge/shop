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
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jd/Application/Admin/Common/Template//css/themer.css" media="screen">
    
    <link rel="stylesheet" href="/jd/Public/umeditor/themes/default/css/umeditor.min.css">

<title>MWS Admin - Dashboard</title>

</head>

<body>
    <!-- Themer End -->

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
            
            	<!-- Statistics Button Container -->
            	
                
                <!-- Panels Start -->
                

                <div class="mws-panel grid_6">
                    <div class="mws-panel-header">
                        <span>修改商品信息</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="<?php echo U('Goods/edit_doit');?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="prodId" value="<?php echo ($gid); ?>">
                            <input type="hidden" name="oriimg" value="<?php echo ($img); ?>">
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">商品分类</label>
                                    <div class="mws-form-item">
                                        <select class="small" name="proTypeId">
                                           <?php echo ($cateOptions); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">商品名称</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large require" name="prodName" value="<?php echo ($data[ 'prodName']); ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">商品原价</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large require" name="price1" value="<?php echo ($data['price1']); ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">商品现价</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large require" name="price2" value="<?php echo ($data['price2']); ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">商品库存</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large" name="amount" value="<?php echo ($data['amount']); ?>">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">商品描述</label>
                                    <div class="mws-form-item">
                                        <textarea rows="" cols="" class="large require" name="prodInfo" id="myEditor"><?php echo ($data['prodInfo']); ?></textarea>
                                    </div>
                                </div>

                                <div class="mws-form-row bordered">
                                        <label class="mws-form-label">原图</label>
                                        <img src="/jd/Public/Uploads/<?php echo ($img); ?>" width="100px" />
                                        <div class="mws-form-item">
                                            <input type="file" name="img" class="required">
                                            <label for="picture" class="error" generated="true" style="display:none"></label>
                                        </div>
                                </div>
                                
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">颜色分类</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <?php echo ($colorRadio); ?>
                                            <!-- <li><input type="radio" name="colorId"> <label>黑色</label></li>
                                            <li><input type="radio" name="colorId"> <label>白色</label></li>
                                            <li><input type="radio" name="colorId"> <label>银色</label></li>
                                            <li><input type="radio" name="colorId"> <label>红色</label></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">适合性别</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                        <?php echo ($sexRadio); ?>
                                            <!-- <li><input type="radio" name="gendarId" value="0"> <label>男</label></li>
                                            <li><input type="radio" name="gendarId" value="1"> <label>女</label></li>
                                            <li><input type="radio" name="gendarId" value="2"> <label>中性</label></li> -->
                                        </ul>
                                    </div>
                                </div>
                                 <div class="mws-form-row bordered">
                                    <label class="mws-form-label">尺寸</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                        <?php echo ($sizeRadio); ?>
                                            <!-- <li><input type="radio" name="sizeId" value="0"> <label>S</label></li>
                                            <li><input type="radio" name="sizeId" value="1"> <label>M</label></li>
                                            <li><input type="radio" name="sizeId" value="2"> <label>L</label></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">品牌</label>
                                    <div class="mws-form-item">
                                        <?php echo ($brandsOption); ?>
                                    </div>
                                </div>

                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="提交" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
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
        <script type="text/javascript" src="/jd/Public/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="/jd/Public/umeditor/umeditor.config.js"></script>
        <script type="text/javascript">
            window.UMEDITOR_HOME_URL = "/jd/Public/umeditor/";
            window.onload=function(){
            window.UMEDITOR_CONFIG.initialFrameWidth=582; 
            window.UMEDITOR_CONFIG.initialFrameHeight=280;
            window.UMEDITOR_CONFIG.toolbar = [
                'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
                'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
                '| justifyleft justifycenter justifyright justifyjustify |',
                'link unlink | emotion image video  | horizontal preview', 'drafts'
            ]
            UM.getEditor('myEditor');
        }        
        </script>
    <script src="/jd/Application/Admin/Common/Template//js/libs/jquery.mousewheel.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//js/libs/jquery.placeholder.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/jd/Application/Admin/Common/Template//jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//jui/jquery-ui.custom.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/jd/Application/Admin/Common/Template//plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/jd/Application/Admin/Common/Template//js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/jd/Application/Admin/Common/Template//plugins/flot/jquery.flot.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//plugins/validate/jquery.validate-min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/jd/Application/Admin/Common/Template//bootstrap/js/bootstrap.min.js"></script>
    <script src="/jd/Application/Admin/Common/Template//js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/jd/Application/Admin/Common/Template//js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->

</body>
</html>