<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$titles =[
	[
	'id' =>'Mr',
	'name' =>'Mr',
	],
	[
	'id' =>'Mrs',
	'name' =>'Mrs',
	],
	[
	'id' =>'Miss',
	'name' =>'Miss',
	]
];

$gender =[
	[
	'id' =>'Male',
	'name' =>'Male',
	],
	[
	'id' =>'Female',
	'name' =>'Female',
	]
];
?>
<style>
	.hidden{
		display: none;
	}
	.confirmbox{
		text-align: center;
		height: 150px;
		
		padding: 20px 0;
		margin-bottom: 5px;
	}
</style>
				<div>
						
						<div class="container content-form-area">
<!--							form content goes here-->
							<?php $form = ActiveForm::begin(['id' => 'stage1_form']); ?>
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area">
												
												<div class="box-label">Applicant Selection </div>
												
												
												<div class="row" id="applicantselection">
														<div class="col-md-6">
															
																<?= Html::button('Individual', ['class' => 'btn btn-primary btn-lg  button-design','id' =>'individual']) ?>
														   
														</div>
														<div class="col-md-6">
															<?= Html::button('Organization', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'organization']) ?>
															<?//= $form->field($model, 'agent_gender')->dropDownList(ArrayHelper::map($gender, 'id', 'name'),['class'=>'custom-select']) ?>
														</div>
													
													<?= $form->field($rootModel, 'applicanttype')->hiddenInput(['id' => 'applicanttype'])->label(false); ?> 
														
														
													</div>
												
													<div class="hidden" id="ordertype">
														<div class="col-md-6">
															
																<?= Html::button('single', ['class' => 'btn btn-primary btn-lg  button-design','id' =>'single']) ?>
																<?//= $form->field($model, 'email_address')->textInput(['id' => 'email_address']); ?> 
														    
														</div>
														<div class="col-md-6">
															
																<?= Html::button('bulk', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'bulk']) ?>
																
														   

														</div>
														
														
													</div>
												
												
												<div class="hidden" id="quantity">
													
														
														<div class="col-md-12">
															<?= $form->field($rootModel, 'numberofproperties')->textInput(['id' => 'numberofproperties']); ?>
														</div>
														<div class="col-md-12">
															<?= Html::button('Proceed', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'proceed']) ?>

														</div>
														
														
													
													
														
														
													</div>
												
											
													
													
													<div class="hidden" id="confirm" style="margin-top:10px;text-align:center">
								
								<div class="col-md-12 confirmbox" style="text-align:center">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class=" checkcss bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
									  <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
									</svg>
									<h1> Please Proceed</h1>
								</div>
								
								
							
							</div>
														
														
														
													
													
														
														
													</div>
													
													
													

												 
											</div>
												
											<div class="hidden" id="savebuttoncontainer">
											<div class="row button-row">
														
														<div class="col-md-5">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
												</div>
												<div class="col-md-5">
													<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												<div class="col-md-2"></div>
													</div>
										
										</div>
								</div>
							<?php ActiveForm::end(); ?>
						</div>
							
<?
	$createStage1Url = Url::to(['applicants/processstage1']);
	$organizationBios = Url::to(['applicants/organizationbio']);
	$individualBios = Url::to(['applicants/biodata']);
	$biodataform = <<<JS
	
	$(document).find('#test').on('click',function(){
		type = $(document).find('#applicanttype').val()
		number = $(document).find('#numberofproperties').val();
		//alert(type)
		//alert(number)
	})
	$(document).find('#individual').on('click',function(){
		$(document).find('#applicanttype').val(1);
		$(document).find('#applicantselection').hide();
		$(document).find('#ordertype').removeClass('hidden');
		$(document).find('#ordertype').addClass('row');
	})
	
	$(document).find('#organization').on('click',function(){
		$(document).find('#applicanttype').val(2);
		$(document).find('#applicantselection').hide();
		$(document).find('#ordertype').removeClass('hidden');
		$(document).find('#ordertype').addClass('row');
		
	})
	
	$(document).find('#single').on('click',function(){
	
		$(document).find('#numberofproperties').val(1);
		$(document).find('#ordertype').removeClass('row');
		$(document).find('#ordertype').addClass('hidden');
		
		// show success page
		$(document).find('#confirm').removeClass('hidden');
		$(document).find('#confirm').addClass('row');
		
		$(document).find('#savebuttoncontainer').removeClass('hidden');
		$(document).find('#savebuttoncontainer').addClass('col-md-12');
		
	})
	
	$(document).find('#bulk').on('click',function(){
	
		$(document).find('#ordertype').removeClass('row');
		$(document).find('#ordertype').addClass('hidden');
		$(document).find('#quantity').removeClass('hidden');
		$(document).find('#quantity').addClass('row');
		
	})
	
	
	$(document).find('#proceed').on('click',function(){
	
		$(document).find('#quantity').removeClass('row');
		$(document).find('#quantity').addClass('hidden');
		// show success page
		$(document).find('#confirm').removeClass('hidden');
		$(document).find('#confirm').addClass('row');
		
		$(document).find('#savebuttoncontainer').removeClass('hidden');
		$(document).find('#savebuttoncontainer').addClass('col-md-12');
		
	})
	
	
	individual = {
	'applicanttype':'applicant type',
	'biodata':'bio data',
	'contactdetails':'contact details',
	'nextofkin':'next of kin',
	'identification':'identification',
	'payment':'payment',
	'agent':'agent',
	'decearation':'decearation',
	}
	
	organization = {
	'applicanttype':'applicant type',
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
	'decearation':'decearation',
	}
	
	$('#stage1_form').on('beforeSubmit', function (e) {
	toastr.info('Proccessing  Data Please Wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createStage1Url',
        type: 'POST',
        data: formData,
        datatype:'json',
        // async: false,
        beforeSend: function() {
            // do some loading options
        },
        success: function (data) {
        	newData = data.data
			if(data.status == 1){
				
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#declearationactive').addClass('active');
				toastr.success('Agent  Saved')
				// applicanttype 1 means its an individual form
				if(data.data.applicanttype == 1){
					$(document).find('#renderapplicationform').load('$individualBios'+'&id='+data.data.applicantId);
					$(document).find('#sidemenu').html(' ')
					$.each(individual,function(key,value){
						
						$(document).find('#sidemenu').append('<li class="list-group-item" id="'+key+'"><a  href="#">'+value+'</a></li>'
						); 
					})
					
					$(document).find('#biodata').addClass('active')
					
				}
				
				// applicanttype 1 means its an organization form
				if(data.data.applicanttype == 2){
					$(document).find('#renderapplicationform').load('$organizationBios'+'&id='+data.data.applicantId);
					$(document).find('#sidemenu').html(' ')
					$.each(organization,function(key,value){
						
						$(document).find('#sidemenu').append('<li class="list-group-item" id="'+key+'"><a  href="#">'+value+'</a></li>'
						); 
					})
					
					$(document).find('#organizationdetails').addClass('active')
				}
			}else{
				alert('Please confirm your data to make sure values are correct')
			}
			
			
        },

		complete: function() {
            // success alerts
        },

        error: function (data) {
        	alert('something went wrong') 
			$(document).find('#backcontainer').html('<button id="back" class="btn btn-success btndesign"><icon class="fa fa-arrow-circle-left"></icon>BACK</button>')
				$(document).find('.btndesign').on('click',function(){
		
			window.history.back();
			})
        },
        cache: false,
        contentType: false,
        processData: false
    });
		\$form.clear;
		return false;
	})

JS;
 
$this->registerJs($biodataform);
?>
