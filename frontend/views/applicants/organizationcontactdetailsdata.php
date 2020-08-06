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
<style>
	.hidden{
		display: none;
	}
	.confirmbox{
		text-align: center;
		height: 150px;
		
		padding: 20px 0;
		margin-bottom: 5px;
	}
</style>

<div>
	<div class="container content-form-area">
<!--							form content goes here-->
	<?php $form = ActiveForm::begin(['id' => 'organization_contact']); ?>
		<div class="row" style="margin-top:20px">
			<div class="col-md-12 form-area">

				<div class="box-label">ORGANIZATION ADDRESS  </div>


				<div class="row">
					<div class="col-md-6">
						<?= $form->field($model, 'house_no')->textInput(['id' => 'house_no']); ?>

					</div>
					<div class="col-md-6">
						<?= $form->field($model, 'street_name')->textInput(['id' => 'street_name']); ?>
						<?//= $form->field($model, 'agent_gender')->dropDownList(ArrayHelper::map($gender, 'id', 'name'),['class'=>'custom-select']) ?>
					</div>

				</div>

				<div class="row" >
					<div class="col-md-6">

						<?= $form->field($model, 'street_extention')->textInput(['id' => 'street_extention']); ?> 

					</div>
					
					<div class="col-md-6">

						<?= $form->field($model, 'district')->textInput(['id' => 'district']); ?> 
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

		</div>
		
		<div class="row" style="margin-top:20px">
			<div class="col-md-12 form-area">

				<div class="box-label">ORGANIZATION CONTACT </div>
				

				<div class="row" >


					<div class="col-md-4">
						<?= $form->field($model, 'pobox')->textInput(['id' => 'pobox']); ?>
					</div>

					<div class="col-md-4">
						<?= $form->field($model, 'office_number')->textInput(['id' => 'office_number']); ?>

					</div>
					
					<div class="col-md-4">
						<?= $form->field($model, 'email')->textInput(['id' => 'email']); ?>
					</div>

				</div>


			</div>

		</div>
		
		<div class="row" style="margin-top:20px">
			<div class="col-md-12 form-area">

				<div class="box-label">ADDRESS DOCUMENT </div>
				

				<div class="row" >


					<div class="col-md-12">
						<?= $form->field($model, 'c_o')->textInput(['id' => 'c_o']); ?>
						<?= $form->field($model, 'applicant_id')->hiddenInput(['id' => 'applicant_id','value' => $rootModel])->label(false); ?>
					</div>


				</div>


			</div>

		</div>

		<div class="row mar-t-10" >
			

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

</div>

<?
	$organizationContactUrl = Url::to(['applicants/processorganizationcontact']);
	$organizationContactPersonBios = Url::to(['applicants/organizationcontactpersonbios']);
	$biodataform = <<<JS
	
	
	
	
	
	
	$('#organization_contact').on('beforeSubmit', function (e) {
	toastr.info('Proccessing  Data Please Wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$organizationContactUrl',
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
				
				$(document).find('#renderapplicationform').load('$organizationContactPersonBios'+'&id='+data.data.applicant_id);
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#organizationcontact').addClass('active')
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
