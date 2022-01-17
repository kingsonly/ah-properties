<?
 use yii\helpers\Url;
?>
<style>
	.container{
		padding-top: 20px;
	}
</style>
<div class="container">
<h1>Exemption Batch</h1>
	<table id="table_all" class="display">
	<thead>
		<tr>
			
			<th>Id</th>
			<th>Batch No</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<? if(!empty($model)){?>
					<? $i =1; foreach($model as $allKey => $allValue){?>
		<tr>
			<td><?= $i;?></td>
			<td><?= $allValue->bathch_no;?></td>
			<td><?= $allValue->status == 0?'Pending':'Approved';?></td>
			<td>
				<a href="<?= Url::to(['applicants/viewbatch','id' => $allValue->id ])?>">View</a> |
				<? if($allValue->status == 0){?>
				<a href="<?= Url::to(['applicants/approvebatch','id' => $allValue->id ])?>">Approve</a>
				<? } ?>
			</td>
		</tr>

		<? $i++;}?>
				<? }else{?>
					<tr>
					<td colspan="5">No Exeption List </td>
				</tr>
				<? }?>

	</tbody>
</table>


</div>

								<?
	
	
	$biodataform = <<<JS
	
	

$(document).ready( function () {
    $('#table_all').DataTable();
} );



JS;
 
$this->registerJs($biodataform);
?>