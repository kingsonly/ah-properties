
<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\VerificationModel;
$verificationModel = new VerificationModel();
?>
<style>
	.declearation_container{
		text-align: center;
		padding: 10px;
	}
</style>
<div class="container content-form-area">
<!--							form content goes here-->
							
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area declearation_container">
												
												<div class="box-label">Declearation </div>
												
												
												<div class="row" id="applicantselection">
													
													<? if($model->applicant->applicant_type == 1){?>
														<div class="col-md-12">
															
															 this is to confirm that <?= $bioModel->title.' '.$bioModel->first_name.' '.$bioModel->last_name;?> has read and agreed to our Terms and condition of service
														</div>
													<?}?>
													
													<? if($model->applicant->applicant_type == 2){?>
														<div class="col-md-12">
															
															this is to confirm that <?=$bioModel->organization_name;?> has read and agreed to our Terms and condition of service
														</div>
													<?}?>
														
														
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
	$verifydeclearData = Url::to(['applicants/proccessdeclerationveri','id' => $model->applicant_id]);
	$loadconfirm = Url::to(['applicants/confirmverification']);
	
	$createCustomerFormJs = <<<JS
	
		
	$('#bioveri').on('beforeSubmit', function (e) {
	toastr.info('Proccessing Contact details please wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$verifydeclearData',
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
				$(document).find('#renderapplicationform').load('$loadconfirm'+'&id='+newData.applicant_id);
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

							