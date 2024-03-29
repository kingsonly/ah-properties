<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\KdmInvoice */

$this->title = 'Update Kdm Invoice: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kdm Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kdm-invoice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
