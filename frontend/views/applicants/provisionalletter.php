<?
	use frontend\models\Config;
?>
<style>
	@page { size: A4;  
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
               <h3 style="font-size:1.2rem"><?= date('d-m-Y',strtotime($FileModel->allocation->date_created)) ;?></h3>
                
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
				
				<b>PROVISIONAL OFFER OF SALE OF <?= $FileModel->allocation->shop->space->name;?> <?= ' ('.Config::getType($FileModel->allocation->shop->type->name).' )';?> IN KAFE DISTRICT MARKET, ABUJA 
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
				<? 
					$date = explode(' ',$FileModel->applicantid->date_created);
				?>
				With reference to your application dated <?= date('d-m-Y',strtotime($date[0])) ?> , I am hereby directed to convey the approval of the Management to make an Offer for the sale of a <?= $FileModel->allocation->shop->space->name.' ('.Config::getType($FileModel->allocation->shop->type->name).' )';?>  in the above named Market based on the following terms; 
				<br/>
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
						<span><b>Description:</b></span>
						<span style="padding-left:20px">Shop No. <?= $FileModel->allocation->shop->name;?> (<?= Config::getSpaceSize($FileModel->allocation->shop->space->name,$FileModel->allocation->shop->type->name);?>).</span>
					</li>
					<li>
						<span><b>Location:</b></span>
						<span style="padding-left:20px">Quadrant <?= $FileModel->allocation->shop->quadrant->name?>, Block <?= $FileModel->allocation->shop->block->name?>, Kafe District Market, Kafe District, Abuja.      </span>
					</li>
					<li>
						<span><b>Purpose:</b></span>
						<span style="padding-left:20px"><?= $FileModel->allocation->shop->space->name.' ('.Config::getType($FileModel->allocation->shop->type->name).' )';?>
						
						</span>
					</li>
					<li>
						<span><b>Term:</b></span>
						<span style="padding-left:20px">Fifty (50) years.</span>
					</li>
					
					<li>
						<span><b>Total consideration due:</b></span>
						<span style="padding-left:20px">₦ <?= number_format( $FileModel->allocation->shop->price);?></span>
					</li>
					
					<li>
						<span><b>VAT:</b></span>
						<span style="padding-left:20px">7.5% of the total value</span>
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
				<h4> Facilities</h4>
				<ul >
					<li>
						
						<span >Excellent Road & Drainage Networking;</span>
					</li>
					<li>
						
						<span >Backup power Supply provided by generator;</span>
					</li>
					<li>
						
						<span >Uninterrupted water supply, with the Provision of reservoir;</span>
					</li>
					
					<li>
						
						<span >Beautified landscaped surroundings; with sufficient Car Parking space </span>
					</li>
					
					<li>
						
						<span >Public conveniences;</span>
					</li>
				</ul>
			</td>
        </tr>
    </table>
</div>
	
<div class="col-sm-12" >
    <table class="" style="width:100%">
        <tr>
            <td > 
				Furthermore the following Conditions shall in addition to other conditions be included in the Allocation letter to be issued upon your Satisfactory Compliance and acceptance of this Offer.
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
						
						<span >Provisional Offer of shop(s) shall be made upon payment of 1st instalment deposit of (40% of total Consideration due) inclusive of the VAT</span>
					</li>
					
					<li>
						
						<span >The payment of the balance of <b>(60%)</b> by the prospective Assignee/buyer shall be made within One Year from the date of acceptance of provisional offer.</span>
					</li>
					
					<li>
						
						<span >That a Service Charge at a rate to be determined, exclusive of the Purchase Price, is <b><u>PAYABLE ANNUALLY</u></b> upon receipt of a demand notice to that effect and such payments SHALL be made within two (2) weeks of receipt of the said notice.</span>
					</li>
					
					<li>
						
						<span >It should be noted that charges for Building Insurance, Ground Rent and Tenement rates are to be borne by the Assignee/Purchaser annually. </span>
					</li>
					
					<li>
						
						<span >The Cost of perfecting the final Agreement shall be borne by the prospective Assignee/purchaser. </span>
					</li>
					
					<li>
						
						<span >By accepting this Offer, you expressly accept to abide by the relevant Planning, Environmental, Health and Safety laws in force as well as Operational Conditions that may from to time be stipulated by the Federal Capital Development Authority.</span>
					</li>
					
					<li>
						
						<span >To adhere strictly and to ensure that no additional structures are erected without the prior written approval of the Management.</span>
					</li>
					
					<li>
						
						<span >AHPC reserves the right to review sales prices where necessary due to economic exigencies except for purchasers who have made PAYMENT OF AT LEAST 80% of the purchase price PRIOR such exigency.</span>
					</li>
					
					<li>
						
						<span >Please note that a breach or failure to comply with any or all of the terms as to mode of payment SHALL be liable to revocation of the Provisional Offer, and 5% of the Purchase Value shall be forfeited as Cost of Administrative Charges.</span>
					</li>
					
					<li>
						
						<span >This Offer shall commence on the date of acceptance as signified by you in writing and shall be deemed revoked if no financial commitment is made by you at the time of communication of your acceptance.</span>
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
				<br>
				<br>
				Duly completed Letter of Acceptance along with an evidence of Payment in favour of <b><u>AH Properties & Construction Ltd</u></b> should be submitted to the Project Office at No. 1 Masarki Close, Off Parakou Crescent, Wuse II, Abuja.
				<br/>
				<br/>
				Note: The offer is non-transferable and non-alienable.

				<br/>
				<br/>
				Accept the assurance of the Management while we thank you for your patronage.
				<br/>
				<br/>


			</td>
        </tr>
    </table>
</div>
	

<div class="col-sm-12" >
    
……………………………………………
	<br/>
Chief Operating Officer
	<br/>
For: the MD AHPCL

</div>
	

</div>
</div>