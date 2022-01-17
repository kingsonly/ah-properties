<?
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

<style>
	
	.margin-top-for-shop-button{
		margin-top: 15px;
	}
</style>
<div class="row" >
		<? if($model != null){?>
		<div class="col-md-12 form-area" style="padding:20p" >

			<div class="box-label">Payments</div>


			<div class="row">
				<div class="col-md-12">
						<table class="table table-striped ">
										<tr>
											<th>Receipt No</th>
											<th>Payment For</th>
											<th>Date Of Payment</th>
											<td></td>
										</tr>
										<? foreach($FileModel->payments as $key => $value){ ?>
										<tr>
										
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
											
										
										</tr>
							<? }?>
									</table>
							
				
				</div>
				
				
									

			</div>

		</div>
		<? }else{?>
				<div class="col-md-12 form-area" >

			<div class="box-label">Payments </div>


			<div class="row">
				<div class="col-md-12" style="padding-top: 60px;padding-bottom: 60px;text-align: center;">
						No Payments
				</div>
				
													

			</div>

		</div>
		<?} ?>

	</div>

