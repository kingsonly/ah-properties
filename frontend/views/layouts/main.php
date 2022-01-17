<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\KdmNotification;

$getNotificaltion = KdmNotification::find()->andWhere(["status" => 0])->all();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
	<style>
		.whites{
			color: #fff !important;
		}
	
	</style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    'closeButton' => [
        'id'=>'close-button',
        'class'=>'close',
        'data-dismiss' =>'modal',
        ],
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => [
        'backdrop' => false, 'keyboard' => true
        ]
]);
?>
	<table class="table">
		<tr>
			<td>SN</td>
			<td>File Number</td>
			<td>Description</td>
			<td>Action</td>
		
		</tr>
	
	<?
if(!empty($getNotificaltion)){
	$i = 1;
	foreach($getNotificaltion as $key => $value){
		?>
		<tr>
			<td><?= $i;?></td>
			<td><?= $value->file->file_number; ?></td>
			<td><?= $value->description; ?></td>
			<td><a href="<?= $value->link."&notification=".$value->id; ?>" > View </a></td>
		
		</tr>
	
	<?
	$i++;
	}
	
}else{?>
	<tr>
			<td colspan="4">No data available</td>
			
		
		</tr>
	
<?
}?>
</table>
<?
yii\bootstrap\Modal::end();
?>
	<main class="dashboard clearfix">
		<div class="dashboard-left">
			<div class="humbarge">
				<div class="menu-toggle">
					<span class="icon-menu"></span>
				</div>
			</div>
			<nav class="nav-primary">
                <ul class="clearfix">
                    <li class="<?= Yii::$app->controller->route == 'site/dashboard'?'active':''?>"><a href="<?= Url::to(['site/dashboard'])?>"><div class="menu-item-icon"><i class="icon-dashboard"></i></div><span class="menu-item-text">Dashboard</span></a></li>
                    <li class="<?= Yii::$app->controller->route == 'applicants/applicants'?'active':
									Yii::$app->controller->route == 'applicants/view'?'active':
									Yii::$app->controller->route == 'pplicants/applicantfileview'?'active':''
							   ?>"><a href="<?= Url::to(['applicants/applicants'])?>"><div class="menu-item-icon"><i class="icon-applicants"></i></div><span class="menu-item-text">Applicants</span></a></li> 
					
					
					<? if (\Yii::$app->user->can('createUser')) { ?>
                    <li class="<?= Yii::$app->controller->route == 'applicants/adminupdatelistview'?'active':''?>"><a href="<?= Url::to(['applicants/adminupdatelistview'])?>"><div class="menu-item-icon"><i class="icon-request"></i></div><span class="menu-item-text">Request</span></a></li>
					<? } ?>
					
					
					<? if (\Yii::$app->user->can('createUser')) { ?>
                    <li class="<?= Yii::$app->controller->route == 'applicants/report'?'active':''?>"><a target="_blank" href="<?= Url::to(['applicants/report'])?>"><div class="menu-item-icon"><i class="icon-reports"></i></div><span class="menu-item-text">Reports</span></a></li>
					<? } ?>
                    
					
					<? if (\Yii::$app->user->can('createUser')) { ?>
                    <li class="menu-item-has-children <?= Yii::$app->controller->route == 'applicants/allocatedreservedshops'?'active':Yii::$app->controller->route == 'applicants/exemption'?'active':''?>"><a href="#"><div class="menu-item-icon"><i class="icon-exemption"></i></div><span class="menu-item-text">Exemption</span></a>
                    	<ul class="sub-menu">
                    		<li class="<?= Yii::$app->controller->route == 'applicants/allocatedreservedshops'?'active2':''?>"><a href="<?= Url::to(['applicants/allocatedreservedshops'])?>">Create Exemption</a></li>
                    		<li class="<?= Yii::$app->controller->route == 'applicants/exemption'?'active2':''?>"><a href="<?= Url::to(['applicants/exemption'])?>">View Exemption Batch</a></li>
                    	</ul>
                    </li>
					<? } ?>
					
					
					
					<? if (\Yii::$app->user->can('createUser')) { ?>
                    <li class="<?= Yii::$app->controller->route == 'applicants/getshops'?'active':''?>"><a href="<?= Url::to(['applicants/getshops'])?>"><div class="menu-item-icon"><i class="icon-shop"></i></div><span class="menu-item-text">Shop</span></a></li>
					<? } ?>
					
                    
                    <li class=""><a href="#"><div class="menu-item-icon"><i class="icon-logout"></i></div><span class="menu-item-text">
						<?= Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout',
                ['class' => 'btn  logout  whites']
            )
            . Html::endForm();
								?>
						
						</span></a></li>
                </ul>
            </nav>
		</div>
		<div class="dashboard-right clearfix">
			<header class="dashboard-header">
				<div class="dashboard-header-wrapper">
					<div class="logo">
						<a href="#">
							<img src="asset/img/logo-icon.png" class="img-fluid d-md-none" alt="">
							<img src="asset/img/logo.png" class="img-fluid d-none d-md-inline-block" alt="">
						</a>
					</div>
					<? if (\Yii::$app->user->can('createUser')) { ?>
					<div >
						
						<div class="das-notification">
							<div class="fa fa-bell" style="font-size:30px">
							
							</div>
							<div class="das-profile-info">
								<h4 style="color:red"><?= count($getNotificaltion)?></h4>
							</div>
							
						</div>
						
					</div>
					<? } ?>
					
					<div class="dashboard-header-profile clearfix">
						
						<div class="das-profile">
							<div class="das-profile-image fa fa-user" style="font-size:50px">
							
							</div>
							
							<div class="das-profile-info">
								<h4><?= Yii::$app->user->identity->staffdetails->fullname;?></h4>
								<p><? //= Yii::$app->user->identity->role->item_name; ?> </p>
							</div>
						</div>
						<div class="das-profile-menu">
							<ul>
								
								<li><?= Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout',
                ['class' => 'btn  logout  ']
            )
            . Html::endForm();
								?></li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<div class="main-dashboard-body">
				<?= $content ?>
			</div>
		</div>
	</main>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
