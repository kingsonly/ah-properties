<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\KdmInvoice */

$this->title = 'Create Kdm Invoice';
$this->params['breadcrumbs'][] = ['label' => 'Kdm Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kdm-invoice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
