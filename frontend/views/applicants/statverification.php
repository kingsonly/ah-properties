<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


?>
<style>
	.help-block{
	color: red !important;
}
	.list-group-item a{
		text-transform: uppercase;
	}
</style>
<div class="container-fluid" style="margin-top:20px">
			<div class="container">
				<div class="row  ">
<!--
					<div class="col-md-3 header-text-color">
						<div class="side-menu-container">
						<ul class="list-group list-group-flush" id="sidemenu">
							<li class="list-group-item active" id="bioactive" >
								<a class="nav-link header-text-color" href="#">applicant type</a>
							</li>
							
							
							</ul>
						</div>
						 
					</div>
-->
					<div id="renderapplicationform" class="col-md-12">
						
					</div>
				</div>
				
			</div>
		  
		</div> 



<?
	$stage1 = Url::to(['applicants/stage1']);
	$createUrl = Url::to(['applicants/biodata']);
	$individual = Url::to(['applicants/biodataverification','id' => $model->id]);
	$organization = Url::to(['applicants/orgbiodataverification','id' => $model->id]);
	$viewUrl = Url::to(['customer/view']);
	$applicantType = $model->applicant_type;
	$createCustomerFormJs = <<<JS
	type = '$applicantType';
	if(type == 1){
		$(document).find('#renderapplicationform').load('$individual');
	}else{
		$(document).find('#renderapplicationform').load('$organization');
	}
	

$('#form-customer').on('beforeSubmit', function (e) {
	var \$form = $(this);
	
		if(Offline.state == 'up'){
			var data = \$form.serialize() + "&status=1";
		}else{
			var data = \$form.serialize() + "&status=0";
		}
		$.post('$createUrl',data)
		.always(function(result){
	
   			if(result.status == 1){
	   			alert('You new Customer was successfully created')
				$(document).find('#backcontainer').html('<button id="back" class="btn btn-success btndesign"><icon class="fa fa-arrow-circle-left"></icon>BACK</button>')
				$(document).find('.btndesign').on('click',function(){
		
			window.history.back();
			})
			$(document).find('#view').attr('href','$viewUrl'+'?id='+result.data.id).show();
    		}else{
				alert('something went wrong')
				$(document).find('#backcontainer').html('<button id="back" class="btn btn-success btndesign"><icon></icon>BACK</button>')
				$(document).find('.btndesign').on('click',function(){
		
		window.history.back();
	})
    		}
    	}).fail(function(){
    		alert('something went wrong')
			$(document).find('#backcontainer').html('<button id="back" class="btn btn-success btndesign"><icon></icon>BACK</button>')
			$(document).find('.btndesign').on('click',function(){
		
		window.history.back();
	})
    	});
		return false;
	})


JS;
 
$this->registerJs($createCustomerFormJs);
?>
