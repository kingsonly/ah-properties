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

			<div class="box-label">Invoice (<?= $model->invoice_number?>)</div>


			<div class="row">
				<div class="col-md-3">
						<? if($model->payment_status == 1){?>
						<button class="btn btn-success">Paid (<?= $model->due_date?>)</button>
						<? }elseif($model->payment_status == 0 &&  date('Y-m-d') >= $model->due_date){?>
							<button class="btn btn-danger">Over DUe (<?= $model->due_date?>)</button>
						<? }else{?>
							<button class="btn btn-warning">Pending (<?= $model->due_date?>)</button>
						<? }?>
				
				</div>
				<div class="col-md-3">
					Amount Due <br>₦  <?= number_format($model->amount);?>
					
					
				</div>
				
				<div class="col-md-3">
					Amount Paid <br> ₦ <?= $model->sumpayment == null? 0 : number_format( $model->sumpayment); ?>
				</div>
				
				<div class="col-md-3">
					<? $sumpayment = $model->sumpayment == null? 0 : $model->sumpayment;
						$balance = $model->amount - $sumpayment;
					?>
					Balance <br> ₦ <?= number_format($balance); ?>
					
				</div>
				
				<div class="col-md-12 form-area" style="margin-top:20px">

			<div class="box-label">store </div>


			<div class="row">
				<div class="col-md-4">
					<h5> Space</h5>
				 <?= $model->shop->space->name;?>
				</div>
				<div class="col-md-4">
					<h5> Space Type</h5>
					<?= $model->shop->type->name;?>
				</div>
				
				<div class="col-md-4">
					<h5> Quadrant</h5>
					<?= $model->shop->quadrant->name;?>
				</div>
				
				<div class="col-md-4">
					<h5>Block</h5>
					<?= $model->shop->block->name;?>
				</div>
				<div class="col-md-4">
					<h5> Floor</h5>
					<?= $model->shop->floor->name;?>
				</div>
				
				<div class="col-md-4">
					<h5> Shop No</h5>
					<?= $model->shop->name;?>
				</div>
			
													

			</div>

		</div>
			
				<div class="col-md-6 margin-top-for-shop-button ">
					<?= Html::button('Make Payment', ['class' => 'btn btn-primary btn-lg  button-design','id' =>'proceed']) ?>
				</div>
				
				<div class="col-md-6 margin-top-for-shop-button">
					<a href="<?= Url::to(['applicants/invoiceprint','id' => $model->id]); ?>"  target="_blank">
					<?= Html::button('Print Invoice', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'proceed']) ?>
					</a>
				</div>
									

			</div>

		</div>
		<? }else{?>
				<div class="col-md-12 form-area" >

			<div class="box-label">Invoice </div>


			<div class="row">
				<div class="col-md-12" style="padding-top: 60px;padding-bottom: 60px;text-align: center;">
						No invoice
				</div>
				
													

			</div>

		</div>
		<?} ?>

	</div>

<?
if($model != null){
	$paymentUrl = Url::to(['applicants/filepaymentdata','id'=>$FileModel->id, 'invoice'=> $model->id]);
	$biodataform = <<<JS
	
	
	$("#proceed").on("click", function() {
		$(document).find('#renderapplicationform').load('$paymentUrl');
	
	})
	
	$(document).ready( function () {
		$('#table_pending').DataTable();
	} );


JS;
 
$this->registerJs($biodataform);
}
?>

