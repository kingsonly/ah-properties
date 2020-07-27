<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\KdmState;
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

$dbState = KdmState::find()->andWhere(['country_id' => 160])->all();
$state = [];

foreach($dbState as $key => $value){
	array_push($state,[
	'id' =>$value->id,
	'name' =>$value->name,
	]);
}

?>
<style>
	
</style>
<div class="container">
<!--							form content goes here-->
							 <div class="row">
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-12">
												<h6 class="header-text-color">ID</h6>
												<h5><?= $bioData->applicant_id;?></h5>
											
											</div>
										
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<h6 class="header-text-color">Name</h6>
												<h5><?= $bioData->last_name.' '.$bioData->first_name.' '.$bioData->middle_name;?> </h5>
											
											</div>
										
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<h6 class="header-text-color">Occupation</h6>
												<h5><?= $bioData->occupation;?></h5>
											
											</div>
										
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												
												<?= Html::img('@web/'.$bioData->image, ['alt' => 'My logo','class'=>'imgtins']) ?>
											
											</div>
										
										</div>
										
									</div>
								</div>
							
							
						</div> 
						
						<div class="container content-form-area">
<!--							form content goes here-->
							<?php $form = ActiveForm::begin(['id' => 'contactDetails']); ?>
							
							<div class="row">
											<div class="col-md-12 form-area">
												
												<div class="box-label">RESIDENTIAL ADDRESS</div>
												
												
													<div class="row">
														<div class="col-md-9">
															<div class="form-group">
																<?= $form->field($model, 'street_name')->textInput(['id' => 'street_name']); ?>
																
																<?= $form->field($model, 'applicant_id')->hiddenInput(['value' => $bioData->applicant_id])->label(false); ?>
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
											 'pluginOptions'=>[
												 'depends'=>['state'],
												 'placeholder' => 'Select...',
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
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
												</div>
												<div class="col-md-5">
													<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												<div class="col-md-2"></div>
												
												
										
										</div>
								</div>
								
							 
							<?php ActiveForm::end(); ?> 
							
						</div>
							
<?
	$createContactUrl = Url::to(['applicants/processcontact']);
	$nextofkinDetails = Url::to(['applicants/nextofkindata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});



	
	
	
	$('#contactDetails').on('beforeSubmit', function (e) {
	toastr.info('Proccessing Contact details please wait')
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
				$(document).find('#renderapplicationform').load('$nextofkinDetails'+'&id='+newData.applicant_id);
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#nextofkin').addClass('active')
				toastr.success('Contact Saved')
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
