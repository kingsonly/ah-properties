<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KdmInvoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kdm-request-update-form">

    <?php $form = ActiveForm::begin(['id' => 'updateform']); ?>

    <?= $form->field($model, 'requester_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false); ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => '6']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'requestnewupdate','data-test' => '1234']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?
	$createNewRequest = Url::to(['applicants/requestupdate']);
	$contactDetails = Url::to(['applicants/contactdata']);
	$biodataform = <<<JS
	
	$('#updateform').on('beforeSubmit', function (e) {
	$(document).find('#actionbutton').hide()
	tablename = $(document).find('#requestnewupdate').data('tablename')
	tableid = $(document).find('#requestnewupdate').data('tableid')
	$(document).find('#loaders').show()
	toastr.info('Processing biodata please wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createNewRequest'+'&tablename='+tablename+'&tableid='+tableid,
        type: 'POST',
        data: formData,
        datatype:'json',
        // async: false,
        beforeSend: function() {
            // do some loading options
        },
        success: function (data) {
        	newData = data.data
			if(data.status == 1){
				alert('yes')
	
			}else{
				alert('Please confirm your data to make sure values are correct')
			}
			
			
        },

		complete: function() {
            // success alerts
        },

        error: function (data) {
        	alert('something went wrong') 
			$(document).find('#backcontainer').html('<button id="back" class="btn btn-success btndesign"><icon class="fa fa-arrow-circle-left"></icon>BACK</button>')
				$(document).find('.btndesign').on('click',function(){
		
			window.history.back();
			})
        },
        cache: false,
        contentType: false,
        processData: false
    });
		\$form.clear;
		return false;
	})

JS;
 
$this->registerJs($biodataform);
?>