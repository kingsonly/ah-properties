<?
 use yii\helpers\Url;
 use yii\helpers\Html;
 use frontend\models\Config;
?>

<style>
	@page { size: A4;  margin:2cm;}
	
	* {
    -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
    color-adjust: exact !important;                 /*Firefox*/
}
	@media print { 
    .table .lightthings { 
        background-color: #D1AD6F !important; 
    } 
/*
		@page { margin: 0; } 
   body { margin: 1.6cm; } 
		
*/
		@page :footer {
        display: none
    }

    @page :header {
        display: none
    }
}
	@print {
    @page :footer {
        display: none
    }

    @page :header {
        display: none
    }
}
	
    td{
        
            font-size:18px;
    }
    .mytable td{
        padding: 0px ;
        padding-left: 20px ;
    }
	.lightthings{
		background-color: #D1AD6F !important; 
	}
	.medium_image3 {
    width: 150px;
	}
	.thead-dark{
		background: #ccc;
	}
	.span1{
		padding: 10px 20px;
	}
	.span2{
		padding: 3px;
		text-align: center;
		width: 200px;
		border-bottom: 2px dashed;
		display: inline-block;
	}
	
	.span3{
		padding: 3px;
		text-align: center;
		width: 300px;
		border-bottom: 2px solid;
		display: inline-block;
		height: 50px;
		
	}
</style>

<div class="container ">
	<div class="row">
		<div class="col-sm-12">
			<table class="table">
				<tr>
					<td style="width:20%"><?= Html::img('@web/img/KDMLOGO.png', ['alt' => 'My logo','class'=>'medium_image3']) ?></td>
					<td style="text-align:center">
						<h1 style="line-height: 1.1;">KAFE DISTRICT MARKET</h1>
						<h1 style="margin-bottom:18px;">APPROVAL SHEET</h1>
						
						<span class="span1" style="background:#000;color:#fff;font-size:25px;margin-top:10px;"><b>Exemption List</b></span>
					
					</td>
					<td style="text-align:right;width:20%"><?= Html::img('@web/img/AHLOGO.png', ['alt' => 'My logo','class'=>'medium_image3']) ?></td>
				</tr>
				<tr>
					<td colspan="2">Batch No: <span class="span2" style="display:inline-block"> <?= $exemptionBatch->bathch_no?></span></td>
					<td  style="text-align:right"><span class="span2">Date:  <?= $exemptionBatch->date_created?></span></td>
					
				</tr>
			</table>
			<? if(!empty($model)){?>
			
			<table class="table table-bordered">
				<thead class="thead-dark">
				<tr>
					<td>S/No</td>
					<td>File Number</td>
					<td>Name</td>
					<td>Shop/Space Type</td>
					<td>Status</td>
					
				</tr>
				</thead>
			<? $i = 1; foreach($model as $key =>$value){?>
				<? if(empty($value->exemption)){?>
				<tr>
					<td><?= $i;?></td>
					<td><?= $value->booking->file->file_number;?></td>
					<td><?= $value->booking->file->applicantid->applicant_type == 1?$value->booking->file->applicantid->individual->fullname:$value->booking->file->applicantid->organization->organization_name;?></td>
					<td><?= $value->booking->shop->name;?> / <?= $value->booking->shop->space->name;?> (<?= Config::getSpaceSize($value->booking->shop->space->name,$value->booking->shop->type->name);?>)</td>
					
					<td><?= $value->status == 0?'Pending':'Approved';?></td>
				</tr>
				
				
			
			<? $i++;}}}?>
				
			</table>
			<table class="table" style="border:0px !important;">
				<tr style="border:0px !important;"> 
					<td colspan="3" style="text-align:center ;border:0px !important;">
						Total Number: <span class="span2"><?= count($model)?></span>
					</td>
				</tr>
				
				
			</table>
			
			<a target="_blank" href="<?= Url::to(['applicants/allocatedreservedshopsprint','id'=>$exemptionBatch->id])?>"><button class="btn btn-success">Print</button></a>
		
		</div>
	</div>
	
</div>

							

