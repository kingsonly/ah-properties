<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<style>
	.help-block{
	color: red !important;
}
	.list-group-item a{
		text-transform: uppercase;
	}
	.contentholder{
		margin-top: 30px;
		margin-bottom: 10px;
	}
	
</style>
<? if (\Yii::$app->user->can('allocate')) { ?>
<? if($rootModel->applicant_type == 1){ ?>			
						
						<div class="container ">
<!--							form content goes here-->
							
							
							
							
							<div class="row" style="margin-top:20px">
											<div class="col-md-9 ">
												
												
												
												
													<div class="row ">
														<div class="col-md-12 form-area" style="margin-top:20px">
															<div class="box-label">Bio Data for file (<?= $model->file_number?>) </div>
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
							
						
								
							
						</div>
								<?}?>
<? if($rootModel->applicant_type == 2){ ?>					
<div class="container ">
<!--							form content goes here-->					
			
	<div class="row" style="margin-top:20px">

		<div class="col-md-12 ">
			<div class="row ">
				<div class="col-md-12 form-area" style="margin-top:20px">
					<div class="box-label">Organization Details for file (<?= $model->file_number?>) </div>

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


	
	
</div>
<? }?>

								

			<div class="container contentholder">
				<div class="row  ">
					<div class="col-md-3 header-text-color">
						<div class="side-menu-container">
						<ul class="list-group list-group-flush" id="sidemenu">
							<li class="list-group-item active" id="booking" >
								<a class="nav-link header-text-color" href="#">Space Booking</a>
							</li>
							<li class="list-group-item " id="invoice" >
								<a class="nav-link header-text-color" href="#">Invoice</a>
							</li>
							
							<li class="list-group-item " id="payments" >
								<a class="nav-link header-text-color" href="#">Payments</a>
							</li>
							<? if (\Yii::$app->user->can('giveletter')) { ?>
							<li class="list-group-item " id="letter" >
								<a class="nav-link header-text-color" href="#">Offer Letter</a>
							</li>
							<? } ?>
							
							</ul>
						</div>
						 
					</div>
					<div id="renderapplicationform" class="col-md-9">
						
					</div>
				</div>
				
			</div>
		  
		
								
	
								
								<?
	
	$spacebooking = Url::to(['applicants/spacebooking','id' => $model->id]);
	$invoice = Url::to(['applicants/invoice','id' => $model->id]);
	$payment = Url::to(['applicants/folderpayments','id' => $model->id]);
	$folderLetters = Url::to(['applicants/folderletters','id' => $model->id]);
	
	$biodataform = <<<JS
	$(document).find('#renderapplicationform').load('$spacebooking');
	
	$("#invoice").on("click", function() {
		$(document).find('.list-group-item').removeClass('active')
		$(this).addClass('active')
		$(document).find('#renderapplicationform').load('$invoice');
	
	})
	
	$("#booking").on("click", function() {
		$(document).find('.list-group-item').removeClass('active')
		$(this).addClass('active')
		$(document).find('#renderapplicationform').load('$spacebooking');
	
	})
	
	$("#payments").on("click", function() {
		$(document).find('.list-group-item').removeClass('active')
		$(this).addClass('active')
		$(document).find('#renderapplicationform').load('$payment');
	
	})
	
	$("#letter").on("click", function() {
		$(document).find('.list-group-item').removeClass('active')
		$(this).addClass('active')
		$(document).find('#renderapplicationform').load('$folderLetters');
	
	})
	

	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});


JS;
 
$this->registerJs($biodataform);
?>

<? }else{ ?>
								
	<div style="width: 80%;
margin: 0 auto;
text-align: center;
padding-top: 200px;"> Sorry you cant view the content of this page </div>
<? } ?>
