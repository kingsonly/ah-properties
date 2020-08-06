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
	.paymenttable{
		box-shadow: 0px 0px 1px 1px #ccc;
		padding: 20px 10px 20px 10px;
		margin-bottom: 35px;
		margin-top: 21px;
	}
</style> 

						
						<div class="container ">
<!--							form content goes here-->
							<? if($rootModel->applicant_type == 1){?>
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
														
														<div class="col-md-12 " style="margin-top:20px">
															<h1>Application Status</h1>
															<? if($rootModel->status == 2){ ?>
																<button class="btn btn-warning">
																	
																	<h3>
																		Pending
																	</h3>
															</button>
															<? }?>
															<? if($rootModel->status == 3){ ?>
																<button class="btn btn-success">
																	
																	<h3>
																		Approved
																	</h3>
															</button>
															<? }?>
															<? if($rootModel->status == 4){ ?>
																<button class="btn btn-danger">
																	<h3>
																		Declined
																	</h3>
																	
															</button>
															<? }?>
															
											 
														</div>
														
													</div>
													
													

												 
											</div>
											<div class="col-md-3 ">
												<?= Html::img('@web/'.$modelBio->image, ['alt' => 'My logo','class'=>'medium_image']) ?>
												
												
												
											</div>
												
											
								</div>
							<? }?>
							
							
							<? if($rootModel->applicant_type == 2){?>
								<div class="row" style="margin-top:20px">
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
									<div class="col-md-12 " style="margin-top:20px">
															<h1>Application Status</h1>
															<? if($rootModel->status == 2){ ?>
																<button class="btn btn-warning">
																	
																	<h3>
																		Pending
																	</h3>
															</button>
															<? }?>
															<? if($rootModel->status == 3){ ?>
																<button class="btn btn-success">
																	
																	<h3>
																		Approved
																	</h3>
															</button>
															<? }?>
															<? if($rootModel->status == 4){ ?>
																<button class="btn btn-danger">
																	<h3>
																		Declined
																	</h3>
																	
															</button>
															<? }?>
															
											 
														</div>
											
												
											
								</div>
							<? }?>
							
							<? foreach($fileModel as $fileKey => $fileValue){?>			
							<div class="row" style="margin-top:20px">
								<div class="col-md-12 paymenttable">
									<h5 style="text-align: center;">Payments For File Number ( <?=$fileValue->file_number?>)</h5>
									<table class="table table-striped ">
										<tr>
											<th>Receipt No</th>
											<th>Payment For</th>
											<th>Date Of Payment</th>
											<td></td>
										</tr>
										
										<tr>
										<? foreach($fileValue->payments as $key => $value){ ?>
											<td><?= $value->receit_id; ?></td>
											<td><?= $value->payment_for; ?></td>
											<td><?= $value->payment_date; ?></td>
											<td>
												<?
													$view = Url::to(['applicants/viewpayment','id'=>$value->id]);
																					   
													$delete = Url::to(['applicants/deletepayment','id'=>$value->id]);						
												?>
												
												<a href="<?= $view;?>"> View</a>
												|
												<a href="<?= $delete;?>"> Delete</a>
											
											</td>
											
										<? }?>
										</tr>
									</table>
								
								</div>
							</div>
							<? }?>
							
						
								
							
						</div>
							
								
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
