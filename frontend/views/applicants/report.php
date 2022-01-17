<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Config;


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
	.active{
		background-color: #fff !important;
	}
	.active a{
		color:#56ABE9 !important;
	}
	.tab-content{
		padding-top: 40px !important;
	}
</style>

						
						<div class="container ">
<!--							form content goes here-->
							
							
							
							
							<div class="row" style="margin-top:100px;text-align:center">
								<h3 style="text-align:center;width:100%"> Kafe Market Report</h3>
								
								<div class="col-md-12" style="text-align:center">
									<table id="table_all" class="table table-striped">
										<thead>
											<tr>
												<th>SN</th>
												<th>File Number</th>
												<th>Name</th>
												<th>Shop Type / Size</th>
												<th>Amount Paid</th>
												<th>Shop Price</th>
												<th>Payment %</th>
												<th>Balance</th>	
											</tr>
										</thead>
										<tbody>
											<? if(count($model) > 0){ $i = 1;?>
											<? foreach($model as $allKey => $allValue){
												if($allValue->invoice->sumpayment > 0){
											?>
											<tr>
												
												<td>
													<?= $i;?>
												</td>
												
												<td>
													<?= $allValue->file->file_number; ?>
												</td>
												
												<td>
													
													<?= $allValue->file->applicantid->applicant_type == 1?$allValue->file->applicantid->individual->fullname:$allValue->file->applicantid->organization->organization_name; ?>
													
												</td>
												
												<td>
													<?= $allValue->shop->space->name; ?>/
													(<?= Config::getSpaceSize($allValue->shop->space->name,$allValue->shop->type->name);?>)
													
												</td>
												
												<td>
													<?= number_format($allValue->invoice->sumpayment); ?>
													
													
												</td>
												
												<td>
													
													<?= number_format($allValue->shop->price); ?>
												</td>
												
												<td>
													<?= $allValue->invoice->sumpayment / $allValue->shop->price *100; ?> %
												</td>
												<? $balance = $allValue->shop->price - $allValue->invoice->sumpayment ; ?>
												<td class="<?= $balance == 0 ?'text-success':'text-danger'?>">
													
													<?= $balance == 0 ?'Paid':number_format($balance); ?>
												</td>
												
												
												
												
											</tr>
											
											<? $i++; }}?>
													<? }else{?>
														<tr>
														<td colspan="3"> </td>
													</tr>
													<? }?>
											<tr>
												<td style="text-align:right" colspan="4" class="text-primary">Total Amount </td>
												<td style="text-align:right"  colspan="4" class="text-primary">
												<?= number_format($getInvoiceSum); ?>
												</td>
											</tr>
											
											<tr>
												<td style="text-align:right"  colspan="4" class="text-success">Total Paid</td>
												<td style="text-align:right" colspan="4" class="text-success">
													
													<?= number_format($getPayment); ?>
												</td>
											</tr>
											
											<tr>
												<td style="text-align:right"  colspan="4" class="text-danger">Total Balance</td>
												<td style="text-align:right"  colspan="4" class="text-danger"><? $finalBalance = $getInvoiceSum - $getPayment;?>
													<?= number_format($finalBalance); ?>
												</td>
											</tr>
											
										</tbody>
									</table>
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

$(document).ready( function () {
    $('#table_all').DataTable();
} );

$(document).ready( function () {
    $('#table_approved').DataTable();
} );

$(document).ready( function () {
    $('#table_incomplete').DataTable();
} );

$(document).ready( function () {
    $('#table_declined').DataTable();
} );

$(document).ready( function () {
    $('#table_pending').DataTable();
} );


JS;
 
$this->registerJs($biodataform);
?>


