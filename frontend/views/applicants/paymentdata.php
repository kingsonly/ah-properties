<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$titles =[
	[
	'id' =>'Mrs',
	'name' =>'Mrs',
	]
];
?>
<style>
	
</style>
<div class="container">
<!--							form content goes here-->
							 <div class="row">
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-12">
												<h6 class="header-text-color">ID</h6>
												<h5><?= $bioData->applicant_id;?></h5>
											
											</div>
										
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<h6 class="header-text-color">Name</h6>
												<h5><?= $bioData->last_name.' '.$bioData->first_name.' '.$bioData->middle_name;?> </h5>
											
											</div>
										
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<h6 class="header-text-color">Occupation</h6>
												<h5><?= $bioData->occupation;?></h5>
											
											</div>
										
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												
												<?= Html::img('@web/'.$bioData->image, ['alt' => 'My logo','class'=>'imgtins']) ?>
											
											</div>
										
										</div>
										
									</div>
								</div>
							
							
						</div> 
						
						<div class="container content-form-area">
<!--							form content goes here-->
							<?php $form = ActiveForm::begin(['id' => 'paymentDetails']); ?>
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area">
												
												<div class="box-label">Payment </div>
												
												
												<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<?= $form->field($model, 'applicant_id')->hiddenInput(['value' => $bioData->applicant_id])->label(false); ?>
																
																<?= $form->field($model, 'payment_mode')->textInput(['id' => 'payment_mode']);?>
														    </div>
														</div>
														<div class="col-md-4">
															
															<?= $form->field($model, 'imageFile',['template' => "{label}\n<div class='col-md-6'>{input}</div>\n{hint}\n{error}",
                    'labelOptions' => [ 'class' => 'custom-file-label' ]])->fileInput(['class'=>'customFile'])?>
														</div>
													
													<div class="col-md-4">
															<?= $form->field($model, 'bank_branch')->textInput(['id' => 'bank_branch']); ?>

														</div>
														
														
													</div>
												
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<?= $form->field($model, 'payment_date')->textInput(['id' => 'payment_date']); ?>
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
																<?= $form->field($model, 'amount_word')->textInput(['id' => 'amount_word']); ?>
														    </div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<?= $form->field($model, 'amount')->textInput(['id' => 'amount']); ?> 
														    </div>

														</div>
														
														
													</div>
													
													
													

												 
											</div>
												
											<div class="col-md-12 ">
											<div class="row button-row">
														
														<div class="col-md-5">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
												</div>
												<div class="col-md-5">
													<?= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												<div class="col-md-2"></div>
													</div>
										
										</div>
								</div>
							<?php ActiveForm::end(); ?>
						</div>
							
<?
	$createpaymenttUrl = Url::to(['applicants/processpayment']);
	$agentDetails = Url::to(['applicants/agentdata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});



	
	
	
	$('#paymentDetails').on('beforeSubmit', function (e) {
	toastr.info('Proccessing Payment Data Please Wait')
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
				$(document).find('#renderapplicationform').load('$agentDetails'+'&id='+data.id);
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#agentactive').addClass('active');
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
