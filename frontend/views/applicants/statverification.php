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
							<div class="row">
							<div class="col-md-12 form-area" >

								<div class="box-label">Loading </div>


									<div class="row">
										<div class="col-md-12" style="padding-top: 60px;padding-bottom: 60px;text-align: center;">
											<h1>Loading Please Wait</h1>
										</div>
				
													

									</div>

							</div>
						</div>
					</div>
				</div>
				
			</div>
		  
		</div> 



<?
	$stage1 = Url::to(['applicants/stage1']);
	$createUrl = Url::to(['applicants/biodata']);
	$individual = Url::to(['applicants/biodataverification','id' => $model->id]);
	$organization = Url::to(['applicants/orgbiodataverification','id' => $model->id]);

// verification fallback steps for organization
	$stepAddressOrganization = Url::to(['applicants/orgaddressverification','id' => $model->id]);
	$stepOrgContactPersonVerification = Url::to(['applicants/orgcontactpersonverification','id' => $model->id]);

	$stepOrgContactDataVerification = Url::to(['applicants/contactdataverification','id' => $model->id]);
	$stepNextofkinDataVerification = Url::to(['applicants/nextofkindataverification','id' => $model->id]);
	
	
// general verification steps 

	$stepIdentificationDataVerification = Url::to(['applicants/identificationdataverification','id' => $model->id]);
	$stepPaymentVerification = Url::to(['applicants/paymentverification','id' => $model->id]);
	$stepAgentVerification = Url::to(['applicants/agentverification','id' => $model->id]);
	$stepDeclerationVerification = Url::to(['applicants/declerationverification','id' => $model->id]);
	$stepConfirmVerification = Url::to(['applicants/confirmverification','id' => $model->id]);

	$viewUrl = Url::to(['customer/view']);
	$applicantType = $model->applicant_type;
	$verificationStatus = $model->verification_status;
	$createCustomerFormJs = <<<JS
	type = '$applicantType';
	if(type == 1){
		if($verificationStatus == 0){
			$(document).find('#renderapplicationform').load('$individual');
		}else{
			if('$verificationStatus' == 1){
			
				$(document).find('#renderapplicationform').load('$stepOrgContactDataVerification');
				
			}
			
			if('$verificationStatus' == 2){
			
				$(document).find('#renderapplicationform').load('$stepNextofkinDataVerification');
			
			}
			
			if('$verificationStatus' == 3){
				
				$(document).find('#renderapplicationform').load('$stepIdentificationDataVerification');
			}
			
			if('$verificationStatus' == 4){
				
				$(document).find('#renderapplicationform').load('$stepPaymentVerification');
			}
			
			if('$verificationStatus' == 5){
				
				$(document).find('#renderapplicationform').load('$stepAgentVerification ');
			}
			
			if('$verificationStatus' == 6){
				
				$(document).find('#renderapplicationform').load('$stepDeclerationVerification');
			}
			
			if('$verificationStatus' == 7){
				
				$(document).find('#renderapplicationform').load('$stepConfirmVerification');
			
			}
			
		}
		
	}else{
		if($verificationStatus == 0){
			$(document).find('#renderapplicationform').load('$organization');
		}else{
			if('$verificationStatus' == 1){
			
				$(document).find('#renderapplicationform').load('$stepAddressOrganization');
				
			}
			
			if('$verificationStatus' == 2){
			
				$(document).find('#renderapplicationform').load('$stepOrgContactPersonVerification');
			
			}
			
			if('$verificationStatus' == 3){
				
				$(document).find('#renderapplicationform').load('$stepIdentificationDataVerification');
			}
			
			if('$verificationStatus' == 4){
				
				$(document).find('#renderapplicationform').load('$stepPaymentVerification');
			}
			
			if('$verificationStatus' == 5){
				
				$(document).find('#renderapplicationform').load('$stepAgentVerification ');
			}
			
			if('$verificationStatus' == 6){
				
				$(document).find('#renderapplicationform').load('$stepDeclerationVerification');
			}
			
			if('$verificationStatus' == 7){
				
				$(document).find('#renderapplicationform').load('$stepConfirmVerification');
			
			}
		}
		
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
