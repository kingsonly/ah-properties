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
	.contentholder{
		margin-top: 30px;
		margin-bottom: 10px;
	}
</style>
<? if (\Yii::$app->user->can('enterData')) { ?>
<div class="container-fluid contentholder">
			<div class="container">
				<div class="row  ">
					<div class="col-md-3 header-text-color">
						<div class="side-menu-container">
						<ul class="list-group list-group-flush" id="sidemenu">
							<li class="list-group-item active" id="bioactive" >
								<a class="nav-link header-text-color" href="#">application type</a>
							</li>
							
							
							</ul>
						</div>
						 
					</div>
					<div id="renderapplicationform" class="col-md-9">
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
	$viewUrl = Url::to(['customer/view']);
// used for loading when last stoped
	$individualBios = Url::to(['applicants/biodata','id' =>$id]);
	$contactDetails = Url::to(['applicants/contactdata','id' =>$id]);
	$nextofkinDetails = Url::to(['applicants/nextofkindata','id' =>$id]);
	$uploaddocumentDetails = Url::to(['applicants/uploaddocumentdata','id' =>$id]);
	$paymentDetails = Url::to(['applicants/paymentdata','id' =>$id]);
	$agentDetails = Url::to(['applicants/agentdata','id' =>$id]);
	$declerationDetails = Url::to(['applicants/declerationdata','id' =>$id]);
	$preview = Url::to(['applicants/preview','id' =>$id]);
	
// organijation preload 
	
	$organizatioBio = Url::to(['applicants/organizationbio','id' =>$id]);
	$organizationcontactdetailsdataDetails = Url::to(['applicants/organizationcontactdetailsdata','id' =>$id]);
	$organizationcontactPersonDetailsdata = Url::to(['applicants/organizationcontactpersonbios','id' =>$id]);
	$organizationuploaddocument = Url::to(['applicants/organizationuploaddocument','id' =>$id]);
	$organizationdocumentformcac = Url::to(['applicants/organizationdocumentformcac','id' =>$id]);
	$organizationdocumentformc02 = Url::to(['applicants/organizationdocumentformc02','id' =>$id]);
	$organizationdocumentformc07 = Url::to(['applicants/organizationdocumentformc07','id' =>$id]);
	$organizationdocumentformmemorandum = Url::to(['applicants/organizationdocumentformmemorandum','id' =>$id]);
	
	$applicantType;
	if($stage != 0){
		$applicantType = $model->applicant_type;
	}else{
		$applicantType = 0;
	}
	$createCustomerFormJs = <<<JS
	
	if('$stage' == 0){
		$(document).find('#renderapplicationform').load('$stage1');
	}else{
		$(document).find('#sidemenu').html(' ')
		individual = {
			'applicanttype':'application type',
			'biodata':'bio data',
			'contactdetails':'contact details',
			'nextofkin':'next of kin',
			'identification':'identification',
			'payment':'payment',
			'agent':'agent',
			'declaration':'declaration',
			}

			
		$.each(individual,function(key,value){
						
						$(document).find('#sidemenu').append('<li class="list-group-item" id="'+key+'"><a  href="#">'+value+'</a></li>'
						); 
					})
		if('$applicantType' == 1){
			if('$stage' == 1){
			$(document).find('#biodata').addClass('active')
			
			$(document).find('#renderapplicationform').load('$individualBios');
				
			}
			
			if('$stage' == 2){
			$(document).find('#contactdetails').addClass('active')
			
			$(document).find('#renderapplicationform').load('$contactDetails');
			
			}
			
			if('$stage' == 3){
				$(document).find('#nextofkin').addClass('active')
				$(document).find('#renderapplicationform').load('$nextofkinDetails');
			}
			
			if('$stage' == 4){
				$(document).find('#identification').addClass('active')
				$(document).find('#renderapplicationform').load('$uploaddocumentDetails');
			}
			
			if('$stage' == 5){
				$(document).find('#payment').addClass('active')
				$(document).find('#renderapplicationform').load('$paymentDetails');
			}
			
			if('$stage' == 6){
				$(document).find('#agent').addClass('active')
				$(document).find('#renderapplicationform').load('$agentDetails');
			}
			
			if('$stage' == 7){
				$(document).find('#declaration').addClass('active')
				$(document).find('#renderapplicationform').load('$declerationDetails');
			
			}
			
			if('$stage' == 8){
				window.location.replace("$preview");
			}
			
			
		}else{
		$(document).find('#sidemenu').html(' ')
		organization = {
			'applicanttype':'application type',
			'organizationdetails':'organization details',
			'organizationaddress':'organization address',
			'organizationcontact':'organization contact',
			'identification':'identification',
			'caccertificate':'cac certificate',
			'cacc02':'cac c02',
			'cacc07':'cac c07',
			'memorandum':'memorandum',
			'payment':'payment',
			'agent':'agent',
			'declaration':'declaration',
			}
		$.each(organization,function(key,value){
						
						$(document).find('#sidemenu').append('<li class="list-group-item" id="'+key+'"><a  href="#">'+value+'</a></li>'
						); 
					})
					
					if('$stage' == 1){
			$(document).find('#organizationdetails').addClass('active')
			
			$(document).find('#renderapplicationform').load('$organizatioBio');
				
			}
			
			if('$stage' == 2){
			$(document).find('#organizationaddress').addClass('active')
			
			$(document).find('#renderapplicationform').load('$organizationcontactdetailsdataDetails');
			
			}
			
			if('$stage' == 3){
				$(document).find('#organizationcontact').addClass('active')
				$(document).find('#renderapplicationform').load('$organizationcontactPersonDetailsdata');
			}
			
			if('$stage' == 4){
				$(document).find('#identification').addClass('active')
				$(document).find('#renderapplicationform').load('$organizationuploaddocument');
			}
			
			if('$stage' == 5){
				$(document).find('#caccertificate').addClass('active')
				$(document).find('#renderapplicationform').load('$organizationdocumentformcac');
			
			}
			
			if('$stage' == 6){
				$(document).find('#cacc02').addClass('active')
				$(document).find('#renderapplicationform').load('$organizationdocumentformc02');
			
			}
			
			if('$stage' == 7){
				$(document).find('#cacc07').addClass('active')
				$(document).find('#renderapplicationform').load('$organizationdocumentformc07');
			
			}
			
			if('$stage' == 8){
				$(document).find('#memorandum').addClass('active')
				$(document).find('#renderapplicationform').load('$organizationdocumentformmemorandum');
			
			}
			
			if('$stage' == 9){
				$(document).find('#payment').addClass('active')
				$(document).find('#renderapplicationform').load('$paymentDetails');
			}
			
			if('$stage' == 10){
				$(document).find('#agent').addClass('active')
				$(document).find('#renderapplicationform').load('$agentDetails');
			}
			
			
			
			if('$stage' == 11){
				$(document).find('#declaration').addClass('active')
				$(document).find('#renderapplicationform').load('$declerationDetails');
			
			}
			
			if('$stage' == 12){
				window.location.replace("$preview");
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
<? }else{ ?>
								
	<div style="width: 80%;
margin: 0 auto;
text-align: center;
padding-top: 200px;"> Sorry you cant view the content of this page </div>
<? } ?>
