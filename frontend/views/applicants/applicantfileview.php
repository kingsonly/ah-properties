<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<style>
	
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
														
														
													</div>
													
													

												 
											</div>
											<div class="col-md-3 ">
												<?= Html::img('@web/'.$modelBio->image, ['alt' => 'My logo','class'=>'medium_image']) ?>
												
												
												<? $confirmUrl = Url::to(['applicants/payment','id'=>$modelBio->applicant_id]);?>
															
											</div>
												
											
								</div>
							
						
								<div class="row" style="margin-top:20px">
									
											
									
										<div class="col-md-12 form-area" style="margin-top:20px">
												
												<div class="box-label">DOCUMENTS </div>
												
												
												<div class="row">
													<? foreach($rootModel->filenumber as $key => $value){ ?>
														<div class="col-md-3">
															
															
															<?= Html::img('@web/'.'uploads/passportplaceholder880628419658791.jpg', ['alt' => 'My logo','class'=>'display_image']) ?>
															
															<h4><?= $value->file_number; ?></h4>
															
														</div>
													<?}?>
													
													
													
														
														
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
						<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
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
										<h6 class="header-text-color">organization local government</h6>
										<h5><?//= $modelBio->lga->name ?></h5>
									</div>

								</div>
							</div>
							
						</div>
						</div>
						
					</div>

					

					
				</div>

			</div>




		</div>

	</div>


	<div class="row" style="margin-top:20px">

		<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">FILES </div>


			<div class="row">
				<? foreach($rootModel->filenumber as $key => $value){ ?>
														<div class="col-md-3">
															
															<a href="<?= Url::to(['applicants/applicantfiledashboard','id' => $value->id])?>"> 
																<?= Html::img('@web/'.'uploads/passportplaceholder880628419658791.jpg', ['alt' => 'My logo','class'=>'display_image']) ?>
															</a>
															
															
															<h4><?= $value->file_number; ?></h4>
															
														</div>
													<?}?>
													

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
