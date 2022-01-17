<?
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

<style>
	
	.margin-top-for-shop-button{
		margin-top: 15px;
	}
	.display_image2{
		width: inherit;
	}
	.aligncenter{ text-align: center}
	.aligncenter a{ 
		width: inherit;
		display: inline-block;
	}
</style>
<? if (\Yii::$app->user->can('giveletter')) { ?>
<? if(count($FileModel->paymentstatus) > 0){?>
					<div class="container-fluid" style="margin-top:20px">
			<div class="container">
				<div class="row  ">
<!--
					<div class="col-md-3 header-text-color">
						<div class="side-menu-container">
						<ul class="list-group list-group-flush" id="sidemenu">
							<li class="list-group-item active" id="bioactive" >
								<a class="nav-link header-text-color" href="#">applicant type</a>
							</li>
							
							
							</ul>
						</div>
						 
					</div>
-->
					<div id="renderapplicationform" class="col-md-12">
							<div class="row">
							<div class="col-md-12 form-area" >

								<div class="box-label">Loading </div>


									<div class="row">
										<div class="col-md-12" style="padding-top: 60px;padding-bottom: 60px;text-align: center;">
											<h1>Loading Please Wait</h1>
										</div>
				
													

									</div>

							</div>
						</div>
					</div>
				</div>
				
			</div>
		  
		</div> 
			<? }else{?>
					
			

<div class="row" >
		
				<div class="col-md-12 form-area" >
			
			<div class="box-label">Letters </div>
			<? if (\Yii::$app->user->can('giveletter')) { ?>

			<? if($FileModel->allocation != null or count($FileModel->payments) > 1){?>
			<div class="row">
				<? if(count($FileModel->payments) > 1 && $FileModel->allocation->status != 1 or count($FileModel->payments) > 2 && $FileModel->allocation->status == 1 ){ ?>
					<div class="col-md-4 aligncenter">
						
						<? $provisionalletter = Url::to(['applicants/provisionalletter','id' => $FileModel->id])?>
						
						<a href="<?= $provisionalletter;?>" target="_blank">
						<?= Html::img('@web/'.'img/provisionalletterplaceholder.png', ['alt' => 'My logo','class'=>'display_image2']) ?>
						<h4> Provisional Letter</h4>
						</a>
					</div>
				
				<? } ?>
				
				<? if($FileModel->allocation->status == 1){ ?>
				<? 
					   $allocationletter = Url::to(['applicants/allocationletter','id' => $FileModel->id]);?>
					<div class="col-md-4 aligncenter">
						<a href="<?= $allocationletter;?>" target="_blank">
						<?= Html::img('@web/'.'img/allocationletterplaceholder.png', ['alt' => 'My logo','class'=>'display_image2']) ?>
						<h4> Allocation Letter</h4>
						</a>
					</div>
				
				<? } ?>
				
				<? if(count($FileModel->payments) > 1){ ?>
				<? $acceptanceletter = Url::to(['applicants/acceptanceletter','id' => $FileModel->id])?>
					<div class="col-md-4 aligncenter">
						<a href="<?= $acceptanceletter;?>" target="_blank">
						<?= Html::img('@web/'.'img/acceptanceletterplaceholder.png', ['alt' => 'My logo','class'=>'display_image2']) ?>
						<h4>Acceptance Letter</h4>
						</a>
					</div>
				
				<? } ?>
				
				<? if(count($FileModel->payments) ==  1){ ?>
					<div class="col-md-12" style="padding-top: 60px;padding-bottom: 60px;text-align: center;">
						No Payments
					</div>
				
				<? } ?>
				
				
													

			</div>
			<? }else{?>
					<div class="row">
				<div class="col-md-12" style="padding-top: 60px;padding-bottom: 60px;text-align: center;">
						No Letters Available
				</div>
				
													

			</div>
			<? }?>
			<? }?>
		</div>
		

	</div>

<? }?>
<? }else{?>
	<div class="row">
		<div class="col-md-12 form-area">
				<div class="row">
				<div class="col-md-12" style="padding-top: 60px;padding-bottom: 60px;text-align: center;">
						You can't <strong>Issue Out</strong> Letters
				</div>
				
													

			</div>
		</div>
	</div>
<? }?>


<?
	
	
	
// general verification steps 

	$totalPaymentStatus = count($FileModel->paymentstatus);
	$stepPaymentVerification = Url::to(['applicants/letterpaymentverification','id' => $FileModel->id]);
	
	$createCustomerFormJs = <<<JS
	if('$totalPaymentStatus' > 0){
		$(document).find('#renderapplicationform').load('$stepPaymentVerification');
	}
	
	

JS;
 
$this->registerJs($createCustomerFormJs);
?>

