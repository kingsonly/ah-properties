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

	<?php $form = ActiveForm::begin(['id' => 'organizationbio']); ?>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($model, 'applicant_id')->hiddenInput(['id' => 'applicant_id','value' => $rootModel])->label(false); ?>
			<?= $form->field($model, 'organization_name')->textInput(['id' => 'organization_name']); ?>
			
		</div>

	</div>
	
	<div class="row">
		<div class="col-md-4">
			
			<?= $form->field($model, 'organization_country')->dropDownList(ArrayHelper::map($country, 'id', 'name'),['class'=>'custom-select']) ?>

		</div>
		
		<div class="col-md-4">
			<?= $form->field($model, 'organization_state')->dropDownList(ArrayHelper::map($state, 'id', 'name'),['class'=>'custom-select','id' => 'state']) ?>
				
		</div>
		
		<div class="col-md-4">
			
			
			
			<? echo $form->field($model, 'organization_local_government')->widget(DepDrop::classname(), [
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
		<div class="col-md-5">
			<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design', 'id' =>'actionbutton']) ?>
													<?= Html::button('Wait Loading ..........', ['class' => 'btn btn-warning btn-lg  button-design','id' =>'loaders']) ?>
		</div>
		<div class="col-md-5">
			<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
		</div>
		<div class="col-md-2"></div>
	</div>


	<?php ActiveForm::end(); ?> 
						
</div> 




<?
	$createOganizationbioUrl = Url::to(['applicants/processorganizationbio']);
	$organizationcontactdetailsdataDetails = Url::to(['applicants/organizationcontactdetailsdata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});



	
	
	
	$('#organizationbio').on('beforeSubmit', function (e) {
	toastr.info('Proccessing biodata please wait')
	$(document).find('#actionbutton').hide()
	$(document).find('#loaders').show()
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$createOganizationbioUrl',
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
				$(document).find('#renderapplicationform').load('$organizationcontactdetailsdataDetails'+'&id='+newData.applicant_id);
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#organizationaddress').addClass('active')
	
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

