
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
												
												<div class="box-label">Applicant Selection </div>
												
												
												<div class="row" id="applicantselection">
														<div class="col-md-6">
															
														I Hereby Confirm that all the information and documents provided by the applicant are complete and have been verified. 
														</div>
														<div class="col-md-6">
															
														</div>
										 
														
														
													</div>
												
														
													</div>
													
													
													

												 
											</div>
												
											<?php $form = ActiveForm::begin(['id' => 'bioveri']); ?>
											<div class="row ">
														
														<div class="col-md-2">
													<?= $form->field($verificationModel, "user_validate")->checkbox(['value' => '1', 'uncheckValue'=>'0', 'class' => '','id' => 'customCheck'])->label(false); ?>
																	
												</div>
												<div class="col-md-5">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
													
												</div>
												<div class="col-md-5">
													<a href="<?= Url::to(['applicants/proccessdeclineveri','id' => $model->id])?>"></a>
													<?= Html::button('DECLINE', ['class' => 'btn btn-danger button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												
													</div>
										<?php ActiveForm::end(); ?>
										
								</div>

<?
	$verifyconfirm = Url::to(['applicants/proccessconfirmveri','id' => $model->id]);
	
	
	$createCustomerFormJs = <<<JS
	
		
	$('#bioveri').on('beforeSubmit', function (e) {
	toastr.info('Proccessing Contact details please wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$verifyconfirm',
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

							