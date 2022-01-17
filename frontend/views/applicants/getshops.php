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

<?php if (Yii::$app->session->hasFlash('updateshops')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Updated!</h4>
         <?= Yii::$app->session->getFlash('updateshops') ?>
		
    </div>
<?php endif; ?>

						
						<div class="container ">
<!--							form content goes here-->
							
							
							
							
							<div class="row" style="margin-top:100px;text-align:center">
								
								<div class="col-md-12" style="text-align:center">
									<ul class="nav nav-tabs">
									  <li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#all">All Shops</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#approved">Allocated Shops</a>
									  </li>
									 
									</ul>

									<!-- Tab panes -->
									<div class="tab-content">
									  <div class="tab-pane active container" id="all">
										<table id="table_all" class="display">
										<thead>
											<tr>
												<th>SN</th>
												<th>Shop-No</th>
												<th>Space</th>
												<th>Type</th>
												<th>Quater</th>
												<th>Block</th>
												<th>Floor</th>
												<th>Price</th>
												<th>Reservation</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											
														<? $i=1;foreach($allShops as $allKey => $allValue){?>
											<tr>
												
												<td><?= $i;?></td>
												<td><?= $allValue->name;?></td>
												<td><?= $allValue->space->name;?></td>
												<td><?= $allValue->type->name;?></td>
												<td><?= $allValue->quadrant->name;?></td>
												<td><?= $allValue->block->name;?></td>
												<td><?= $allValue->floor->name;?></td>
												<td><?= $allValue->price;?></td>
												<td>
													<? if($allValue->reserved == 1){
															echo 'VIP';
														}elseif($allValue->reserved == 2){
															echo 'RESERVED';
														}else{
															echo 'REGULAR';
														} ;?>
												</td>
												<td>
												<a href="<?= Url::to(['applicants/updateshop','id' => $allValue->id ]);?>">
													<i class="fas fa-pencil-alt" alt="update"></i>
												</a>
												</td>
											</tr>
											
											<? $i++;}?>
													
											
										</tbody>
									</table>
										</div>
										
										
									  <div class="tab-pane container" id="approved">
										 
										<table id="table_approved" class="display">
										<thead>
											<tr>
												<th>SN</th>
												<th>Shop-No</th>
												<th>Space</th>
												<th>Type</th>
												<th>Quater</th>
												<th>Block</th>
												<th>Floor</th>
												<th>Price</th>
												<th>Reservation</th>
											</tr>
										</thead>
										<tbody>
											
														<? foreach($allocatedShops as $allKey => $allValue){?>
											<tr>
												
												<td></td>
												<td><?= $allValue->name;?></td>
												<td><?= $allValue->space->name;?></td>
												<td><?= $allValue->type->name;?></td>
												<td><?= $allValue->quadrant->name;?></td>
												<td><?= $allValue->block->name;?></td>
												<td><?= $allValue->floor->name;?></td>
												<td><?= $allValue->price;?></td>
												<td>
													<? if($allValue->reserved == 1){
															echo 'VIP';
														}elseif($allValue->reserved == 2){
															echo 'RESERVED';
														}else{
															echo 'REGULAR';
														} ;?>
												</td>
											</tr>
											
											<?}?>
													
											
										</tbody>
									</table>
										
										</div>
										
										
									</div>
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


