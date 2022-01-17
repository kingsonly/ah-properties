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
										<a class="nav-link" data-toggle="tab" href="#incomplete">Incomplete</a>
									  </li>
									
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#pending">Pending</a>
									  </li>
									
										<li class="" style="position: absolute;right: 0;">
										<span class="text-success">Allocated 
											<span class="bg-success" style="width: 20px;display: inline-block;height: 10px;"></span>
										</span>
											
										<span class="text-warning">Pending 
											<span class="bg-warning" style="width: 20px;display: inline-block;height: 10px;"></span>
										</span>
											
										<span class="text-danger">Not Allocated 
											<span class="bg-danger" style="width: 20px;display: inline-block;height: 10px;"></span>
										</span>
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
													
													<? if($allValue->status < 2){?>
													<button class="btn btn-info">Incomplete</button>
													<? }?>
													
													<? if($allValue->status == 3){?>
													<button class="btn btn-success">Approved</button>
													<? }?>
													<? if($allValue->status == 4){?>
													<button class="btn btn-danger">Declined</button>
													
													<? }?>
													
												</td>
												<td>
													<?
													foreach($allValue->filenumber as $fileNumber){
														if($fileNumber->allocation == null){ ?>
															<b class="text-danger">
																<?= $fileNumber->file_number?>
															</b> 
															<br>
														<? }else{
															if($fileNumber->allocation->status == 1){ ?>
																<b class="text-success">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
															<? }else{?>
																<b class="text-warning">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
																
															<?}
															 
														}
														
													}
													?>
												</td>
												<td>
													<? if($allValue->stage_status > 2){ ?>
													<? if($allValue->applicant_type == 1){ 
															echo $allValue->individual->last_name.' '.$allValue->individual->first_name.' '.$allValue->individual->middle_name;
														}else{
															echo $allValue->organization->organization_name;
														} }else{
														echo 'no name';
													}?>
													
												</td>
												<td >
													<? if($allValue->status < 2){?>
													<a href="<?= Url::to(['applicants/','id' => $allValue->id])?>"> Continue</a>
													<?}else{?>
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													<?}?>
													
													<? if (\Yii::$app->user->can('update')) { ?>
													|
													
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
													<?}?>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<a href="<?= Url::to(['applicants/statverification','id'=>$allValue->id]);?>"><button class="btn btn-primary">Start Verification</button>
														</a>
													<? }else{?>
														<button class="btn btn-default">Start Verification (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 3){?>
													<? if (\Yii::$app->user->can('allocate')) { ?>
													<a href="<?= Url::to(['applicants/applicantfileview','id' => $allValue->id])?>"> <button class="btn btn-success">View File</button></a>
													
													<? }else{?>
													<button class="btn btn-default">View File (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 4){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<button class="btn btn-danger">Declined</button>
													
													<? }else{?>
													<button class="btn btn-danger">Declined (Restricted)</button>
													<? }?>
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
													
													<? if($allValue->status < 2){?>
													<button class="btn btn-info">Incomplete</button>
													<? }?>
													
													
													
												</td>
												<td>
													<?
													foreach($allValue->filenumber as $fileNumber){
														if($fileNumber->allocation == null){ ?>
															<b class="text-danger">
																<?= $fileNumber->file_number?>
															</b> 
															<br>
														<? }else{
															if($fileNumber->allocation->status == 1){ ?>
																<b class="text-success">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
															<? }else{?>
																<b class="text-warning">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
																
															<?}
															 
														}
														
													}
													?>
												</td>
												<td>
													<? if($allValue->stage_status > 2){ ?>
													<? if($allValue->applicant_type == 1){ 
															echo $allValue->individual->last_name.' '.$allValue->individual->first_name.' '.$allValue->individual->middle_name;
														}else{
															echo $allValue->organization->organization_name;
														} ?>
													<?}else{
														echo 'no name';
													}?>
													
												</td>
												<td >
													<? if($allValue->status == 0){?>
													<a href="<?= Url::to(['applicants/','id' => $allValue->id])?>"> Continue</a>
													<?}else{?>
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													<?}?>
													
													<? if (\Yii::$app->user->can('update')) { ?>
													|
													
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
													<?}?>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<a href="<?= Url::to(['applicants/statverification','id'=>$allValue->id]);?>"><button class="btn btn-primary">Start Verification</button>
														</a>
													<? }else{?>
														<button class="btn btn-default">Start Verification (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 3){?>
													<? if (\Yii::$app->user->can('allocate')) { ?>
													<a href="<?= Url::to(['applicants/applicantfileview','id' => $allValue->id])?>"> <button class="btn btn-success">View File</button></a>
													
													<? }else{?>
													<button class="btn btn-default">View File (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 4){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<button class="btn btn-danger">Declined</button>
													
													<? }else{?>
													<button class="btn btn-danger">Declined (Restricted)</button>
													<? }?>
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
													<? if($allValue->status < 2){?>
													<button class="btn btn-info">Incomplete</button>
													<? }?>
													
												</td>
												<td>
													<?
													foreach($allValue->filenumber as $fileNumber){
														if($fileNumber->allocation == null){ ?>
															<b class="text-danger">
																<?= $fileNumber->file_number?>
															</b> 
															<br>
														<? }else{
															if($fileNumber->allocation->status == 1){ ?>
																<b class="text-success">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
															<? }else{?>
																<b class="text-warning">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
																
															<?}
															 
														}
														
													}
													?>
												</td>
												<td>
													<? if($allValue->stage_status > 2){ ?>
													<? if($allValue->applicant_type == 1){ 
															echo $allValue->individual->last_name.' '.$allValue->individual->first_name.' '.$allValue->individual->middle_name;
														}else{
															echo $allValue->organization->organization_name;
														} ?>
													<?}else{
														echo 'no name';
													}?>
													
												</td>
												<td >
													<? if($allValue->status == 0){?>
													<a href="<?= Url::to(['applicants/','id' => $allValue->id])?>"> Continue</a>
													<?}else{?>
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													<?}?>
													<? if (\Yii::$app->user->can('update')) { ?>
													|
													
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
													<?}?>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<a href="<?= Url::to(['applicants/statverification','id'=>$allValue->id]);?>"><button class="btn btn-primary">Start Verification</button>
														</a>
													<? }else{?>
														<button class="btn btn-default">Start Verification (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 3){?>
													<? if (\Yii::$app->user->can('allocate')) { ?>
													<a href="<?= Url::to(['applicants/applicantfileview','id' => $allValue->id])?>"> <button class="btn btn-success">View File</button></a>
													
													<? }else{?>
													<button class="btn btn-default">View File (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 4){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<button class="btn btn-danger">Declined</button>
													
													<? }else{?>
													<button class="btn btn-danger">Declined (Restricted)</button>
													<? }?>
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
										
									<div class="tab-pane container" id="incomplete">
										 
			
										  <table id="table_incomplete" class="display">
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
											<? if(count($modelIncomplete) > 0){?>
													<? foreach($modelIncomplete as $allKey => $allValue){?>
											<tr>
												<td>
													<button class="btn btn-info">Incomplete</button>
													
												</td>
												<td>
													<?
													foreach($allValue->filenumber as $fileNumber){
														if($fileNumber->allocation == null){ ?>
															<b class="text-danger">
																<?= $fileNumber->file_number?>
															</b> 
															<br>
														<? }else{
															if($fileNumber->allocation->status == 1){ ?>
																<b class="text-success">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
															<? }else{?>
																<b class="text-warning">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
																
															<?}
															 
														}
														
													}
													?>
												</td>
												<td>
													<? if($allValue->stage_status >= 2){ ?>
													<? if($allValue->applicant_type == 1){ 
															echo $allValue->individual->last_name.' '.$allValue->individual->first_name.' '.$allValue->individual->middle_name;
														}else{
															echo $allValue->organization->organization_name;
														} ?>
													<?}else{
														echo 'no name';
													}?>
													
												</td>
												<td >
													<? if($allValue->status < 2){?>
													<a href="<?= Url::to(['applicants/','id' => $allValue->id])?>"> Continue</a>
													<?}else{?>
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													<?}?>
													
													<? if (\Yii::$app->user->can('update')) { ?>
													|
													
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
													<?}?>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<a href="<?= Url::to(['applicants/statverification','id'=>$allValue->id]);?>"><button class="btn btn-primary">Start Verification</button>
														</a>
													<? }else{?>
														<button class="btn btn-default">Start Verification (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 3){?>
													<? if (\Yii::$app->user->can('allocate')) { ?>
													<a href="<?= Url::to(['applicants/applicantfileview','id' => $allValue->id])?>"> <button class="btn btn-success">View File</button></a>
													
													<? }else{?>
													<button class="btn btn-default">View File (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 4){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<button class="btn btn-danger">Declined</button>
													
													<? }else{?>
													<button class="btn btn-danger">Declined (Restricted)</button>
													<? }?>
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
													<? if($allValue->status < 2){?>
													<button class="btn btn-info">Incomplete</button>
													<? }?>
													
												</td>
												<td>
													<?
													foreach($allValue->filenumber as $fileNumber){
														if($fileNumber->allocation == null){ ?>
															<b class="text-danger">
																<?= $fileNumber->file_number?>
															</b> 
															<br>
														<? }else{
															if($fileNumber->allocation->status == 1){ ?>
																<b class="text-success">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
															<? }else{?>
																<b class="text-warning">
																<?= $fileNumber->file_number?> (<?= $fileNumber->allocation->shop->name?>)
																</b> 
																<br>
																
															<?}
															 
														}
														
													}
													?>
												</td>
												<td>
													<? if($allValue->applicant_type == 1){ 
															if($allValue->stage_status > 1){
																echo $allValue->individual->last_name.' '.$allValue->individual->first_name.' '.$allValue->individual->middle_name;
															}else{
																echo 'No Name';
															}
														}else{
															echo $allValue->organization->organization_name;
														} ?>
													
												</td>
												<td >
													<? if($allValue->status == 0){?>
													<a href="<?= Url::to(['applicants/','id' => $allValue->id])?>"> Continue</a>
													<?}else{?>
													<a href="<?= Url::to(['applicants/view','id' => $allValue->id])?>"> View</a>
													<?}?>
													<? if (\Yii::$app->user->can('update')) { ?>
													|
													
													<a href="<?= Url::to(['applicants/delete','id' => $allValue->id])?>"> Delete</a>
													<?}?>
												
												</td>
												<td>
													<? if($allValue->status == 2){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<a href="<?= Url::to(['applicants/statverification','id'=>$allValue->id]);?>"><button class="btn btn-primary">Start Verification</button>
														</a>
													<? }else{?>
														<button class="btn btn-default">Start Verification (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 3){?>
													<? if (\Yii::$app->user->can('allocate')) { ?>
													<a href="<?= Url::to(['applicants/applicantfileview','id' => $allValue->id])?>"> <button class="btn btn-success">View File</button></a>
													
													<? }else{?>
													<button class="btn btn-default">View File (Restricted)</button>
													<? }?>
													<? }?>
													<? if($allValue->status == 4){?>
													<? if (\Yii::$app->user->can('verify')) { ?>
													<button class="btn btn-danger">Declined</button>
													
													<? }else{?>
													<button class="btn btn-danger">Declined (Restricted)</button>
													<? }?>
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


