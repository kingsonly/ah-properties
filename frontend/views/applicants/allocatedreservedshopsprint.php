<?
 use yii\helpers\Url;
 use yii\helpers\Html;
 use frontend\models\Config;
?>

<style >
  @page { size: landscape; }
	.listtable th, .listtable td,.signaturetable th, .signaturetable td{
		padding: 0px;
		padding-left: 5px;
	}

/*	@page { size: A4;  margin:2cm;}*/
	
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
    width: 120px;
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
	.headertabler{
		margin-bottom: 0px;
	}
</style>

<div class="container ">
	<div class="row">
		<div class="col-sm-12">
			<table class="table headertabler">
				<tr>
					<td style="width:20%"><?= Html::img('@web/img/KDMLOGO.png', ['alt' => 'My logo','class'=>'medium_image3']) ?></td>
					<td style="text-align:center">
						<h1 style="line-height: 1.1;">KAFE DISTRICT MARKET</h1>
						<h1 style="margin-bottom:9px;">APPROVAL SHEET</h1>
						
						<span class="span1" style="background:#000;color:#fff;font-size:25px;margin-top:10px;"><b>Exemption List</b></span>
					
					</td>
					<td style="text-align:right;width:20%"><?= Html::img('@web/img/AHLOGO.png', ['alt' => 'My logo','class'=>'medium_image3']) ?></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Batch No: <span class="span2" style="display:inline-block"> <?= $exemptionBatch->bathch_no?></strong></span></td>
					<td  style="text-align:right"><span class="span2"><strong>Date:  <?= date("d-m-Y", strtotime($exemptionBatch->date_created)); ?></strong></span></td>  
					
				</tr>
			</table>
			<? if(!empty($model)){?>
			
			<table class="table table-bordered listtable">
				<thead class="thead-dark">
				<tr>
					<th><strong>S/No</strong></th>
					<th><strong><strong>File Number</strong></th>
					<th><strong>Name</strong></th>
					<th><strong>Shop/Space Type</strong></th>
					
				</tr>
				</thead>
			<? $i = 1; foreach($model as $key =>$value){?>
				<? if(empty($value->exemption)){?>
				<tr>
					<td><?= $i;?></td>
					<td><?= $value->booking->file->file_number;?></td>
					<td><?= $value->booking->file->applicantid->applicant_type == 1?$value->booking->file->applicantid->individual->fullname:$value->booking->file->applicantid->organization->organization_name;?></td>
					<td><?= $value->booking->shop->name;?> / <?= $value->booking->shop->space->name;?> (<?= Config::getSpaceSize($value->booking->shop->space->name,$value->booking->shop->type->name);?>)</td>
					
				</tr>
				
			
			<? $i++;}}}?>
				<? if(count($model) < 10){?>
				<?  
					$xvalue = 10 - count($model);
				  for ($x = 1; $x <= $xvalue; $x++){
				?>
				
				<tr>
					<td><?= $i;?></td>
					<td></td>
					<td></td>
					<td></td>
					
				</tr>
				
			
			<? $i++;}}?>
			
				
				
			
			</table>
			<table class="table signaturetable" style="border:0px !important;">
				<tr style="border:0px !important;"> 
					<td colspan="3" style="text-align:center ;border:0px !important;">
						Total Number: <span class="span2" style="border-bottom:dashed 2px "><?= count($model)?></span>
					</td>
				</tr>
				
				<tr style="border:0px !important;">
					<td style="border:0px !important;">
						 <div class="span3"></div>
						 <div style="width:300px">List Compiled By: <strong style="text-transform: capitalize;"><?= $exemptionBatch->compiledby->fullname; ?></strong></div>
						 <div style="text-align:center;width:300px"></div>
						
					</td>
					<td style="border:0px !important;">
						 <div class="span3"></div>
						 <div style="text-align:center;width:300px">Approval Date:</div>
						
					</td>
					<td style="border:0px !important;">
						 <div class="span3"></div>
						 <div style="text-align:center;width:300px">List Approved By:</div>
						
					</td >
					
				</tr>
			</table>
			
			
		
		</div>
	</div>
	
</div>

							<?
	
	$proccessResservedAproval = Url::to(['applicants/proccessreservedapproval']);
	$biodataform = <<<JS
	
	var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet){
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}

head.appendChild(style);

window.print();
	
	$("#proccess").on("click", function() {
	var checkedValue = []
  $("input:checkbox[name=requestapproval]:checked").each(function(){
    checkedValue.push($(this).val());
	
});
var serialiseCheckeValue = checkedValue ;


$.post('$proccessResservedAproval',
       {data: serialiseCheckeValue},
       function(response){
           console.log(response);
       }
);



//alert(serialiseCheckeValue)
});


JS;
 
$this->registerJs($biodataform);
?>



