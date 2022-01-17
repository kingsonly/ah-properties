<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


?>
<?php $randomId = uniqid(); ?>
<div id="<?php echo $randomId; ?>"><jyjhg?php //echo $randomId; ?></div>


<div class="ds-all-information">
					<div class="ds-all-info-header clearfix">
						<h3>Overview</h3>
						
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="overview-box clearfix">
								<div class="overview-box-icon">
									<span class="icon-total-applicatns"></span>
								</div>
								<div class="overview-box-content">
									<h4>Total Applicants</h4>
									<h2 class="color-blue"><?= $totalapplicant;?></h2>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="overview-box clearfix">
								<div class="overview-box-icon">
									<span class="icon-payment-security"></span>
								</div>
								<div class="overview-box-content">
									<h4>100% Payment</h4>
									<h2 class="color-green"><?= $paid;?></h2>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="overview-box clearfix">
								<div class="overview-box-icon">
									<span class="icon-walet-payment"></span>
								</div>
								<div class="overview-box-content">
									<h4>40% or Above</h4>
									<h2 class="color-soul"><?= $over40;?></h2>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="overview-box clearfix">
								<div class="overview-box-icon">
									<span class="icon-pending"></span>
								</div>
								<div class="overview-box-content">
									<h4>Pending</h4>
									<h2 class="color-pink"><?= $penddingPayment; ?></h2>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-7">
							<div class="chart-wrapper">
	                            <canvas id="month"></canvas>
	                        </div>
						</div>
						<div class="col-lg-5">
							<div class="pie-box">
								<canvas id="pie"></canvas>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5">
							<div class="box-layout">
								<h4>Applicants</h4>
								<div class="box-layout-outer">
									<div class="box-layout-inner">
										<div class="applicant-doc">
											<? foreach($applicant5 as $key => $value ){?>
											<div class="applicant-doc-box">
												
												<a href="<?= Url::to(['applicants/view','id'=>$value->id])?>">
													<div class="applicant-doc-icon">
														<span class="fa fa-file-text-o"></span>
													</div>
													<div class="applicant-doc-title">
														<p><?= $value->applicant_type == 1?$value->individual->fullname: $value->organization->organization_name;?></p>
													</div>
												</a>
											</div>
											<? }?>
											
										</div>
									</div>
									<div class="box-layout-outer-footer">
										<a href="<?= Url::to(['applicants/'])?>"><span class="icon-plus"></span>Add New Applicant</a>
										<a href="<?= Url::to(['applicants/applicants'])?>"><span class="icon-copy"></span>View All Applicants</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="box-layout">
								<h4>Staff</h4>
								<div class="box-layout-outer">
									<div class="box-layout-inner">
										<div class="staff-wrapper">
											<? foreach($users5 as $key => $value ){?>
											<div class="staff-box">
												<a href="#">
													<div class="staff-image fa fa-user img-fluid" style="font-size:50px">
														
													</div>
													<div class="staff-title">
														<p><?= $value->staffdetails->fullname;?></p>
													</div>
												</a>
											</div>
											<? } ?>
											
										</div>
									</div>
									<div class="box-layout-outer-footer">
										<? if (\Yii::$app->user->can('createUser')) { ?>
										<a href="<?= Url::to(['site/signup'])?>"><span class="icon-plus"></span>Add New Staff</a>
										<!--<a href="#"><span class="icon-copy"></span>View All Staff</a> -->
										<? } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	
	
	
<?
	$year= date('Y');
	
	$biodataform = <<<JS
	

	
	var monthlyChart = document.getElementById("month").getContext('2d');
var dsChart = new Chart(monthlyChart, {
type: 'line',
data: {
    labels: ["January", "February", "March", "April", "May", "jun", "July", "August", "Sepemeber", "October", "November", "December"],
    datasets: [{
        label: 'Total Applicant In $year',
        data: ['$jan', '$feb', '$mar', '$apr', '$may', '$jun', '$jul','$aug','$sep','$oct','$nov','$dec'],
        fill: false,
        borderColor: '#385ED9',
        backgroundColor: '#d4d6dd',
        borderWidth: 2,
        tension: 0.1
    }]},
    options: {
      responsive: true,
      maintainAspectRatio: false,
    }
});

var ctx = document.getElementById("pie").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["100% Payments", "40% Payments", "None Payments"],
    datasets: [{
      backgroundColor: [
        "#53A63E",
        "#D77E3E",
        "#D65A74",
      ],
      data: ["$paid","$over40","$penddingPayment"]
    }]
  }
});

JS;
 
$this->registerJs($biodataform);
?>