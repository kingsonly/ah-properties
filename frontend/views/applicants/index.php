<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


?>
<style>
	.help-block{
	color: red !important;
}
</style>
<div class="container-fluid">
			<div class="container">
				<div class="row  ">
					<div class="col-md-3 header-text-color">
						<div class="side-menu-container">
						<ul class="list-group list-group-flush">
							<li class="list-group-item active" id="bioactive" >
								<a class="nav-link header-text-color" href="#">BIO DATA</a>
							</li>
							<li class="list-group-item" id="contactactive">
								<a class="" href="#">CONTACT DETAILS</a>
							</li>
							<li class="list-group-item" id="nextofkinactive">
								<a class="" href="#">NEXT OF KIN</a>
							</li>
							
							<li class="list-group-item">
								<a class="" href="#">SPACE BOOKING</a>
							</li>
							
							<li class="list-group-item" id="documentactive">
								<a class="" href="#">DOCUMENT UPLOAD</a>
							</li>
							
							<li class="list-group-item" id="paymentactive">
								<a class="" href="#">Payment</a>
							</li>
							
							<li class="list-group-item" id="agentactive">
								<a class="" href="#">Agent</a>
							</li>
							
							<li class="list-group-item" id="declearationactive">
								<a class="" href="#">DECLARATION</a>
							</li>
							
							</ul>
						</div>
						 
					</div>
					<div id="renderapplicationform" class="col-md-9">
						
					</div>
				</div>
				
			</div>
		  
		</div> 



<?
	$biodata = Url::to(['applicants/biodata']);
	$createUrl = Url::to(['applicants/biodata']);
	$viewUrl = Url::to(['customer/view']);
	$createCustomerFormJs = <<<JS
	
	$(document).find('#renderapplicationform').load('$biodata');

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
