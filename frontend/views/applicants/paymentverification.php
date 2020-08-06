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
									
											<div class="col-md-12 form-area" style="margin-top:20px">
												
												<div class="box-label">Payment for file <?= $model[0]->filenumber->file_number?> </div>
												
												
            
												<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-12 " >
																	<?= Html::img('@web/'.$model[0]->image, ['alt' => 'My logo','class'=>'medium_image']) ?>
												
																	<h6 class="header-text-color">
																		Payment For : <?= $model[0]->payment_for?>
																	</h6>
																	
																	<h6 class="header-text-color">
																		Amount : <?= $model[0]->amount?>
																	</h6>
																	
																</div>
																
															
																
														    </div>
															
														</div>
													
														
													</div>
													
													
													

												 
											</div>
									
									
										
										
								</div>
												
											<?php $form = ActiveForm::begin(['id' => 'bioveri']); ?>
											<div class="row mar-t-10">
														
														<div class="col-md-1">
													<?= $form->field($verificationModel, "user_validate")->checkbox(['value' => '1', 'uncheckValue'=>'0', 'class' => '','id' => 'customCheck'])->label(false); ?>
																	
												</div>
												<div class="col-md-11">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
													<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												
												
													</div>
										<?php ActiveForm::end(); ?>
										
								</div>

<?
	$verifypaymentData = Url::to(['applicants/proccesspaymentveri','id' => $model[0]->applicant_id]);
	
	$loadpaymentveri = Url::to(['applicants/paymentverification']);
	
	$loadagentveri = Url::to(['applicants/agentverification']);
	$createCustomerFormJs = <<<JS
	
		
	$('#bioveri').on('beforeSubmit', function (e) {
	toastr.info('Processing')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$verifypaymentData',
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
			
				if(data.counts == 0){
				// load agent
				$(document).find('#renderapplicationform').load('$loadagentveri'+'&id='+newData[0].applicant_id);
				}else{
					$(document).find('#renderapplicationform').load('$loadpaymentveri'+'&id='+newData[0].applicant_id);
				
				
				}
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#nextofkin').addClass('active')
				toastr.success('Saved')
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

							