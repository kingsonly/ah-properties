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
	.custom-control-input{
		opacity: 1 !important;
	}
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
							<?php $form = ActiveForm::begin(['id' => 'declerationdata']); ?>
							
							
							
							<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area">
												
												<div class="box-label">DECLARATION </div>
												
												
													<div class="row">
														<div class="col-md-1">
															<div class="form-group">
																<div class="custom-control custom-checkbox">
																	<?= $form->field($declarationModel, "declaration")->checkbox(['value' => '1', 'uncheckValue'=>'0', 'class' => '','id' => 'customCheck'])->label(false); ?>
																	
																	<?= $form->field($declarationModel, 'applicant_id')->hiddenInput(['value' => $rootModel->id])->label(false); ?>
																	
																	<?= $form->field($declarationModel, 'status')->hiddenInput(['value' => 1])->label(false); ?>
																	
																	
															  	</div>
														    </div>
														</div>
														<div class="col-md-11">
															<h5> Terms and condition of service </h5>
															
															<ol type="a">
															 <li> It is illegal to provide any false information and make any false statement or claims when completing this form . When it is subsequently discovered that an allocation was issued based on false or inaccurate information, AHPC-AICL may at its sole discretion , revoke such allocation. AHPC-AICL reserve the right to reject any application form not properly or fully completed and shall not incur any liability for any such rejection . </li>
															 <li> Acquiring the form does not guarantee space allocation</li>
															 <li style="color:red;">A non-refundable  application processing fee is payable ONLY on submission of a duly completed form</li>
															 <li style="color:red;">Refund for market space payment will incure a 5% administrative charge</li>
															</ol>

														</div>
														
														
													</div>
													
													

												 
											</div>
												
											
								</div>
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area">
												
												<div class="box-label">SIGNATURE </div>
												
												
												<div class="row">
														<div class="col-md-7">
															<div class="custom-file">
																
																
																<?= $form->field($model, 'imageFile',['template' => "{label}\n<div class='col-md-6'>{input}</div>\n{hint}\n{error}",
                    'labelOptions' => [ 'class' => 'custom-file-label' ]])->fileInput(['class'=>'customFile']) ?>
															</div>
														   
														</div>
													<div class="col-md-5">
														<?= $form->field($model, 'applicant_id')->hiddenInput(['value' => $rootModel->id])->label(false); ?>
																
																<?= $form->field($model, 'document_type')->hiddenInput(['value' => 'Signature'])->label(false); ?>
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
	$createdeclerationUrl = Url::to(['applicants/processdeclerationdata']);
	$declerationDetails = Url::to(['applicants/declerationdata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});



	
	
	
	$('#declerationdata').on('beforeSubmit', function (e) {
	toastr.info('Confirming Please Wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createdeclerationUrl',
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
				$(document).find('#renderapplicationform').load('$declerationDetails'+'&id='+data.id);
				$(document).find('.list-group-item').removeClass('active');
			}else{
				//alert('Please confirm your data to make sure values are correct')
			}
			
			
        },

		complete: function() {
            // success alerts
        },

        error: function (data) {
        	//alert('something went wrong') 
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
