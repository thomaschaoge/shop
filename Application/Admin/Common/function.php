<?php
namespace Home\Common;
function checkpower($powerId=0){
	if($_SESSION['admin']['power']==1){
		return 0;
	}
	if(in_array($powerId,$_SESSION['admin']['power'])){
		return 0;
	}
}