<div class="row" >

		<div class="col-md-12 form-area" >

			<div class="box-label">Invoice </div>


			<div class="row">
				<div class="col-md-12">
					<table id="table_pending" class="table">
						<thead>
							<tr>
								<th>Status</th>
								<th>Invoice no</th>
								<th>amount</th>
								<th>Paid</th>
								<th>View</th>
								<th>Print view</th>
							</tr>
						</thead>
						<tbody>
							<?foreach($model as $key => $value){?>
							<tr>
								
								<td>
									
									<? if($value->payment_status == 1){?>
									<button class="btn btn-success">Paid</button>
									<? }elseif($value->payment_status == 0 &&  date('Y-m-d') >= $value->due_date){?>
										<button class="btn btn-danger">Over DUe</button>
									<? }else{?>
										<button class="btn btn-warning">Pending</button>
									<? }?>
								</td>
								<td><?= $value->invoice_number; ?></td>
								<td><?= $value->amount; ?></td>
								<td><?= $value->sumpayment == null? 0 : $value->sumpayment; ?></td>
								<td>view</td>
								<td>print view</td>
							</tr>
							<?}?>
						</tbody>
					</table>
				
				</div>
			
													

			</div>

		</div>

	</div>

<?
	
	$biodataform = <<<JS
	

	$(document).ready( function () {
		$('#table_pending').DataTable();
	} );


JS;
 
$this->registerJs($biodataform);
?>

