
<style>
	@page { size: auto;  margin: 0mm; }
	* {
    -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
    color-adjust: exact !important;                 /*Firefox*/
}
	@media print { 
    .table .lightthings { 
        background-color: #D1AD6F !important; 
    } 
}
	
    td{
        border:0px !important;
            font-size:18px;
    }
    .mytable td{
        padding: 0px ;
        padding-left: 20px ;
    }
	.lightthings{
		background-color: #D1AD6F !important; 
	}
</style>
<div class="container">
<div class="row">
<div class="col-sm-12" style="min-height:200px">
    <table class="" style="width:100%">
        <tr>
            <td style="width:50%"><img src="img/kdmjoin.png" style="width:50%;"/></td>
            <td style="width:50%; text-align:right; font-size:18px">
                <h3 style="font-size:3rem">INVOICE</h3>
                <p>Kafe District Market</p>
                <b>AH-Properties & Construction Ltd.</b><br>
                1 Masarki Close, Off Parakuo Crescent,<br>
                Abuja, Federal Capital Territory,<br>
                Nigeria. <br><br>
                Phone: 09010658780<br>
                mobile: 09010658781
            </td>
        </tr>
    </table>
</div>
<div class="col-sm-12" style="min-height:100px">
    <table class="table" style="width:100%">
        <tr>
            <td style="width:50%">
                BILL TO <br>
                <b style="text-transform:capitalize">
					<?= $model->fileno->file_number;?>
				</b>
					<br>
				<? if($type == 1){ ?>
					<b style="text-transform:capitalize">
						<?= $bio->first_name.' ';?>
						<?= !empty($bio->middle_name)?$bio->middle_name.' ':'';?>
						<?= $bio->last_name;?>
				</b>
				<? }else{ ?>
					<b style="text-transform:capitalize"><?= $bio->organization_name;?></b>
				<? } ?>
                <br>
				
				<? if($type == 1){ ?>
					<?= $contact->street_name.' '. $contact->district;?>
				<? }else{ ?>
					 
				<?= $contact->house_no.' '.$contact->street_name.' '.$contact->street_extention.' '. $contact->district;?>
				<? } ?>
                
				<br>
				<? if($type == 1){ ?>
					<?= $contact->states->name.', '.$contact->lga->name;?>, 
				<? }else{ ?>
					<?= $contact->states->name.', '.$contact->lga->name;?>,
				<? } ?>
                 <br>
				<? if($type == 1){ ?>
					<?= $contact->countrys->name;?> 
				<? }else{ ?>
					<?= $contact->countrys->name;?> 
				<? } ?>
                 <br><br>
				<? if($type == 1){ ?>
					<?= $contact->mobile_number;?>
				<? }else{ ?>
					<?= $contact->office_number;?> 
				<? } ?>
                <br>
				<? if($type == 1){ ?>
					<?= $contact->email;?> 
				<? }else{ ?>
					<?= $contact->email;?> 
				<? } ?>
                
            </td>
            <td style="width:50%; text-align:right">
                <table class="mytable" style="width:100%;border-collapse: collapse;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td cellspacing="0" cellpadding="0"><b>Invoice Number:</b></td>
                        <td style="text-align:left" ><?= $model->invoice_number;?></td>
                    </tr>
                    <tr>
                        <td><b>Invoice Date:</b></td>
                        <td style="text-align:left"><?= date('d-m-Y',strtotime($model->date_created));?></td>
                    </tr>
                    <tr>
                        <td><b>Payment Due:</b></td>
                        <td style="text-align:left"><?= date('d-m-Y',strtotime($model->due_date));?></td>
                    </tr>
                    <tr>
                        <td><b>Amount Due (NGN):</b></td>
                        <td style="text-align:left">₦ <?= number_format($model->amount); ?> </td>
                    </tr>
                </table>
                
            </td>
        </tr>
    </table></div>
<div class="col-sm-12" style="background:white;">
<table class="table" style="width:100%">
        <thead class="lightthings">
            <tr class="lightthings">
                <th class="lightthings" scope="col" >Space Type</th>
                <th  class="lightthings" scope="col">Quantity</th>
                <th  class="lightthings" scope="col">Price</th>
                <th  class="lightthings" scope="col" style="text-align:right">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border:0px 0px 1px 0px solid">
                <td><b><?= $model->shop->space->name.' '.$model->shop->type->name;?></b><br>Floor level: <?=$model->shop->floor->name?>
					<br>
					Block: <?=$model->shop->block->name?>
					<br>Quadrant: <?=$model->shop->quadrant->name?>
					<br>Shop no: <?=$model->shop->name?>
				</td>
                <td>1</td>
                <td>₦ <?= number_format($model->shop->price);?></td>
                <td style="text-align:right">₦  <?= number_format($model->shop->price);?></td>
            </tr>
            
        </tbody>
    </table> 
    <hr>
    <table  style="width:100%">
        <tr>
            <td style="text-align:right; width:80%"><b>Total:</b></td>
            <td style="text-align:right; width:20%">₦  <?= number_format($model->shop->price);?></td>
        </tr>
    </table>
    <hr>
</div>
<div class="col-sm-12" >
    <b>Notes / Terms</b><br>
    Payment Details <br>
    Account Name: AH Properties & Construction Ltd. <br>
    Bank: United Bank Of Africa (UBA) <br>
    Account Number: 1022586455
</div>

<div class="col-sm-12" >
	<br/>
    Account Name: AH Properties & Construction Ltd. <br>
    Bank: Zenith Bank Plc. <br>
    Account Number: 1016574349
</div>
	
<div class="col-sm-12" style="margin-top:40px;text-align:center" >
    <b>This invoice does not guarantee Shop/Space allocation. 
Evidence of Full payment or a minimum of 40% Initial Payment for Instalments must be presented at the KDM Project Office within one (1) week of collection of this invoice.</b>
</div>
</div>
</div>