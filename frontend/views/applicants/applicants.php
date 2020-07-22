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
</style>

						
						<div class="container ">
<!--							form content goes here-->
							
							
							
							
							<div class="row" style="margin-top:100px;text-align:center">
								
								<div class="col-md-12" style="text-align:center">
									<ul class="nav nav-tabs">
									  <li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#all">All Applicant</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#approved">Approved</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#declined">Declined</a>
									  </li>
									
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#pending">Pennding</a>
									  </li>
									</ul>

									<!-- Tab panes -->
									<div class="tab-content">
									  <div class="tab-pane active container" id="all">
										<table id="table_all" class="display">
										<thead>
											<tr>
												<th>Status</th>
												<th>Id</th>
												<th>Name</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<? if(count($model) > 0){?>
														<? foreach($model as $allKey => $allValue){?>
											<tr>
												<td>
													<? if($allValue->status == 2){?>
													<button class="btn btn-warning">Pending</button>
													<? }?>
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Approved</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-danger">Declined</button>
													
													<? }?>
													
												</td>
												<td><?= $allValue->applicant_id;?></td>
												<td><?= $allValue->last_name.' '.$allValue->first_name.' '.$allValue->middle_name?></td>
												<td >
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													|
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<button class="btn btn-primary">Start Verification</button>
													<? }?>
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Assing A Space</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-default">Declined</button>
													
													<? }?>
												</td>
											</tr>
											
											<?}?>
													<? }else{?>
														<tr>
														<td colspan="5"> </td>
													</tr>
													<? }?>
											
										</tbody>
									</table>
										</div>
										
										
									  <div class="tab-pane container" id="approved">
										 
			
										  <table id="table_approved" class="display">
										<thead>
											<tr>
												<th>Status</th>
												<th>Id</th>
												<th>Name</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<? if(count($modelApproved) > 0){?>
													<? foreach($modelApproved as $allKey => $allValue){?>
											<tr>
												<td>
													<? if($allValue->status == 2){?>
													<button class="btn btn-warning">Pending</button>
													<? }?>
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Approved</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-danger">Declined</button>
													
													<? }?>
													
												</td>
												<td><?= $allValue->applicant_id;?></td>
												<td><?= $allValue->last_name.' '.$allValue->first_name.' '.$allValue->middle_name?></td>
												<td >
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													|
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<button class="btn btn-primary">Start Verification</button>
													<? }?>
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Assing A Space</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-default">Declined</button>
													
													<? }?>
												</td>
											</tr>
											
											<?}?>
													<? }else{?>
														<tr>
														<td colspan="5"> </td>
													</tr>
													<? }?>
											
										</tbody>
									</table>
										
										</div>
										
										
									  <div class="tab-pane container" id="declined">
										
			
												<table id="table_declined" class="display">
										<thead>
											<tr>
												<th>Status</th>
												<th>Id</th>
												<th>Name</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<? if(count($modelDeclined) > 0){?>
													<? foreach($modelDeclined as $allKey => $allValue){?>
											<tr>
												<td>
													<? if($allValue->status == 2){?>
													<button class="btn btn-warning">Pending</button>
													<? }?>
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Approved</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-danger">Declined</button>
													
													<? }?>
													
												</td>
												<td><?= $allValue->applicant_id;?></td>
												<td><?= $allValue->last_name.' '.$allValue->first_name.' '.$allValue->middle_name?></td>
												<td >
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													|
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<button class="btn btn-primary">Start Verification</button>
													<? }?>
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Assing A Space</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-default">Declined</button>
													
													<? }?>
												</td>
											</tr>
											
											<?}?>
													<? }else{?>
													<tr>
														<td colspan="5"> </td>
													</tr>
													<? }?>
											
										</tbody>
									</table>
										</div>
										
										
									  <div class="tab-pane container" id="pending">
												<table id="table_pending" class="display">
										<thead>
											<tr>
												<th>Status</th>
												<th>Id</th>
												<th>Name</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											
											<? if(count($modelPending) > 0){?>
													<? foreach($modelPending as $allKey => $allValue){?>
											<tr>
												<td>
													<? if($allValue->status == 2){?>
													<button class="btn btn-warning">Pending</button>
													<? }?>
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Approved</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-danger">Declined</button>
													
													<? }?>
													
												</td>
												<td><?= $allValue->applicant_id;?></td>
												<td><?= $allValue->last_name.' '.$allValue->first_name.' '.$allValue->middle_name?></td>
												<td >
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													|
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<button class="btn btn-primary">Start Verification</button>
													<? }?>
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Assing A Space</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-default">Declined</button>
													
													<? }?>
												</td>
											</tr>
											
											<?}?>
													<? }else{?>
													<tr>
														<td colspan="5"> </td>
													</tr>
													<? }?>
											
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
    $('#table_declined').DataTable();
} );

$(document).ready( function () {
    $('#table_pending').DataTable();
} );


JS;
 
$this->registerJs($biodataform);
?>
