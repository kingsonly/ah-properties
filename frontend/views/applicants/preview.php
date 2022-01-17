<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<style>
	.display_image{
		width: 200px;
		height: 300px;
	}
	.big_image{
		width: 300px;
		height: 400px;
	}
</style>

<? if($rootModel->applicant_type == 1){ ?>					
<div class="container ">
<!--							form content goes here-->
							
							
							
							
	<div class="row" style="margin-top:20px">

		<div class="col-md-9 ">
			<div class="row ">
				<div class="col-md-12 form-area" style="margin-top:20px">
					<div class="box-label">Bio Data </div>

					<div class="row">
						<div class="col-md-3 " >
							<h6 class="header-text-color">Title</h6>
							<h5><?= $modelBio->title?></h5>
						</div>
						<div class="col-md-3 " >
							<h6 class="header-text-color">First Name</h6>
							<h5><?= $modelBio->first_name?></h5>
						</div>
						<div class="col-md-3 " >
							<h6 class="header-text-color">Middle Name</h6>
							<h5><?= $modelBio->middle_name?></h5>
						</div>
						<div class="col-md-3 " >
							<h6 class="header-text-color">SurName</h6>
							<h5><?= $modelBio->last_name; ?> <h5>
						</div>

					</div>

					<div class="row">
						<div class="col-md-3 " >
							<h6 class="header-text-color">Gender</h6>
							<h5><?= $modelBio->gender; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">Date Of Birth</h6>
							<h5><?= $modelBio->date_of_birth; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">Occupation</h6>
							<h5><?= $modelBio->occupation; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">Nationality</h6>
							<h5><?= $modelBio->countrys->name; ?></h5>
						</div>

					</div>

					<div class="row">
						<div class="col-md-3 " >
							<h6 class="header-text-color">State</h6>
							<h5><?= $modelBio->states->name; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">Local Government</h6>
							<h5><?= $modelBio->lga->name; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">Marital Status</h6>
							<h5><?= $modelBio->marital_status; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">Highest Edu . Level</h6>
							<h5><?= $modelBio->highest_education; ?></h5>
						</div>

					</div>
				</div>

				<div class="col-md-12 form-area" style="margin-top:20px">
					<div class="box-label">RESIDENTIAL ADDRESS </div>

					<div class="row">
						<div class="col-md-10 " >
							<h6 class="header-text-color">Street</h6>
							<h5><?= $modelKdmContactDetails->street_name; ?></h5>
						</div>

						<div class="col-md-2 " >

						</div>



					</div>

					<div class="row">
						<div class="col-md-3 " >
							<h6 class="header-text-color">District</h6>
							<h5><?= $modelKdmContactDetails->district; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">City/Town</h6>
							<h5><?= $modelKdmContactDetails->lga->name; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">State</h6>
							<h5><?= $modelKdmContactDetails->states->name; ?></h5>
						</div>

						<div class="col-md-3 " >
							<h6 class="header-text-color">Country</h6>
							<h5><?= $modelKdmContactDetails->countrys->name; ?></h5>
						</div>

					</div>


					<div class="row">
						<div class="col-md-3 " >
							<h6 class="header-text-color">Mobile Number</h6>
							<h5><?= $modelKdmContactDetails->mobile_number; ?></h5>
						</div>

						<div class="col-md-6 " >
							<h6 class="header-text-color">Email</h6>
							<h5><?= $modelKdmContactDetails->email; ?></h5>
						</div>



						<div class="col-md-3 " >

						</div>

					</div>
				</div>

			</div>




		</div>

		<div class="col-md-3 ">
			<?= Html::img('@web/'.$modelBio->image, ['alt' => 'My logo','class'=>'big_image']) ?>
			
		</div>


	</div>
			
			
	


	<div class="row" style="margin-top:20px">

		
									
											<div class="col-md-12 form-area" style="margin-top:20px">
												
												<div class="box-label">Next Of Kin </div>
												
												
            
												<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-3 " >
																	<h6 class="header-text-color">Title</h6>
																	<h5><?= $modelKdmNextOfKin->title; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">First name</h6>
																	<h5><?= $modelKdmNextOfKin->first_name; ?></h5>
																</div>
																
																
																
																<div class="col-md-3" >
																	<h6 class="header-text-color">Middle name</h6>
																	<h5><?= $modelKdmNextOfKin->middle_name; ?></h5>
																	
																</div>
																
																<div class="col-md-3" >
																	
																	<h6 class="header-text-color">Last name</h6>
																	<h5><?= $modelKdmNextOfKin->last_name; ?></h5>
																	
																</div>
																
														    </div>
															
															
															
															<div class="row">
																<div class="col-md-3 " >
																	<h6 class="header-text-color">Relationship</h6>
																	<h5><?= $modelKdmNextOfKin->relationship; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">street</h6>
																	<h5><?= $modelKdmNextOfKin->street_name; ?></h5>
																</div>
																
																
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">District</h6>
																	<h5><?= $modelKdmNextOfKin->district; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">City</h6>
																	<h5><?= $modelKdmNextOfKin->lga->name; ?></h5>
																</div>
																
																
																
														    </div>
															
															
															<div class="row">
																<div class="col-md-3 " >
																	<h6 class="header-text-color">State</h6>
																	<h5><?= $modelKdmNextOfKin->states->name; ?></h5>
																</div>
																
																
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color"> Country</h6>
																	<h5><?= $modelKdmNextOfKin->countrys->name; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color"> Mobile Number</h6>
																	<h5><?= $modelKdmNextOfKin->mobile_number; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	
																</div>
																
																
																
																
														    </div>
														</div>
													
														
													</div>
													
													
													

												 
											</div>
									
									
										
										
							


		<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">DOCUMENTS </div>


			<div class="row">
				<? foreach($modelKdmDocumentUpload as $key => $value){ ?>
				<div class="col-md-3">


					<?= Html::img('@web/'.$value->image_path, ['alt' => 'My logo','class'=>'display_image']) ?>

					<h4><?= $value->document_type; ?></h4>

				</div>
				<?}?>

			</div>

		</div>


		<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">PAYMENTS </div>

				<div class="row">
					<? foreach($modelKdmPayment as $payment){?>
					<div class="col-md-3">
						<?= Html::img('@web/'.$payment->image, ['alt' => 'My logo','class'=>'display_image']) ?>
						<h6>File Number: <?= $payment->filenumber->file_number;?> </h6>
						<h6>Payment For: <?= $payment->payment_for?> </h6>
						<h6>Amount: <?= $payment->amount;?></h6>
					</div>
					<?}?>

				</div>
		</div>


		<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">AGENT </div>


			<div class="row">

				<div class="col-md-12">
					<h6 class="header-text-color">Name</h6>
					<h5><?= $modelKdmApplicantAgent->agent_first_name; ?></h5>
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<h6 class="header-text-color">Email Address</h6>
					<h5><?= $modelKdmApplicantAgent->email_address; ?></h5>
				</div>
				<div class="col-md-6">
					<h6 class="header-text-color">Mobile Number</h6>
					<h5><?= $modelKdmApplicantAgent->agent_mobile_number; ?></h5>
				</div>

			</div>

		</div>

		
		<div class="col-md-12 ">
			<?php $form = ActiveForm::begin(['id' => 'user_validate']); ?>			
			<div class="row" style="margin-top:20px">
				<div class="col-md-1">
					<?= $form->field($rootModel, "user_validate")->checkbox([ 'class' => '','id' => 'customCheck']); ?>
				</div>

				<div class="col-md-11">
					<h5> I , <strong><?= $modelKdmUser->first_name.' '.$modelKdmUser->last_name;?></strong> acknowledge, checked and confirmed the information of <strong><?= $modelBio->first_name.' '.$modelBio->middle_name.' '. $modelBio->last_name;?> </strong>  to be correct as filled on manual form </h5>

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
<? }?>
		
		

<? if($rootModel->applicant_type == 2){ ?>					
<div class="container ">
<!--							form content goes here-->					
			
	<div class="row" style="margin-top:20px">

		<div class="col-md-12 ">
			<div class="row ">
				<div class="col-md-12 form-area" style="margin-top:20px">
					<div class="box-label">Organization Details </div>

					<div class="row">
						<div class="col-md-6 " >
							<h6 class="header-text-color">organization name </h6>
							<h5><?= $modelBio->organization_name ;?></h5>
						</div>
						<div class="col-md-6 " >
							<h6 class="header-text-color">organization Country </h6>
							<h5><?= $modelBio->countrys->name ?></h5>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 " >
							<h6 class="header-text-color"> organization state </h6>
							<h5><?= $modelBio->states->name ; ?></h5>
						</div>

						<div class="col-md-6 " >
							
						</div>

					</div>

					
				</div>

				<div class="col-md-12 form-area" style="margin-top:20px">
					<div class="box-label">ORGANIZATION CONTACT </div>

					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">house number</h6>
							<h5><?= $modelContactBio->house_no ; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Street</h6>
							<h5><?= $modelContactBio->street_name ; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Street extention</h6>
							<h5><?= $modelContactBio->street_extention; ?></h5>
						</div>

						



					</div>

					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">District</h6>
							<h5><?= $modelContactBio->district ; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">City</h6>
							<h5><?= $modelContactBio->lga->name; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">State</h6>
							<h5><?= $modelContactBio->states->name ; ?></h5>
						</div>

						



					</div>
					
					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">Country</h6>
							<h5><?= $modelContactBio->countrys->name; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Local Government</h6>
							<h5><?= $modelContactBio->local_government; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">P.O Box</h6>
							<h5><?= $modelContactBio->pobox; ?></h5>
						</div>

						



					</div>
					
					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">C/O</h6>
							<h5><?= $modelContactBio->c_o ; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Office Number</h6>
							<h5><?= $modelContactBio->office_number; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">Office Email</h6>
							<h5><?= $modelContactBio->email; ?></h5>
						</div>

						



					</div>
				</div>

			</div>




		</div>

	</div>


	<div class="row" style="margin-top:20px">

		<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">ORANIZATION CONTACT PERSON </div>

				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 " >
								<h6 class="header-text-color">Title</h6>
								<h5><?= $modelContactPersonBio->title ; ?></h5>
							</div>

							<div class="col-md-4 " >
								<h6 class="header-text-color">Designation</h6>
								<h5><?= $modelContactPersonBio->designation; ?></h5>
							</div>



							<div class="col-md-4 " >
								<h6 class="header-text-color">Phone Number</h6>
								<h5><?= $modelContactPersonBio->phone_number; ?></h5>
							</div>

						</div>



						<div class="row">
							<div class="col-md-4 " >
								<h6 class="header-text-color">First Name</h6>
								<h5><?= $modelContactPersonBio->first_name; ?></h5>
							</div>

							<div class="col-md-4 " >
								<h6 class="header-text-color">Middle Name</h6>
								<h5><?= $modelContactPersonBio->middle_name; ?></h5>
							</div>



							<div class="col-md-4 " >
								<h6 class="header-text-color">Surname</h6>
								<h5><?= $modelContactPersonBio->last_name; ?></h5>
							</div>

							
						</div>

					</div>


			</div>





		</div>


		<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">DOCUMENTS </div>


			<div class="row">
				<? foreach($modelKdmDocumentUpload as $key => $value){ ?>
				<div class="col-md-3">


					<?= Html::img('@web/'.$value->image_path, ['alt' => 'My logo','class'=>'display_image']) ?>

					<h4><?= $value->document_type; ?></h4>

				</div>
				<?}?>

			</div>

		</div>


		<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">PAYMENTS </div>

				<div class="row">
					<? foreach($modelKdmPayment as $payment){?>
					<div class="col-md-3">
						<?= Html::img('@web/'.$payment->image, ['alt' => 'My logo','class'=>'display_image']) ?>
						<h6>File Number: <?= $payment->filenumber->file_number;?> </h6>
						<h6>Payment For: <?= $payment->payment_for?> </h6>
						<h6>Amount: <?= $payment->amount;?></h6>
					</div>
					<?}?>

				</div>
		</div>


		<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">AGENT </div>


			<div class="row">

				<div class="col-md-12">
					<h6 class="header-text-color">Name</h6>
					<h5><?= $modelKdmApplicantAgent->agent_first_name; ?></h5>
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<h6 class="header-text-color">Email Address</h6>
					<h5><?= $modelKdmApplicantAgent->email_address; ?></h5>
				</div>
				<div class="col-md-6">
					<h6 class="header-text-color">Mobile Number</h6>
					<h5><?= $modelKdmApplicantAgent->agent_mobile_number; ?></h5>
				</div>

			</div>

		</div>

		<div class="col-md-12 ">
			<?php $form = ActiveForm::begin(['id' => 'user_validate']); ?>			
			<div class="row" style="margin-top:20px">
				<div class="col-md-1">
					<?= $form->field($rootModel, "user_validate")->checkbox([ 'class' => '','id' => 'customCheck']); ?>
				</div>

				<div class="col-md-11">
					<h5> I , <strong><?= $modelKdmUser->first_name.' '.$modelKdmUser->last_name;?></strong> acknowledge, checked and confirmed the information of <strong><?= $modelBio->organization_name;?> </strong>  to be correct as filled on manual form </h5>

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
<? }?>
		
								
								<?
	
	$declerationDetails = Url::to(['applicants/declerationdata']);
	$processUserValidate = Url::to(['applicants/processuservalidate','id'=>$rootModel->id]);
	$confirmUrl = Url::to(['applicants/confirm','id'=>$rootModel->id]);
		
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});



	$('#user_validate').on('beforeSubmit', function (e) {
	toastr.info('Confirming Please Wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$processUserValidate',
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
