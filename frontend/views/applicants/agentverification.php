<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\VerificationModel;
$verificationModel = new VerificationModel();
?>
<div class="container content-form-area">
<!--							form content goes here-->
							
							
						
								<div class="col-md-12 form-area" style="margin-top:20px">
												
												<div class="box-label">AGENT </div>
												
												
												<div class="row">
														<div class="col-md-4">
															<h6 class="header-text-color">Title</h6>
																	<h5><?= $model->agent_title; ?></h5>
														</div>
													<div class="col-md-4">
															<h6 class="header-text-color">First Name</h6>
																	<h5><?= $model->agent_first_name; ?></h5>
														</div>
													<div class="col-md-4">
															<h6 class="header-text-color">Last Name</h6>
																	<h5><?= $model->agent_last_name; ?></h5>
														</div>
										
													</div>
											
											<div class="row">
														
													<div class="col-md-4">
															<h6 class="header-text-color">Email Address</h6>
																	<h5><?= $model->email_address; ?></h5>
														</div>
													<div class="col-md-4">
															<h6 class="header-text-color">Mobile Number</h6>
																	<h5><?= $model->agent_mobile_number; ?></h5>
														</div>
												
												<div class="col-md-4">
														
														</div>
										
													</div>
											 
											</div>
												
											<?php $form = ActiveForm::begin(['id' => 'bioveri']); ?>
											<div class="row ">
														
														<div class="col-md-1">
													<?= $form->field($verificationModel, "user_validate")->checkbox(['value' => '1', 'uncheckValue'=>'0', 'class' => '','id' => 'customCheck'])->label(false); ?>
																	
												</div>
												<div class="col-md-9">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
													<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												<div class="col-md-2"></div>
												
													</div>
										<?php ActiveForm::end(); ?>
										
								</div>

<?
	$verifyagentData = Url::to(['applicants/proccessagentveri','id' => $model->applicant_id]);
	$loaddeclerationdata = Url::to(['applicants/declerationverification']);
	
	$createCustomerFormJs = <<<JS
	
		
	$('#bioveri').on('beforeSubmit', function (e) {
	toastr.info('Proccessing Contact details please wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$verifyagentData',
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
				$(document).find('#renderapplicationform').load('$loaddeclerationdata'+'&id='+newData.applicant_id);
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#nextofkin').addClass('active')
				toastr.success('Contact Saved')
			}else{
				alert('Please confirm your data to make sure values are correct')
			}
			
			
        },

		complete: function() {
            // success alerts
        },

        error: function (data) {
        	
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
 
$this->registerJs($createCustomerFormJs);
?>

							