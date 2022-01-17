<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\KdmState;
use frontend\models\KdmCities;
use kartik\depdrop\DepDrop;
$titles =[
	[
	'id' =>'Mr',
	'name' =>'Mr',
	],
	[
	'id' =>'Mrs',
	'name' =>'Mrs',
	],
	[
	'id' =>'Miss',
	'name' =>'Miss',
	]
];


$country =[
	[
	'id' =>'160',
	'name' =>'Nigeria',
	],
	
];
function getCity($id){
	$modelCity = KdmCities::find()->andWhere(['id' => $id])->one();
	
	return $modelCity->name;
}

$dbState = KdmState::find()->andWhere(['country_id' => 160])->all();
$state = [];

foreach($dbState as $key => $value){
	array_push($state,[
	'id' =>$value->id,
	'name' =>$value->name,
	]);
}

?>

<?php $form = ActiveForm::begin(['id' => 'contactDetails']); ?>
							
							<div class="row">
											<div class="col-md-12 form-area">
												
												<div class="box-label">RESIDENTIAL ADDRESS</div>
												
												
													<div class="row">
														<div class="col-md-9">
															<div class="form-group">
																<?= $form->field($model, 'street_name')->textInput(['id' => 'street_name']); ?>
																
																<?= $form->field($model, 'applicant_id')->hiddenInput()->label(false); ?>
														    </div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<?= $form->field($model, 'district')->textInput(['id' => 'district']); ?>
														    </div>

														</div>
													</div>
													
													<div class="row">
														
														<div class="col-md-4">
															<?= $form->field($model, 'country')->dropDownList(ArrayHelper::map($country, 'id', 'name'),['class'=>'custom-select']) ?>
														</div>
														<div class="col-md-4">
															<?= $form->field($model, 'state')->dropDownList(ArrayHelper::map($state, 'id', 'name'),['class'=>'custom-select','id' => 'state']) ?>

														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																
																<? echo $form->field($model, 'city')->widget(DepDrop::classname(), [
											 'options' => ['id'=>'lga'],
											'data'=>[$model->city => getCity($model->city)],
											 'pluginOptions'=>[
												 'depends'=>['state'],
												 'placeholder' => 'Select...',
												//'initialize' => true,
												 'url' => Url::to(['/applicants/localgov'])
											 ]
										 ]); ?>
														    </div>
															
														</div>
													</div>
													
													<div class="row">
														
														<div class="col-md-6">
															<div class="form-group">
																<?= $form->field($model, 'email')->textInput(['id' => 'email']); ?>
														    </div>
														</div>
														
														<div class="col-md-6">
															<div class="form-group">
																<?= $form->field($model, 'mobile_number')->textInput(['id' => 'number']); ?>
														    </div>
														</div>
													</div>

												 
											</div>
												
											<div class="col-md-12 ">
											<div class="row button-row">
														
												<div class="col-md-5">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design', 'id' =>'actionbutton']) ?>
													<?= Html::button('Wait Loading ..........', ['class' => 'btn btn-warning btn-lg  button-design','id' =>'loaders']) ?>
												</div>
												<div class="col-md-5">
													<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												<div class="col-md-2"></div>
												
												
										
										</div>
								</div>
								
							 
							<?php ActiveForm::end(); ?> 
								
								
								
<?
	$createContactUrl = Url::to(['applicants/processcontactupdate','id' =>$model->id,'updateid' => $updateid]);
	
	
	$biodataform = <<<JS
	
	$('#contactDetails').on('beforeSubmit', function (e) {
	toastr.info('Proccessing Contact details please wait')
	$(document).find('#actionbutton').hide()
	$(document).find('#loaders').show()
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createContactUrl',
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
			
				toastr.success('Contact Updated')
			}else{
				alert('Please confirm your data to make sure values are correct')
			}
			
			
        },

		complete: function() {
            // success alerts
        },

        error: function (data) {
        	alert('something went wrong') 
			
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