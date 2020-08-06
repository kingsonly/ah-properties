<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\KdmState;
use yii\bootstrap4\Modal;
use kartikorm\ActiveForm as activeform2;
use kartik\date\DatePicker;
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

$gender =[
	[
	'id' =>'Male',
	'name' =>'Male',
	],
	[
	'id' =>'Female',
	'name' =>'Female',
	]
];

$marriage =[
	[
	'id' =>'Single',
	'name' =>'Single',
	],
	[
	'id' =>'Married',
	'name' =>'Married',
	],
	[
	'id' =>'Separated',
	'name' =>'Separated',
	],
	[
	'id' =>'Separated',
	'name' =>'Separated',
	],
	
	[
	'id' =>'Divorced',
	'name' =>'Divorced',
	],
	[
	'id' =>'Widowed',
	'name' =>'Widowed',
	],
];

$edu =[
	[
	'id' =>'Primary',
	'name' =>'Primary',
	],
	[
	'id' =>'Secondary',
	'name' =>'Secondary',
	],
	[
	'id' =>'Tertiary',
	'name' =>'Tertiary',
	],
	
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
<div class="container content-area">

							 <?php $form = ActiveForm::begin(['id' => 'bio']); ?>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group" >
											
											<?= $form->field($model, 'title')->dropDownList(ArrayHelper::map($titles, 'id', 'name'),['class'=>'custom-select']) ?>
											<?= $form->field($model, 'applicant_id')->hiddenInput(['value' => $rootModel])->label(false); ?>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="custom-file">
												
												<?= $form->field($model, 'imageFile',['template' => "{label}\n<div class='col-md-6'>{input}</div>\n{hint}\n{error}",
                    'labelOptions' => [ 'class' => 'custom-file-label' ]])->fileInput(['class'=>'customFile']) ?>
    										</div>
								  		</div>
										
									</div>
								</div>
								  
								
								<div class="row">
									<div class="col-md-4">
									
										<?= $form->field($model, 'first_name')->textInput(['id' => 'first_name']); ?>
									  
									</div>
									<div class="col-md-4">
									
										<?= $form->field($model, 'middle_name')->textInput(['id' => 'middle_name']); ?>
									  
									</div>
									<div class="col-md-4">
									
										<?= $form->field($model, 'last_name')->textInput(['id' => 'last_name']); ?>
									  
									</div>
								</div>
								  
                            
                               
								<div class="row">
									<div class="col-md-4">
											
											<? echo $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [
											'options' => ['placeholder' => 'Enter birth date ...'],
											'pluginOptions' => [
												'autoclose'=>true,
												'format' => 'yyyy-mm-dd'
											]
										]);?>
									  </div>
									
									<div class="col-md-4">
										<?= $form->field($model, 'gender')->dropDownList(ArrayHelper::map($gender, 'id', 'name'),['class'=>'custom-select']) ?>
									</div>
									
									<div class="col-md-4">
										<?= $form->field($model, 'occupation')->textInput(['id' => 'occupation']); ?>
									</div>
								</div>
								  
								
								<div class="row">
									<div class="col-md-4">
										
											<?= $form->field($model, 'nationality')->dropDownList(ArrayHelper::map($country, 'id', 'name'),['class'=>'custom-select']) ?>
										
									</div>
                                    <div class="col-md-4">
                                    	
											<?= $form->field($model, 'state_of_origin')->dropDownList(ArrayHelper::map($state, 'id', 'name'),['class'=>'custom-select','id' => 'state']) ?>
										
									</div>
                                    
                                    <div class="col-md-4">
								  		 
											
											
											 <? echo $form->field($model, 'local_government_of_origin')->widget(DepDrop::classname(), [
											 'options' => ['id'=>'lga'],
											 'pluginOptions'=>[
												 'depends'=>['state'],
												 'placeholder' => 'Select...',
												 'url' => Url::to(['/applicants/localgov'])
											 ]
										 ]); ?>
										
									</div>
								  		
										
									</div>
								
								  
								
								<div class="row">
									<div class="col-md-4">
            						
											<?= $form->field($model, 'marital_status')->dropDownList(ArrayHelper::map($marriage, 'id', 'name'),['class'=>'custom-select']) ?>
										
									</div>
                                    <div class="col-md-4">
                                   
											<?= $form->field($model, 'highest_education')->dropDownList(ArrayHelper::map($edu, 'id', 'name'),['class'=>'custom-select']) ?>
										
									</div>
									<div class="col-md-4">
									</div>
                                    
                                    
								  		 
                                   
										
									</div>
	
								<div class="row">
									<div class="col-md-5">
										<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
									</div>
									<div class="col-md-5">
										<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
									</div>
									<div class="col-md-2"></div>
								</div>
								
								  
								<?php ActiveForm::end(); ?> 
						
						</div> 




<?
	$createBioUrl = Url::to(['applicants/processbio']);
	$contactDetails = Url::to(['applicants/contactdata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});
	
	$('#bio').on('beforeSubmit', function (e) {
	toastr.info('Processing biodata please wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createBioUrl',
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
				$(document).find('#renderapplicationform').load('$contactDetails'+'&id='+newData.applicant_id);
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#contactdetails').addClass('active')
				toastr.success('Bio Data  Saved')
	
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

