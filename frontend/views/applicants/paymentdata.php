<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
use kartikorm\ActiveForm as activeform2;
use kartik\date\DatePicker;
$titles =[
	[
	'id' =>'Mrs',
	'name' =>'Mrs',
	]
];
?>
<style>
	
</style>


<? if($rootModel->applicant_type == 1){?>
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
							<?php $form = ActiveForm::begin(['id' => 'paymentDetails']); ?>
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area">
												
												<div class="box-label">Payment FOR FILE  <?= $fileNumberModel[$paymentCount]->file_number?> </div>
												
												<?= $form->field($model, 'applicant_id')->hiddenInput(['value' => $rootModel->id])->label(false); ?>
																
																<?= $form->field($model, 'file_number_id')->hiddenInput(['value' => $fileNumberModel[$paymentCount]->id])->label(false); ?>
												<div class="row">
														<div class="col-md-4">
																
																<?= $form->field($model, 'payment_mode')->textInput(['id' => 'payment_mode']);?>
														    
														</div>
														<div class="col-md-4">
															<div class="custom-file">
															<?= $form->field($model, 'imageFile',['template' => "{label}\n<div class='col-md-6'>{input}</div>\n{hint}\n{error}",
                    'labelOptions' => [ 'class' => 'custom-file-label' ]])->fileInput(['class'=>'customFile'])?>
															</div> 
														</div>
													
													<div class="col-md-4">
															<?= $form->field($model, 'bank_branch')->textInput(['id' => 'bank_branch']); ?>

														</div>
														
														
													</div>
												
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																
																<? echo $form->field($model, 'payment_date')->widget(DatePicker::classname(), [
																	'options' => ['placeholder' => 'Enter Date of Payment'],
																	'pluginOptions' => [
																		'autoclose'=>true,
																		'format' => 'yyyy-mm-dd'
																	]
																]);?>
														    </div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<?= $form->field($model, 'teller_number')->textInput(['id' => 'teller_number']); ?>
														    </div>

														</div>
														
														
													</div>
												
												
												<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<?= $form->field($model, 'amount_word')->hiddenInput(['value' =>'ten thousand naira only'])->label(false); ?>
														    </div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<?= $form->field($model, 'amount')->hiddenInput(['value' => 10000])->label(false); ?> 
														    </div>

														</div>
														
														
													</div>
													
													
													

												 
											</div>
												
											<div class="col-md-12 ">
											<div class="row button-row">
														
														<div class="col-md-5">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design', 'id' =>'actionbutton']) ?>
													<?= Html::button('Wait Loading ..........', ['class' => 'btn btn-warning btn-lg  button-design','id' =>'loaders']) ?>
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
	$createpaymenttUrl = Url::to(['applicants/processpayment']);
	$loadPaymentForm = Url::to(['applicants/paymentdata']);
	$agentDetails = Url::to(['applicants/agentdata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});



	
	
	
	$('#paymentDetails').on('beforeSubmit', function (e) {
	toastr.info('Proccessing Payment Data Please Wait')
	$(document).find('#actionbutton').hide()
	$(document).find('#loaders').show()
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createpaymenttUrl',
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
				if(data.stage_status == 0){
						$(document).find('#renderapplicationform').load('$agentDetails'+'&id='+data.data.applicant_id);
						$(document).find('.list-group-item').removeClass('active');
						$(document).find('#agent').addClass('active')
				
					
				}else{
					$(document).find('#renderapplicationform').load('$loadPaymentForm'+'&id='+data.data.applicant_id);
				}
				
				toastr.success('Payment  Saved')
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
