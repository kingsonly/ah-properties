<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .control-label{
        font-size: 14px !important;
    }
</style>
<div class="site-login">
   
     <div class="container">
        <div class="box welcome-banner">
            <p id="title">KAFE DISTRICT MARKET</p>
        </div>


        <div class="box welcome-form">
            <div id="form-content">
                <h2>Welcome</h2>
                <h5>Enter your log in details</h5>
                
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            
                    </div>

                    <div>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>

                    <?= Html::a('Forgot password', ['site/request-password-reset']) ?>"

                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <a href="https://yisola.github.io/kafe-district-market/page3.html">ADD NEW STAFF</a>

                 <?php ActiveForm::end(); ?>
            </div>
        </div>


</div>
</div>
