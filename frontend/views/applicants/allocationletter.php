<?
	use frontend\models\Config;
?>
<style>
	@page { 
		size: A4;  
		margin: 35mm 25mm 25mm 25mm;  
	}
	
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
</style>
<div class="container" style="text-align:justify !important">
<div class="row">

<div class="col-sm-12" >
    <table class="table" style="width:100%">
        <tr>
            <td style="width:50%">
                
                <b style="text-transform:capitalize">
					<?= $FileModel->file_number;?>
				</b>
				<br/>
					
				<? if($FileModel->applicantid->applicant_type == 1){ ?>
					<b style="text-transform:capitalize">
						<?= $FileModel->applicantid->individual->first_name.' ';?>
						<?= !empty($FileModel->applicantid->individual->middle_name)?$FileModel->applicantid->individual->middle_name.' ':'';?>
						<?= $FileModel->applicantid->individual->last_name;?>
				</b>
				<br/>
				<? }else{ ?> 
					<b style="text-transform:capitalize"><?= $FileModel->applicantid->organization->organization_name;?></b>
				<br/>
				<? } ?>
              
				
				<? if($FileModel->applicantid->applicant_type == 1){ ?>
					<span style="text-transform:capitalize">
					<?= $FileModel->applicantid->individual->contact->street_name.' '. $FileModel->applicantid->individual->contact->district;?>
					</span>
				<br/>
				
				<? }else{ ?>
					 <span style="text-transform:capitalize">
						<?= $FileModel->applicantid->organization->contact->house_no.' '. $FileModel->applicantid->organization->contact->street_name.' '.$FileModel->applicantid->organization->contact->street_extention.' '. $FileModel->applicantid->organization->contact->district;?>
					</span>
				<br/>
				<? } ?>
                
				
				<? if($FileModel->applicantid->applicant_type == 1){ ?>
					<?= $FileModel->applicantid->individual->contact->lga->name.', '.$FileModel->applicantid->individual->contact->states->name;?>, 
				
				<? }else{ ?>
					<?= $FileModel->applicantid->organization->contact->lga->name.', '.$FileModel->applicantid->organization->contact->states->name;?>,
				
				<? } ?>
                 
				<? if($FileModel->applicantid->applicant_type == 1){ ?>
					<?= $FileModel->applicantid->individual->contact->countrys->name;?> .
				<br/>
				<? }else{ ?>
					<?= $FileModel->applicantid->organization->contact->countrys->name;?> .
				<br/>
				<? } ?>
                 
				<? if($FileModel->applicantid->applicant_type == 1){ ?>
					<?= $FileModel->applicantid->individual->contact->mobile_number.'.';?>
				
				<? }else{ ?>
					<?= $FileModel->applicantid->organization->contact->office_number.'.';?> 
				
				<? } ?>
               
				<? if($FileModel->applicantid->applicant_type == 1){ ?>
					<?= $FileModel->applicantid->individual->contact->email.'.';?> 
				<br/>
				<? }else{ ?>
					<?= $FileModel->applicantid->organization->contact->email.'.';?> 
				<br/>
				<? } ?>
                
            </td>
            <td style="width:50%; text-align:right">
               <?= date('d-m-Y',strtotime($FileModel->allocation->date_approved)) ;?>
            </td>
        </tr>
    </table></div>
<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > Dear Sir/Madam,</td>
        </tr>
    </table>
</div>
	
<div class="col-sm-12" >
	
    <table class="" style="width:100%">
        <tr>
            <td  style="text-decoration:underline;text-align:center;text-transform:uppercase"> 
				<br/>
				
				<b>
					ALLOCATION LETTER FOR A <?= $FileModel->allocation->shop->space->name;?> <?= ' ( '.Config::getType($FileModel->allocation->shop->type->name).' )';?>  AT KAFE DISTRICT MARKET, ABUJA
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
				With reference to your application for a <b><?= $FileModel->allocation->shop->space->name.' ('.Config::getType($FileModel->allocation->shop->type->name).' )';?> </b> at the Kafe District Market and subsequent payment, AH Properties and Construction Limited (AHPC) is hereby pleased to convey the allocation of Shop No. <b><?= $FileModel->allocation->shop->name;?></b>, in Quadrant <b><?= $FileModel->allocation->shop->quadrant->name;?></b>, Block <b><?= $FileModel->allocation->shop->block->name;?></b> Kafe District Market, Kafe Abuja to you, for a term of Fifty Years commencing from <?= date('d-m-Y',strtotime($FileModel->allocation->date_approved)) ;?> subject to the provisions of the laws thereof and the following terms and conditions: 
			</td> 
        </tr>
    </table>
</div>
	
<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				
				<ol >
					<li>
						
						<span >A Deed of Assignment shall be executed in favor of the purchaser upon completion of full payment.</span>
					</li>
					
					<li>
						
						<span >b.	All potential Assignees/Purchaser shall have vacant Possession of the Shops Upon diligent execution of the Deed of Assignment.</span>
					</li>
					
					<li>
						
						<span >A Service Charge at the rate to be determined, exclusive of the Purchase Price is, <b><u>PAYABLE ANNUALLY</u></b> upon receipt of a demand notice to that effect and such payments SHALL be made within two (2) weeks of receipt of the said notice.</span>
					</li>
					
					<li>
						
						<span >It should be noted that charges for Building Insurance, Ground Rent and Tenement rates are to be borne by the Assignee/Purchaser annually.  </span>
					</li>
					
					<li>
						
						<span >The Cost of perfecting the final Agreement shall be borne by the prospective Assignee/purchaser. </span>
					</li>
					
					<li>
						
						<span >By accepting the Offer, you expressly accept to abide by the relevant Planning, Environmental, Health and Safety laws in force as well as Operational Conditions that may from to time be stipulated by the Federal Capital Development Authority.</span>
					</li>
					
					<li>
						
						<span >To adhere strictly and to ensure that no additional structures are erected without the prior written approval of the Management.</span>
					</li>
					
					<li>
						
						<span >To pay premium rates, levies and taxes that may be imposed by the relevant government agencies or authority.</span>
					</li>
					
					<li>
						
						<span >Not to engage in any form of illegality in the course of carrying on business activities within the Market, which includes but not limited to obtaining all necessary permits, approvals, and/or consent from all appropriate Government Agencies, Authorities to operate or carry on their respective businesses or trades in the market.</span>
					</li>
					
					<li>
						
						<span >Not to use individual power generating sets within the market without prior written approval of AHPCL or its appointed Agent.</span>
					</li>
					
					<li>
						
						<span >To adhere to the disclosed nature of business, trade or profession to be undertaken in the market and AHPC reserves the right to exercise its discretion to refuse the operation of any business, trade or profession that will constitute nuisance, disturbance and or that will endanger the lives and health of other Users.</span>
					</li>
					
					
					
					
				</ol>
			</td>
        </tr>
    </table>
</div>
	
<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				
				Congratulations, Accept our warmest regards.
				<br/>
				<br/>
				<br/>
				
				


			</td>
        </tr>
    </table>
</div>
	

<div class="col-sm-12" >
    
Managing Director
<br/>
<b>For; AH Properties & Construction Ltd (AHPCL)</b>


</div>
	

</div>
</div>