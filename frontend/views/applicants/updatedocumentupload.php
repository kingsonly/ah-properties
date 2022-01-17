<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$identification =[
	[
	'id' =>'Drivers License',
	'name' =>'Drivers License',
	],
	[
	'id' =>'International Passport',
	'name' =>'International Passport',
	],
	[
	'id' =>'National ID',
	'name' =>'National ID',
	],
	[
	'id' =>'Permanent Voters Card',
	'name' =>'Permanent Voters Card',
	],
	[
	'id' =>'Signature',
	'name' =>'Signature',
	],
];
?>
<style>
	
</style>

						
						<div class="container content-form-area">
<!--							form content goes here-->
							<?php $form = ActiveForm::begin(['id' => 'documentDetails']); ?>
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area">
												
												<div class="box-label">MODE OF IDENTIFICATION </div>
												
												
												<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<?= $form->field($model, 'applicant_id')->hiddenInput(['value' => $model->applicant_id])->label(false); ?>
																
																<?= $form->field($model, 'document_id')->textInput(['id' => 'document_id']); ?>
														    </div>
														</div>
														<div class="col-md-6">
															

														</div>
														
														
													</div>
												
													<div class="row">
														<div class="col-md-4">
															
																<?= $form->field($model, 'document_type')->dropDownList(ArrayHelper::map($identification, 'id', 'name'),['class'=>'custom-select']) ?>
														    
														</div>
														<div class="col-md-8">
								
															<div class="custom-file">
																<?= $form->field($model, 'imageFile',['template' => "{label}\n<div class='col-md-6'>{input}</div>\n{hint}\n{error}",
                    'labelOptions' => [ 'class' => 'custom-file-label' ]])->fileInput(['class'=>'customFile']) ?>
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
	$createuploaddocumentUrl = Url::to(['applicants/processdocumentuploadupdate','id' =>$model->id,'updateid' => $updateid]);
	
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});



	
	
	
	$('#documentDetails').on('beforeSubmit', function (e) {
	toastr.info('Uploading Documents Please Wait')
	$(document).find('#actionbutton').hide()
	$(document).find('#loaders').show()
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createuploaddocumentUrl',
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
				$(document).find('#payment').addClass('active')
				toastr.success('Documents Saved')
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
