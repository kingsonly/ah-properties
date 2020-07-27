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
	
	.medium_image{
		width: 200px;
		height: 300px;
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
																	<h5><?= $modelBio->nationality; ?></h5>
																</div>
																
														    </div>
															
															<div class="row">
																<div class="col-md-3 " >
																	<h6 class="header-text-color">State</h6>
																	<h5><?= $modelBio->state_of_origin; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">Local Government</h6>
																	<h5><?= $modelBio->local_government_of_origin; ?></h5>
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
																	<h5><?= $modelKdmContactDetails->city; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">State</h6>
																	<h5><?= $modelKdmContactDetails->state; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">Country</h6>
																	<h5><?= $modelKdmContactDetails->country; ?></h5>
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
												<?= Html::img('@web/'.$modelBio->image, ['alt' => 'My logo','class'=>'medium_image']) ?>
												<h4><?= $modelBio->applicant_id?></h4>
												
												<? $confirmUrl = Url::to(['applicants/payment','id'=>$modelBio->id]);?>
															<a href="<?= $confirmUrl;?>">
															
													<?= Html::button('Payments', ['class' => 'btn btn-primary btn-lg  button-design_medium']) ?>
																</a>
											</div>
												
											
								</div>
							
						
								<div class="row" style="margin-top:20px">
									
											<div class="col-md-12 form-area" style="margin-top:20px">
												
												<div class="box-label">Next Of Kin </div>
												
												
            
												<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-4 " >
																	<h6 class="header-text-color">Relationship</h6>
																	<h5><?= $modelKdmNextOfKin->relationship; ?></h5>
																</div>
																
																<div class="col-md-6 " >
																	<h6 class="header-text-color">Title</h6>
																	<h5><?= $modelKdmNextOfKin->title; ?></h5>
																</div>
																
																
																
																<div class="col-md-2 " >
																	
																</div>
																
														    </div>
															
															
															
															<div class="row">
																<div class="col-md-3 " >
																	<h6 class="header-text-color">First Name</h6>
																	<h5><?= $modelKdmNextOfKin->first_name; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">Middle Name</h6>
																	<h5><?= $modelKdmNextOfKin->middle_name; ?></h5>
																</div>
																
																
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">Surname</h6>
																	<h5><?= $modelKdmNextOfKin->last_name; ?></h5>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">Mobile Number</h6>
																	<h5><?= $modelKdmNextOfKin->mobile_number; ?></h5>
																</div>
																
																
																
														    </div>
															
															
															<div class="row">
																<div class="col-md-2 " >
																	<h6 class="header-text-color">Street</h6>
																	<h5><?= $modelKdmNextOfKin->street_name; ?></h5>
																</div>
																
																
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color"> District</h6>
																	<h5><?= $modelKdmNextOfKin->district; ?></h5>
																</div>
																<div class="col-md-3 " >
																	<h6 class="header-text-color"> City</h6>
																	<h5><?= $modelKdmNextOfKin->city; ?></h5>
																</div>
																
																<div class="col-md-2 " >
																	<h6 class="header-text-color">State</h6>
																	<h5><?= $modelKdmNextOfKin->state; ?></h5>
																</div>
																
																
																
																<div class="col-md-2" >
																	<h6 class="header-text-color">Country</h6>
																	<h5><?= $modelKdmNextOfKin->country; ?></h5>
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
														<div class="col-md-4">
															<h6 class="header-text-color">Title</h6>
																	<h5><?= $modelKdmApplicantAgent->agent_title; ?></h5>
														</div>
													<div class="col-md-4">
															<h6 class="header-text-color">First Name</h6>
																	<h5><?= $modelKdmApplicantAgent->agent_first_name; ?></h5>
														</div>
													<div class="col-md-4">
															<h6 class="header-text-color">Last Name</h6>
																	<h5><?= $modelKdmApplicantAgent->agent_last_name; ?></h5>
														</div>
										
													</div>
											
											<div class="row">
														<div class="col-md-4">
															<h6 class="header-text-color">Address</h6>
																	<h5><?= $modelKdmApplicantAgent->agent_address; ?></h5>
														</div>
													<div class="col-md-4">
															<h6 class="header-text-color">Email Address</h6>
																	<h5><?= $modelKdmApplicantAgent->email_address; ?></h5>
														</div>
													<div class="col-md-4">
															<h6 class="header-text-color">Mobile Number</h6>
																	<h5><?= $modelKdmApplicantAgent->agent_mobile_number; ?></h5>
														</div>
										
													</div>
											 
											</div>
										
								</div>
							
						</div>
								<?}?>
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
							<h5><?= $modelBio->organization_country ?></h5>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 " >
							<h6 class="header-text-color"> organization state </h6>
							<h5><?= $modelBio->organization_state ; ?></h5>
						</div>

						<div class="col-md-6 " >
							<h6 class="header-text-color">organization local government</h6>
							<h5><?= $modelBio->organization_local_government ?></h5>
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
							<h5><?= $modelContactBio->city; ?></h5>
						</div>
						
						<div class="col-md-4 " >
							<h6 class="header-text-color">State</h6>
							<h5><?= $modelContactBio->state ; ?></h5>
						</div>

						



					</div>
					
					<div class="row">
						<div class="col-md-4 " >
							<h6 class="header-text-color">Country</h6>
							<h5><?= $modelContactBio->country; ?></h5>
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
				<div class="col-md-4">
					<h6 class="header-text-color">Title</h6>
					<h5><?= $modelKdmApplicantAgent->agent_title; ?></h5>
				</div>

				<div class="col-md-4">
					<h6 class="header-text-color">First Name</h6>
					<h5><?= $modelKdmApplicantAgent->agent_first_name; ?></h5>
				</div>

				<div class="col-md-4">
					<h6 class="header-text-color">Last Name</h6>
					<h5><?= $modelKdmApplicantAgent->agent_last_name; ?></h5>
				</div>

			</div>

			<div class="row">
				<div class="col-md-4">
					<h6 class="header-text-color">Address</h6>
					<h5><?= $modelKdmApplicantAgent->agent_address; ?></h5>
				</div>

				<div class="col-md-4">
					<h6 class="header-text-color">Email Address</h6>
					<h5><?= $modelKdmApplicantAgent->email_address; ?></h5>
				</div>
				<div class="col-md-4">
					<h6 class="header-text-color">Mobile Number</h6>
					<h5><?= $modelKdmApplicantAgent->agent_mobile_number; ?></h5>
				</div>

			</div>

		</div>

		
	</div>
	
</div>
<? }?>
	
								
								<?
	
	$declerationDetails = Url::to(['applicants/declerationdata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});


JS;
 
$this->registerJs($biodataform);
?>
