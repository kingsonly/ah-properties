<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div style="min-height:100px; width:100%; border:solid 1px #8EC7F0; border-radius:2px">
                <div class="row" style="margin:auto; padding:20px">
                    <div class="col-lg-12">
                        
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($staff_model, 'firstname') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($staff_model, 'middlename') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($staff_model, 'lastname') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($staff_model, 'telephone') ?>
                                </div>
                                <div class="col-sm-8">
                                    <?= $form->field($model, 'email') ?>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-sm-3">
                                    <?= $form->field($staff_model, 'gender')->dropDownList(ArrayHelper::map($gender, 'id', 'name'),['class'=>'custom-select']) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($staff_model, 'dob') ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($staff_model, 'marital_status')->dropDownList(ArrayHelper::map($marriage, 'id', 'name'),['class'=>'custom-select']) ?> 
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($staff_model, 'educational_qualification')->dropDownList(ArrayHelper::map($edu, 'id', 'name'),['class'=>'custom-select']) ?>
                                </div>
                            </div>
                            <hr style="border:solid 1px #8EC7F0;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($staff_model, 'position')->dropDownList(ArrayHelper::map($role, 'id', 'name'),['class'=>'custom-select']) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model, 'password')->passwordInput() ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('Add Staff', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>

    
</div>
