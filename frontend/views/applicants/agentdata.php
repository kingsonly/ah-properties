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
	
</style>
<? if($rootModel->applicant_type == 1){ ?>
<div class="container">
<!--							form content goes here-->
							 <div class="row">
									<div class="col-md-9">
										
										
										<div class="row">
											<div class="col-md-12">
												<h6 class="header-text-color">Name</h6>
												<h5><?= $modelBio->last_name.' '.$modelBio->first_name.' '.$modelBio->middle_name;?> </h5>
											
											</div>
										
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<h6 class="header-text-color">Occupation</h6>
												<h5><?= $modelBio->occupation;?></h5>
											
											</div>
										
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												
												<?= Html::img('@web/'.$modelBio->image, ['alt' => 'My logo','class'=>'imgtins']) ?>
											
											</div>
										
										</div>
										
									</div>
								</div>
							
							
						</div> 
<? }?>

<? if($rootModel->applicant_type == 2){?>
<div class="container">
<!--							form content goes here-->
							 <div class="row">
									<div class="col-md-12 ">
												
												
												
												
													<div class="row ">
														<div class="col-md-12 form-area" style="margin-top:20px">
															<div class="box-label">Organization Name </div>
															<div class="row">
																<div class="col-md-12 " >
																	
																	<h5><?= $modelBio->organization_name?></h5>
																</div>
																
																
																
																
																
														    </div>
															
															
														</div>
														
													</div>
													
													

												 
											</div>
								</div>
							
							
						</div> 
<? }?>

						
						<div class="container content-form-area">
<!--							form content goes here-->
							<?php $form = ActiveForm::begin(['id' => 'agentDetails']); ?>
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area">
												
												<div class="box-label">Agent </div>
												
												
												<div class="row">
														<div class="col-md-6">
															
																<?= $form->field($model, 'applicant_id')->hiddenInput(['value' => $rootModel->id])->label(false); ?>
																
																<?= $form->field($model, 'agent_title')->dropDownList(ArrayHelper::map($titles, 'id', 'name'),['class'=>'custom-select']) ?>
														    
														</div>
														<div class="col-md-6">
															
															<?= $form->field($model, 'agent_gender')->dropDownList(ArrayHelper::map($gender, 'id', 'name'),['class'=>'custom-select']) ?>
														</div>
													
										
														
														
													</div>
												
													<div class="row">
														<div class="col-md-6">
															<?= $form->field($model, 'agent_first_name')->textInput(['id' => 'agent_first_name']); ?>

																 
														   
														</div>
														<div class="col-md-6">
															
																<?= $form->field($model, 'agent_last_name')->textInput(['id' => 'agent_last_name']); ?>
														    

														</div>
														
														
													</div>
												
												
												<div class="row">
														<div class="col-md-6">
															
																<?= $form->field($model, 'agent_mobile_number')->textInput(['id' => 'agent_mobile_number']); ?>
														    
														</div>
														<div class="col-md-6">
															<?= $form->field($model, 'email_address')->textInput(['id' => 'email_address']); ?>

														</div>
													
													
														
														
													</div>
													
													
													

												 
											</div>
												
											<div class="col-md-12 ">
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
	$createagentUrl = Url::to(['applicants/processagent']);
	$declerationDetails = Url::to(['applicants/declerationdata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});



	
	
	
	$('#agentDetails').on('beforeSubmit', function (e) {
	toastr.info('Processing Agent Data Please Wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createagentUrl',
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
				$(document).find('#renderapplicationform').load('$declerationDetails'+'&id='+data.data.applicant_id);
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#declaration').addClass('active')
				toastr.success('Agent  Saved')
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
