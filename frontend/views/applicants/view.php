<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\KdmRequestUpdate;
$requestModel = new KdmRequestUpdate();
?>
<style>
	
</style>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
           <?= $this->render('requestform', [
        'model' => $requestModel,
    ]) ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="myModalupdate" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
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
																	<div class="row">
											
											<div class="col-md-10">
												
											</div>

											<div class="col-md-2">
												
																
																<? if($modelBio->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_applicant_bio_data' data-tableid = '<?= $modelBio->id?>'>Request Update</button>
																<? } elseif($modelBio->requestupdate->status == 1 and $modelBio->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($modelBio->requestupdate->status == 1 and $modelBio->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($modelBio->requestupdate->status == 2 and $modelBio->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_applicant_bio_data' data-updateid='<?= $modelBio->requestupdate->id?>' data-tableid = '<?= $modelBio->requestupdate->table_id?>'>Update</button>
																<? } elseif($modelBio->requestupdate->status == 2 and $modelBio->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_applicant_bio_data' data-tableid = '<?= $modelBio->id?>'>Request Update</button>
																<? } ?>
																
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
															<div class="row">
											
											<div class="col-md-10">
												
											</div>

											<div class="col-md-2">
												
																
																
																<? if($modelKdmContactDetails->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_contact_details' data-tableid = '<?= $modelKdmContactDetails->id?>'>Request Update</button>
																<? } elseif($modelKdmContactDetails->requestupdate->status == 1 and $modelKdmContactDetails->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($modelKdmContactDetails->requestupdate->status == 1 and $modelKdmContactDetails->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($modelKdmContactDetails->requestupdate->status == 2 and $modelKdmContactDetails->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_contact_details' data-updateid='<?= $modelKdmContactDetails->requestupdate->id?>' data-tableid = '<?= $modelKdmContactDetails->requestupdate->table_id?>'>Update</button>
																<? } elseif($modelKdmContactDetails->requestupdate->status == 2 and $modelKdmContactDetails->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_contact_details' data-tableid = '<?= $modelKdmContactDetails->id?>'>Request Update</button>
																<? } ?>
																
																
											</div>
											

										</div>

														</div>
														
													</div>
													
													

												 
											</div>
											<div class="col-md-3 ">
												<?= Html::img('@web/'.$modelBio->image, ['alt' => 'My logo','class'=>'medium_image']) ?>
												
												
												<? $confirmUrl = Url::to(['applicants/payment','id'=>$modelBio->applicant_id]);?>
												
												<? if($rootModel->status > 2 and $rootModel->status !== 4){?>
												<? if (\Yii::$app->user->can('allocate')) { ?>
															<a href="<?= $confirmUrl;?>">
															
													<?= Html::button('Payments', ['class' => 'btn btn-primary btn-lg  button-design_medium']) ?>
																</a>
												<?}else{?>
													
															
													<?= Html::button('Cant View Payments', ['class' => 'btn btn-primary btn-lg  button-design_medium']) ?>
																
												<?}?>
												<?}else{?>
													<?= Html::button('User Not verified Yet', ['class' => 'btn btn-warning btn-lg  button-design_medium']) ?>
												<?}?>
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
															
															<div class="row">
											
											<div class="col-md-10">
												
											</div>

											<div class="col-md-2">
												<?  if($modelKdmNextOfKin->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_next_of_kin' data-tableid = '<?= $modelKdmNextOfKin->id?>'>Request Update</button>
																<? } elseif($modelKdmNextOfKin->requestupdate->status == 1 and $modelKdmNextOfKin->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($modelKdmNextOfKin->requestupdate->status == 1 and $modelKdmNextOfKin->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($modelKdmNextOfKin->requestupdate->status == 2 and $modelKdmNextOfKin->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_next_of_kin' data-updateid='<?= $modelKdmNextOfKin->requestupdate->id?>' data-tableid = '<?= $modelKdmNextOfKin->requestupdate->table_id?>'>Update</button>
																<? } elseif($modelKdmNextOfKin->requestupdate->status == 2 and $modelKdmNextOfKin->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_next_of_kin' data-tableid = '<?= $modelKdmNextOfKin->id?>'>Request Update</button>
																<? } ?>
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
															<div class="row">
											
											<div class="col-md-6">
												
											</div>

											<div class="col-md-6">
												<?  if($value->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_document_upload' data-tableid = '<?= $value->id?>'>Request Update</button>
																<? } elseif($value->requestupdate->status == 1 and $value->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($value->requestupdate->status == 1 and $value->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($value->requestupdate->status == 2 and $value->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_document_upload' data-updateid='<?= $value->requestupdate->id?>' data-tableid = '<?= $value->requestupdate->table_id?>'>Update</button>
																<? } elseif($value->requestupdate->status == 2 and $value->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_document_upload' data-tableid = '<?= $value->id?>'>Request Update</button>
																<? } ?>
											</div>
											

										</div>

															
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
						
						<div class="row">
											
											<div class="col-md-6">
												
											</div>

											<div class="col-md-6">
												<?  if($payment->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_payment' data-tableid = '<?= $payment->id?>'>Request Update</button>
																<? } elseif($payment->requestupdate->status == 1 and $payment->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($payment->requestupdate->status == 1 and $payment->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($payment->requestupdate->status == 2 and $payment->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_payment' data-updateid='<?= $payment->requestupdate->id?>' data-tableid = '<?= $payment->requestupdate->table_id?>'>Update</button>
																<? } elseif($payment->requestupdate->status == 2 and $payment->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_payment' data-tableid = '<?= $payment->id?>'>Request Update</button>
																<? } ?>
											</div>
											

										</div>

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
										
										<div class="row">
											
											<div class="col-md-10">
												
											</div>

											<div class="col-md-2">
												<?  if($modelKdmApplicantAgent->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_applicant_agent' data-tableid = '<?= $modelKdmApplicantAgent->id?>'>Request Update</button>
																<? } elseif($modelKdmApplicantAgent->requestupdate->status == 1 and $modelKdmApplicantAgent->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($modelKdmApplicantAgent->requestupdate->status == 1 and $modelKdmApplicantAgent->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($modelKdmApplicantAgent->requestupdate->status == 2 and $modelKdmApplicantAgent->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_applicant_agent' data-updateid='<?= $modelKdmApplicantAgent->requestupdate->id?>' data-tableid = '<?= $modelKdmApplicantAgent->requestupdate->table_id?>'>Update</button>
																<? } elseif($modelKdmApplicantAgent->requestupdate->status == 2 and $modelKdmApplicantAgent->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_applicant_agent' data-tableid = '<?= $modelKdmApplicantAgent->id?>'>Request Update</button>
																<? } ?>
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
						<div class="col-md-12">
						<div class="row">
							<div class="col-md-9">
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
							<div class="col-md-3">
								<? $confirmUrl = Url::to(['applicants/payment','id'=>$modelBio->applicant_id]);?>
								
								
								<? if($rootModel->status > 2 and $rootModel->status !== 4){?>
												<? if (\Yii::$app->user->can('allocate')) { ?>
															<a href="<?= $confirmUrl;?>">
															
													<?= Html::button('Payents', ['class' => 'btn btn-primary  btn-lg button-design btn-height','id' =>'test']) ?>
																</a>
												<?}else{?>
													
															
													<?= Html::button('Cant View Payments', ['class' => 'btn btn-primary  btn-lg button-design btn-height']) ?>
																
												<?}?>
												<?}else{?>
													<?= Html::button('User Not verified Yet', ['class' => 'btn btn-warning  btn-lg button-design btn-height']) ?>
												<?}?>
							</div>
						</div>
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
							<h5><?= $modelContactBio->lga->name; ?></h5>
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
					<div class="row">
											
											<div class="col-md-6">
												
											</div>

											<div class="col-md-6">
												<?  if($value->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_document_upload' data-tableid = '<?= $value->id?>'>Request Update</button>
																<? } elseif($value->requestupdate->status == 1 and $value->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($value->requestupdate->status == 1 and $value->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($value->requestupdate->status == 2 and $value->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_document_upload' data-updateid='<?= $value->requestupdate->id?>' data-tableid = '<?= $value->requestupdate->table_id?>'>Update</button>
																<? } elseif($value->requestupdate->status == 2 and $value->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_document_upload' data-tableid = '<?= $value->id?>'>Request Update</button>
																<? } ?>
											</div>
											

										</div>


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
						<div class="row">
											
											<div class="col-md-6">
												
											</div>

											<div class="col-md-6">
												<?  if($payment->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_payment' data-tableid = '<?= $payment->id?>'>Request Update</button>
																<? } elseif($payment->requestupdate->status == 1 and $payment->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($payment->requestupdate->status == 1 and $payment->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($payment->requestupdate->status == 2 and $payment->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_payment' data-updateid='<?= $payment->requestupdate->id?>' data-tableid = '<?= $payment->requestupdate->table_id?>'>Update</button>
																<? } elseif($payment->requestupdate->status == 2 and $payment->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_payment' data-tableid = '<?= $payment->id?>'>Request Update</button>
																<? } ?>
											</div>
											

										</div>
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
										
										<div class="row">
											
											<div class="col-md-10">
												
											</div>

											<div class="col-md-2">
												<?  if($modelKdmApplicantAgent->requestupdate == null){?>
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_applicant_agent' data-tableid = '<?= $modelKdmApplicantAgent->id?>'>Request Update</button>
																<? } elseif($modelKdmApplicantAgent->requestupdate->status == 1 and $modelKdmApplicantAgent->requestupdate->requester_id == yii::$app->user->identity->id){?>
																awaiting approval
																<? } elseif($modelKdmApplicantAgent->requestupdate->status == 1 and $modelKdmApplicantAgent->requestupdate->requester_id != yii::$app->user->identity->id){?>
																 Pending request
																<? } elseif($modelKdmApplicantAgent->requestupdate->status == 2 and $modelKdmApplicantAgent->requestupdate->requester_id == yii::$app->user->identity->id){?>
																<button type="button" class="btn btn-success  button-design_medium updatedata" data-toggle="modal" data-target="#myModalupdate"  data-tablename ='kdm_applicant_agent' data-updateid='<?= $modelKdmApplicantAgent->requestupdate->id?>' data-tableid = '<?= $modelKdmApplicantAgent->requestupdate->table_id?>'>Update</button>
																<? } elseif($modelKdmApplicantAgent->requestupdate->status == 2 and $modelKdmApplicantAgent->requestupdate->requester_id != yii::$app->user->identity->id){?>
																update in progress
																<? } else{?>
																
																<button type="button" class="btn btn-primary  button-design_medium updaterequest" data-toggle="modal" data-target="#myModal"  data-tablename ='kdm_applicant_agent' data-tableid = '<?= $modelKdmApplicantAgent->id?>'>Request Update</button>
																<? } ?>
											</div>
											

										</div>

									</div>


		
	</div>
	
</div>
<? }?>
	
								
								<?
	
	$declerationDetails = Url::to(['applicants/declerationdata']);
	$updateContactDetails = Url::to(['applicants/updatecontactdata']);
	$updateBioDetails = Url::to(['applicants/updatebiodata']);
	$updateNextOfKin = Url::to(['applicants/updatenextofkin']);
	$updateDocumentUpload = Url::to(['applicants/updatedocumentupload']);
	$updatePayment = Url::to(['applicants/updatepayment']);
	$updateAgent = Url::to(['applicants/updateagent']);
	$biodataform = <<<JS
	
	$(".updaterequest").on("click", function() {
		tableid = $(this).data('tableid')
		tablename  = $(this).data('tablename')
		
		$('#requestnewupdate').attr("data-tablename",tablename);
		$('#requestnewupdate').attr("data-tableid",tableid);
	})
	
	$(".updatedata").on("click", function() {
	
		if( $(this).data('tablename') == 'kdm_contact_details'){
			$(document).find("#myModalupdate").find(".modal-body").load('$updateContactDetails'+'&id='+$(this).data('tableid')+'&updateid='+$(this).data('updateid'))
		}
		
		if( $(this).data('tablename') == 'kdm_applicant_bio_data'){
			$(document).find("#myModalupdate").find(".modal-body").load('$updateBioDetails'+'&id='+$(this).data('tableid')+'&updateid='+$(this).data('updateid'))
		}
		
		if( $(this).data('tablename') == 'kdm_next_of_kin'){
			$(document).find("#myModalupdate").find(".modal-body").load('$updateNextOfKin'+'&id='+$(this).data('tableid')+'&updateid='+$(this).data('updateid'))
		}
		
		if( $(this).data('tablename') == 'kdm_document_upload'){
			$(document).find("#myModalupdate").find(".modal-body").load('$updateDocumentUpload'+'&id='+$(this).data('tableid')+'&updateid='+$(this).data('updateid'))
		}
		
		if( $(this).data('tablename') == 'kdm_payment'){
			$(document).find("#myModalupdate").find(".modal-body").load('$updatePayment'+'&id='+$(this).data('tableid')+'&updateid='+$(this).data('updateid'))
		}
		
		if( $(this).data('tablename') == 'kdm_applicant_agent'){
			$(document).find("#myModalupdate").find(".modal-body").load('$updateAgent'+'&id='+$(this).data('tableid')+'&updateid='+$(this).data('updateid'))
		}
		
	})
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});


JS;
 
$this->registerJs($biodataform);
?>
