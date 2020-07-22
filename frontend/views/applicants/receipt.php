<style>
	@page { size: auto;  margin: 0mm; }
	* {
    -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
    color-adjust: exact !important;                 /*Firefox*/
}
	.receipt{
				background-image: url('../..../../web/img/backgroundorijo.png');
				background-size: cover;
				height: 380px;
				padding-left: 30px;
				padding-right: 30px;
				padding-top: 19px;
			}
			.receiptcopy{
				background-image: url('../..../../web/img/copy1.png');
				background-size: cover;
				height: 380px;
				padding-left: 30px;
				padding-right: 30px;
				padding-top: 19px;
			}
			.receiptcopy2{
				background-image: url('../..../../web/img/triplicate.png');
				background-size: cover;
				height: 380px;
				padding-left: 30px;
				padding-right: 30px;
				padding-top: 19px;
			}
			.receipttitle{
				font-size: 22px;
				border: solid 2px #64A893;
				background: rgba(180, 213, 200,0.6);

				color: #65A985;
				text-transform: capitalize;
			}
			.receipttitlecopy{
				font-size: 22px;
				border: solid 2px #D29C87;
				background: rgba(252, 232, 221,0.6);
				color: #ccc;
				text-transform: capitalize;
			}
			.receipttitlecopy2{
				font-size: 22px;
				border: solid 2px #98B8B1;
				background: rgba(244, 243, 241,0.6);
				color: #CECFD0;
				text-transform: capitalize
			}
			.originalbox{
				font-size: 23px;
				color: #ED1B24;
				text-align: center;
				font-family: arial;
				font-weight: bolder;
			}
			
			.receiptid{
				font-size: 23px;
				text-align: center;
				font-family: arial;
				color: #000;
				font-weight: normal;
			}
			
			.officialrecipt{
				text-align: right;
				font-size: 23px;
				font-family: arial;
				text-transform: uppercase;
				color: #425059;
				font-weight: bolder;
			}
			.officialreciptcopy{
				text-align: right;
				font-size: 23px;
				font-family: arial;
				text-transform: uppercase;
				color: #ED1B24;
				font-weight: bolder;
			}
			.officialreciptcopy2{
				text-align: right;
				font-size: 23px;
				font-family: arial;
				text-transform: uppercase;
				color: #929498;
				font-weight: bolder;
			}
			
			.innerreceipt{
				border: solid 2px #869E92;
/*				width: 98%;*/
				border-radius: 20px;
				margin-top: 5px;
				font-size: 14px;
				color: #36423D;
				font-family: arial;
			}
			
			.innerreceiptcopy{
				border: solid 2px #8A9C90;
/*				width: 98%;*/
				border-radius: 20px;
				margin-top: 5px;
				font-size: 14px;
				color: #36423D;
				font-family: arial;
			}
			
			.innerreceiptseperator{
				margin-top: 10px;
			}
			
			.innerbuttomlayer{
				margin-top: 4px;
				font-size: 14px;
				text-transform: ;
				font-style: italic;
				font-family: arial;
			}
			.totalinput{
				border: solid 2px #62B09C;
				border-radius: 10px;
				background: rgba(153, 213, 179,0.7);
				font-size: 30px;
			}
			
			.totalinputcopy{
				border: solid 2px #B4AA99;
				border-radius: 10px;
				background: rgba(248, 224, 180,0.4);
				font-size: 30px;
			}
			.totalinputcopy2{
				border: solid 2px #B5B5B6;
				border-radius: 10px;
				background: rgba(222, 221, 219,0.7);
				font-size: 30px;
			}
			.signatureline{
				height: 42px;
				border-bottom: solid 1.8px #0F0E09;
				text-align: center;
			}
			
			.signaturetext{
				font-size: 12px;
				text-align: center;
				font-family: arial;
			}
			
			.refund{
				text-align: center;
				text-transform: capitalize;
			}
			
		</style>
<!--		content area starts here-->
		<div class="container-fluid ">
			<div class="container receipt">
				<div class="row  ">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4"><img src="img/AHLOGO.png" style="width:50px; height:50px"/></div>
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-3"><img src="img/KDMLOGO.png" style="width:50px; height:50px"/></div>
											<div class="col-md-9 receipttitle">Kafe District Market</div>
										</div>
										
									</div>
									<div class="col-md-4 originalbox">ORIGINAL</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="row" style="margin-top: 4px;">
									<div class="col-md-4"><img src="img/AICLLOGO.png" style="width:50px; height:50px"/></div>
									<div class="col-md-4 officialrecipt">Official Receipt</div>
									<div class="col-md-4 receiptid"><?= $modelKdmPayment->receit_id ; ?></div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container innerreceipt">
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Customer Id: <strong><?= $modelBio->applicant_id?></strong></div>
										<div class="col-md-4">Payment Mode/ Revenue Code: <strong><?= $modelKdmPayment->payment_mode; ?></strong></div>
										<div class="col-md-4">Payment Date: <strong><?= $modelKdmPayment->payment_date; ?></strong></div>
									</div>
									
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Payment Id:<strong><?= $modelKdmPayment->payment_id; ?></strong></div>
										<div class="col-md-4">Bank Branch/ Channel: <strong><?= $modelKdmPayment->bank_branch; ?></strong></div>
										<div class="col-md-4">Receipt Date: <strong><?= $modelKdmPayment->receipt_date; ?></strong></div>
									</div>
									
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Bill Reff Id: <strong><?= $modelKdmPayment->bill_reff; ?></strong></div>
										<div class="col-md-4">Name Of Depositor:<strong><?= $modelBio->last_name.' '.$modelBio->first_name;?></strong></div>
										<div class="col-md-4">Teller/Deposite No:<strong><?= $modelKdmPayment->teller_number; ?></strong></div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container innerbuttomlayer">
									<div class="row">
										<div class="col-md-12">Recieved the sum of: <strong><?= $modelKdmPayment->amount_word; ?></strong></div>
										
									</div>
									<div class="row">
										<div class="col-md-12">From: <strong><?= $modelBio->last_name.' '.$modelBio->first_name;?></strong></div>
										
									</div>
									<div class="row">
										<div class="col-md-12">Beign Payment For: <strong><?= $modelKdmPayment->payment_for; ?></strong></div>
										
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container" style="margin-top: 5px;">
									<div class="row">
										<div class="col-md-6">
											
											<div class="row">
											<div class="col-md-1" style="font-size: 30px;">₦</div>
											<div class="col-md-11 totalinput"><strong><?= $modelKdmPayment->amount; ?></strong></div>
											</div>
										
										</div>
										<div class="col-md-3">
											<div class="signatureline"> </div>
											<div class="signaturetext">Signature or mark of payer</div>
										</div>
										
										<div class="col-md-3">
											<div class="signatureline"> </div>
											<div class="signaturetext">Signature Of Revenue Collector</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container">
									<div class="row">
										
										<div class="col-md-6">
											
										</div>
										<div class="col-md-6 refund">
											No refund after payment
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		  
		</div> 
		
		
		<div class="container-fluid ">
			<div class="container receiptcopy">
				<div class="row  ">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4"><img src="img/AHLOGO.png" style="width:50px; height:50px"/></div>
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-3"><img src="img/KDMLOGO.png" style="width:50px; height:50px"/></div>
											<div class="col-md-9 receipttitlecopy">Kafe District Market</div>
										</div>
										
									</div>
									<div class="col-md-4 originalbox">DUPLICATE</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="row" style="margin-top: 4px;">
									<div class="col-md-4"><img src="img/AICLLOGO.png" style="width:50px; height:50px"/></div>
									<div class="col-md-4 officialreciptcopy">Official Receipt</div>
									<div class="col-md-4 receiptid"><?= $modelKdmPayment->receit_id ; ?></div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container innerreceiptcopy">
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Customer Id: <strong><?= $modelBio->applicant_id?></strong></div>
										<div class="col-md-4">Payment Mode/ Revenue Code:<strong><?= $modelKdmPayment->payment_mode; ?></strong></div>
										<div class="col-md-4">Payment Date:<strong><?= $modelKdmPayment->payment_date; ?></strong></div>
									</div>
									
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Payment Id: <strong><?= $modelKdmPayment->payment_id; ?></strong></div>
										<div class="col-md-4">Bank Branch/ Channel:<strong><?= $modelKdmPayment->bank_branch; ?></strong></div>
										<div class="col-md-4">Recipt Date: <strong><?= $modelKdmPayment->receipt_date; ?></strong></div>
									</div>
									
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Bill Reff Id: <strong><?= $modelKdmPayment->bill_reff; ?></strong></div>
										<div class="col-md-4">Name Of Depositor:<?= $modelBio->last_name.' '.$modelBio->first_name;?></strong></div>
										<div class="col-md-4">Teller/Deposite No:<strong><?= $modelKdmPayment->teller_number; ?></strong></div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container innerbuttomlayer">
									<div class="row">
										<div class="col-md-12">Recieved the sum of: <strong><?= $modelKdmPayment->amount_word; ?></strong></div>
										
									</div>
									<div class="row">
										<div class="col-md-12">From:<strong><?= $modelBio->last_name.' '.$modelBio->first_name;?></strong></div>
										
									</div>
									<div class="row">
										<div class="col-md-12">Beign Payment For:<strong><?= $modelKdmPayment->payment_for; ?></strong></div>
										
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container" style="margin-top: 5px;">
									<div class="row">
										<div class="col-md-6">
											
											<div class="row">
											<div class="col-md-1" style="font-size: 30px;">₦</div>
											<div class="col-md-11 totalinputcopy"><?= $modelKdmPayment->amount; ?></div>
											</div>
										
										</div>
										<div class="col-md-3">
											<div class="signatureline"> </div>
											<div class="signaturetext">Signature or mark of payer</div>
										</div>
										
										<div class="col-md-3">
											<div class="signatureline"> </div>
											<div class="signaturetext">Signature Of Revenue Collector</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container">
									<div class="row">
										
										<div class="col-md-6">
											
										</div>
										<div class="col-md-6 refund">
											No refund after payment
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		  
		</div> 









<div class="container-fluid ">
			<div class="container receiptcopy2">
				<div class="row  ">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4"><img src="img/AHLOGO.png" style="width:50px; height:50px"/></div>
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-3"><img src="img/KDMLOGO.png" style="width:50px; height:50px"/></div>
											<div class="col-md-9 receipttitlecopy2">Kafe District Market</div>
										</div>
										
									</div>
									<div class="col-md-4 originalbox">TRIPLICATE</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="row" style="margin-top: 4px;">
									<div class="col-md-4"><img src="img/AICLLOGO.png" style="width:50px; height:50px"/></div>
									<div class="col-md-4 officialreciptcopy2">Official Receipt</div>
									<div class="col-md-4 receiptid"><?= $modelKdmPayment->receit_id ; ?></div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container innerreceiptcopy">
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Customer Id: <strong><?= $modelBio->applicant_id?></strong></div>
										<div class="col-md-4">Payment Mode/ Revenue Code:<strong><?= $modelKdmPayment->payment_mode; ?></strong></div>
										<div class="col-md-4">Payment Date:<strong><?= $modelKdmPayment->payment_date; ?></strong></div>
									</div>
									
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Payment Id: <strong><?= $modelKdmPayment->payment_id; ?></strong></div>
										<div class="col-md-4">Bank Branch/ Channel:<strong><?= $modelKdmPayment->bank_branch; ?></strong></div>
										<div class="col-md-4">Recipt Date: <strong><?= $modelKdmPayment->receipt_date; ?></strong></div>
									</div>
									
									<div class="row innerreceiptseperator">
										<div class="col-md-4">Bill Reff Id: <strong><?= $modelKdmPayment->bill_reff; ?></strong></div>
										<div class="col-md-4">Name Of Depositor:<?= $modelBio->last_name.' '.$modelBio->first_name;?></strong></div>
										<div class="col-md-4">Teller/Deposite No:<strong><?= $modelKdmPayment->teller_number; ?></strong></div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container innerbuttomlayer">
									<div class="row">
										<div class="col-md-12">Recieved the sum of: <strong><?= $modelKdmPayment->amount_word; ?></strong></div>
										
									</div>
									<div class="row">
										<div class="col-md-12">From:<strong><?= $modelBio->last_name.' '.$modelBio->first_name;?></strong></div>
										
									</div>
									<div class="row">
										<div class="col-md-12">Beign Payment For:<strong><?= $modelKdmPayment->payment_for; ?></strong></div>
										
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container" style="margin-top: 5px;">
									<div class="row">
										<div class="col-md-6">
											
											<div class="row">
											<div class="col-md-1" style="font-size: 30px;">₦</div>
											<div class="col-md-11 totalinputcopy2"><?= $modelKdmPayment->amount; ?></div>
											</div>
										
										</div>
										<div class="col-md-3">
											<div class="signatureline"> </div>
											<div class="signaturetext">Signature or mark of payer</div>
										</div>
										
										<div class="col-md-3">
											<div class="signatureline"> </div>
											<div class="signaturetext">Signature Of Revenue Collector</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="container">
									<div class="row">
										
										<div class="col-md-6">
											
										</div>
										<div class="col-md-6 refund">
											No refund after payment
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		  
		</div> 

							<?
	
	
	$biodataform = <<<JS
	alert('Please Do a Control P to print the receipt')
	
	


JS;
 
$this->registerJs($biodataform);
?>




		
		
		
		