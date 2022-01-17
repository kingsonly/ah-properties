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
							
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 ">
												
												
												
												
													<div class="row ">
														<div class="col-md-12 form-area" style="margin-top:20px">
															<div class="box-label">Decline </div>
															
															
															<?php $form = ActiveForm::begin(['id' => 'declineform']); ?>
															
															<div class="row">
																
																
																<div class="col-md-12 " >
																	<?= $form->field($model, 'comment')->textarea(['rows' => '6']) ?>
																	
																	<?= $form->field($model, 'document_location')->hiddenInput(['value' => $section])->label(false) ?>
																	
																	<?= $form->field($model, 'document_id')->hiddenInput(['value' => (int)$id])->label(false) ?>
																	
																	<?= $form->field($model, 'status')->hiddenInput(['value' => 0])->label(false) ?>
																	
																	<?= $form->field($model, 'applicant_id')->hiddenInput(['value' => $applicant])->label(false) ?>
																														<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
																</div>
																
														    </div>
														</div>
														
														
														
													</div>
													
													

												 
											</div>
											
												
											
								</div>
												
											
											<div class="row mar-t-10" >
														
														
												<div class="col-md-12">

													<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												
												
													</div>
										<?php ActiveForm::end(); ?>
										
								</div>

<?
	$proccessDecline = Url::to(['applicants/proccessdecline']);
	
	$declinjs = <<<JS
	
	$(document).find('#declineform').on('beforeSubmit', function (e) {
	toastr.info('Processing')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$proccessDecline',
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
				alert('went well')
				window.history.back()
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
 
$this->registerJs($declinjs);
?>

	
							