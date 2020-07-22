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
	.payment_image{
		width: 150px;
		height: 300px;
	}
</style>

						
						<div class="container ">
<!--							form content goes here-->
							
							<div class="row" style="margin-top:20px">
											<div class="col-md-9 ">
												
												
												
												
													<div class="row ">
														<div class="col-md-12 form-area" style="margin-top:20px">
															<div class="box-label">Payment </div>
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
																	<h6 class="header-text-color">Surname</h6>
																	<h5><?= $modelBio->last_name; ?> <h5>
																</div>
																
														    </div>
															
															<div class="row" style="margin-top:40px;">
																<div class="col-md-9 " >
																	
																	<div class="row">
																		<div class="col-md-4">
																			<h6 class="header-text-color">Payment Id</h6>
																			<h5><?= $modelKdmPayment->payment_id; ?></h5>
																		</div>
																		<div class="col-md-4">
																			<h6 class="header-text-color">Bill Reff</h6>
																			<h5><?= $modelKdmPayment->bill_reff; ?></h5>
																		</div>
																		<div class="col-md-4">
																			<h6 class="header-text-color">Payment Mode</h6>
																			<h5><?= $modelKdmPayment->payment_mode; ?></h5>
																		</div>
																	</div>
																	
																	<div class="row">
																		<div class="col-md-4">
																			<h6 class="header-text-color">Bank Branch</h6>
																			<h5><?= $modelKdmPayment->bank_branch; ?></h5>
																		</div>
																		<div class="col-md-4">
																			<h6 class="header-text-color">Payment Date</h6>
																			<h5><?= $modelKdmPayment->payment_date; ?></h5>
																		</div>
																		<div class="col-md-4">
																			<h6 class="header-text-color">Receipt Date</h6>
																			<h5><?= $modelKdmPayment->receipt_date; ?></h5>
																		</div>
																	</div>
																	
																	<div class="row">
																		<div class="col-md-4">
																			<h6 class="header-text-color">Teller Number</h6>
																			<h5><?= $modelKdmPayment->teller_number; ?></h5>
																		</div>
																		<div class="col-md-4">
																			<h6 class="header-text-color">Amount</h6>
																			<h5><?= $modelKdmPayment->amount; ?></h5>
																		</div>
																		<div class="col-md-4">
																			<h6 class="header-text-color">Amount In Words</h6>
																			<h5><?= $modelKdmPayment->amount_word; ?></h5>
																		</div>
																	</div>
																	
																	
																	<div class="row">
																		<div class="col-md-4">
																			<h6 class="header-text-color">Payment For</h6>
																			<h5><?= $modelKdmPayment->payment_for; ?></h5>
																		</div>
																		<div class="col-md-4">
																			<h6 class="header-text-color">Receipt Id</h6>
																			<h5><?= $modelKdmPayment->receit_id ; ?></h5>
																		</div>
																		<div class="col-md-4">
																			<h6 class="header-text-color">Status</h6>
																			
																				<? if($modelKdmPayment->status == 1){?>
																					<h5 class="text-warning">Pending</h5>
																				<? }?>
																				
																				<? if($modelKdmPayment->status == 2){?>
																				<h5 class="text-success">Approved</h5>
																				<? }?>
																				
																			
																			
																			
																		</div>
																	</div>
																</div>
																
																<div class="col-md-3 " >
																	<h6 class="header-text-color">Proof Of Payment</h6>
																	<?= Html::img('@web/'.$modelKdmPayment->image, ['alt' => 'My logo','class'=>'payment_image']) ?>
																	
																</div>
																
																
																
														
																
														    </div>
															
															
														</div>
														
														
														
													</div>
													
													
												<a href="<?= Url::to(['applicants/receipt','id' => $modelKdmPayment->id])?>" target="_blank"><button class="btn btn-primary" style="width: 100%;margin-top: 10px;"> Print Receipt</button>
													</a>
												 
											</div>
											<div class="col-md-3 ">
												<?= Html::img('@web/'.$modelBio->image, ['alt' => 'My logo','class'=>'medium_image']) ?>
												<h4><?= $modelBio->applicant_id?></h4>
												
												
											</div>
												
											
								</div>
								
												
							
							
						
								
							
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
