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
					<div class="box-label">ORGANIZATION CONTACT </div>

					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">house number</h6>
							<h5><?= $model->house_no ; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Street</h6>
							<h5><?= $model->street_name ; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Street extention</h6>
							<h5><?= $model->street_extention; ?></h5>
						</div>

						



					</div>

					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">District</h6>
							<h5><?= $model->district ; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">City</h6>
							<h5><?= $model->city; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">State</h6>
							<h5><?= $model->states->name ; ?></h5>
						</div>

						



					</div>
					
					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">Country</h6>
							<h5><?= $model->countrys->name; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Local Government</h6>
							<h5><?= $model->lga->name; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">P.O Box</h6>
							<h5><?= $model->pobox; ?></h5>
						</div>

						



					</div>
					
					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">C/O</h6>
							<h5><?= $model->c_o ; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Office Number</h6>
							<h5><?= $model->office_number; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Office Email</h6>
							<h5><?= $model->email; ?></h5>
						</div>

						



					</div>
				</div>
										 
								</div>
												
											<?php $form = ActiveForm::begin(['id' => 'bioveri']); ?>
											<div class="row mar-t-10">
														
														<div class="col-md-1">
													<?= $form->field($verificationModel, "user_validate")->checkbox(['value' => '1', 'uncheckValue'=>'0', 'class' => '','id' => 'customCheck'])->label(false); ?>
																	
												</div>
												<div class="col-md-6">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
													<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												
												<div class="col-md-5">
													<?= Html::button('Decline', ['class' => 'btn btn-danger button-border btn-lg button-design','id' =>'decline']) ?>
												</div>
												
												
													</div>
										<?php ActiveForm::end(); ?>
										
								</div>

<?
	$verifyorgaddress = Url::to(['applicants/proccessorgaddressveri','id' => $model->applicant_id]);
	$loadContactperson = Url::to(['applicants/orgcontactpersonverification']);
	$declineUrl = Url::to(['applicants/decline','id' => $model->id,'section' => 'orgaddress','applicant' => $model->applicant_id]);
	
	$createCustomerFormJs = <<<JS
	
	$('#decline').on('click',function(){
		$(document).find('#renderapplicationform').load('$declineUrl');
	})
	
		
	$('#bioveri').on('beforeSubmit', function (e) {
	toastr.info('Processing')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$verifyorgaddress',
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
				$(document).find('#renderapplicationform').load('$loadContactperson'+'&id='+newData.applicant_id);
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
 
$this->registerJs($createCustomerFormJs);
?>

							