<?
	use frontend\models\Config;

	use yii\helpers\Html;
	use yii\helpers\Url;


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
	.medium_image3 {
    width: 200px;
	}
</style>
<div class="container">
<div class="row">
<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td style="width:50%"></td>
            <td style="width:50%; text-align:right; font-size:18px">
                <?= Html::img('@web/img/AHLOGO.png', ['alt' => 'My logo','class'=>'medium_image3']) ?>
                
            </td>
        </tr>
    </table>
</div>


	
<div class="col-sm-12" >
	
    <table class="" style="width:100%">
        <tr>
            <td  style="text-decoration:underline;text-align:center;text-transform:uppercase"> 
				<br/>
				
				<b>
					ACCEPTANCE LETTER
					</b>
				<br/>
				<br/>
			</td>
        </tr>
    </table>
</div>
	
	
<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				I hereby accept the offer for purchase of Shop No.<?= $FileModel->allocation->shop->name;?> of <?= Config::getSpaceSize($FileModel->allocation->shop->space->name,$FileModel->allocation->shop->type->name);?>. Kafe District Market, Kafe District, Abuja and declare that I shall comply by all the terms and conditions of the purchase.
				<br/>
				<br/>
			</td>
        </tr>
    </table>
</div>
	
<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Name …………………………………………………………………………………………………………………………………………………………………
				<br/>
				<br/>

			</td>
        </tr>
    </table>
</div>
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Address ………………………………………………………………………………………………………………………………………………………………
				<br/>
				<br/>

			</td>
        </tr>
    </table>
</div>
	
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Signature ……………………………………………………………………………………………………………………………………………………………
				<br/>
				<br/>

			</td>
        </tr>
    </table>
</div>
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Occupation …………………………………………………………………………………………………………………………………………………………

				<br/>
				<br/>
			</td>
        </tr>
    </table>
</div>
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Date ……………………………………………………………………………………………………………………………………………………………………

				<br/>
				<br/>
			</td>
        </tr>
    </table>
</div>
	
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				I/We further declared to adhere to the existing terms and conditions as well as those that may be stipulated in line with the extant laws in force within the Federal Capital Territory.
				<br/><br/>

			</td>
        </tr>
    </table>
</div>
	
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				........................................................................
				<br/>
				Signature and date

			</td>
        </tr>
    </table>
</div>
	
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				<br/>
				In the presence of:
				<br/>
				<br/>

			</td>
        </tr>
    </table>
</div>
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Name …………………………………………………………………………………………………………………………………………………………………
				<br/>
				<br/>

			</td>
        </tr>
    </table>
</div>
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Address ………………………………………………………………………………………………………………………………………………………………
				<br/>
				<br/>

			</td>
        </tr>
    </table>
</div>
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Signature ……………………………………………………………………………………………………………………………………………………………

				<br/>
				<br/>
			</td>
        </tr>
    </table>
</div>
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Occupation …………………………………………………………………………………………………………………………………………………………
				<br/>
				<br/>

			</td>
        </tr>
    </table>
</div>
	
	<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Date ……………………………………………………………………………………………………………………………………………………………………
				<br/>
				<br/>

			</td>
        </tr>
    </table>
</div>
	
<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				<br/><br/>
				NB: If applicant is a corporate entity, the signatories shall be either two Directors or a Director and Company Secretary.
			</td>
        </tr>
    </table>
</div>
	

	

</div>
</div>