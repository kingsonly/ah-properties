<?
	use yii\helpers\Url;
?>
<div class="tab-content">
	
		<table id="table_all" class=" table display">
			<thead>
				<tr>
					<th>Status</th>
					<th>Reason</th>
					<th>Requested By</th>
					<th>Applicant</th>
					<th>Update section</th>
					<th>action</th>
					
				</tr>
			</thead>
			<tbody>


  
										
	<? if(count($model) > 0){?>
				<? foreach($model as $allKey => $allValue){?>
	<tr>
		<td>
			<? if($allValue->status == 1){?> Pending aproval <? }?>
			<? if($allValue->status == 2){?> Pending Update <? }?>
			<? if($allValue->status == 3){?> Updated <? }?>
			<? if($allValue->status == 4){?> Declined <? }?>

		</td>
		<td>
			<?= $allValue->comment ?>
		</td>
		<td>
			<?= $allValue->requester->fullname; ?>
		</td>
		
		<td>
			

		</td>
		<td>
			
		</td>
		<td>
			<button class="accept" data-requestid='<?= $allValue->id;?>'>Accept</button>
			<button class="decline" data-requestid='<?= $allValue->id;?>'>Decline</button>
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


<?
	$accept = Url::to(['applicants/processacceptrequest']);
	$decline = Url::to(['applicants/processdeclinerequest']);
	$biodataform = <<<JS
	

	
	$('.accept').on('click', function (e) {
	$(document).find('#actionbutton').hide()
	$(document).find('#loaders').show()
	toastr.info('Processing')
	
		 
    $.get('$accept'+'&id='+$(this).data('requestid'), function(data){
		if(data.status == 1){
			toastr.success('Approved')
		}else{
			toastr.danger('error')
		}
	});
		
	})

JS;
 
$this->registerJs($biodataform);
?>
