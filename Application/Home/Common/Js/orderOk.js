$(function(){

	//快捷支付
	$("#Q-bank").click(function() {

		$("#Q-bank > li").addClass('select');
		$(this).find(":radio").attr("checked","checked");
		$("#E-bank > li").removeClass('select');

	});


	//在线支付
	$("#E-bank").click(function() {

		$("#E-bank > li").addClass('select');
		$(this).find(":radio").attr("checked","checked");
		$("#Q-bank > li").removeClass('select');
		
	});


	//点击下一步
	$(".btn-next").click(function(){
         
		// var oid=$(this).attr("oid");
		// window.location.href ='orderpay/oid/oid';
		//$("#deleteBackground").removeClass("hide");
		//$(".thickbox").removeClass("hide");
		
	});
})