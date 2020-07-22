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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
  <div class="container-fluid menushadow ">
			<div class="container">
				<div class="row menu-container align-items-center">
					<div class="col-md-5 header-text-color">
						<h4>KAFE DISTRICT MARKET</h4>
					</div>
					<div class="col-md-7 ">
						 <ul class="nav justify-content-end">
							<li class="nav-item">
								<a class="nav-link header-text-color" href="<?= Url::to(['site/dashboard'])?>">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link header-text-color" href="#">Settings</a>
							</li>
							<li class="nav-item">
								<?= Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout nav-link header-text-color']
            )
            . Html::endForm();
								?>
								
							</li>
							
							</ul> 
					</div>
				</div>
				
			</div>
		  
		</div> 
		
<!--		add a notification div here-->
		
		<!--		add a notification div starts here-->
<!--
		<div class="container notification-container">
			<div class="notification-container-content align-items-center d-flex">
				<div class="col-md-12">
					<h6>
						put notification here
					</h6>
				</div>
			</div>
		</div>
-->
	

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
