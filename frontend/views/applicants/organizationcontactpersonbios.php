<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
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
	<?php $form = ActiveForm::begin(['id' => 'organization_contact_person']); ?>
		<div class="row" style="margin-top:20px">
			<div class="col-md-12 form-area">

				<div class="box-label">ORGANIZATION CONTACT PERSON  </div>


				<div class="row">
					<div class="col-md-4">
						<?= $form->field($model, 'title')->dropDownList(ArrayHelper::map($titles, 'id', 'name'),['class'=>'custom-select']) ?>

					</div>
					<div class="col-md-4">
						<?= $form->field($model, 'designation')->textInput(['id' => 'designation']); ?>
						<?= $form->field($model, 'applicant_id')->hiddenInput(['id' => 'designation','value' => $rootModel])->label(false); ?>
						
						
						
					</div>
					
					<div class="col-md-4">
						<?= $form->field($model, 'phone_number')->textInput(['id' => 'phone_number']); ?>
						<?//= $form->field($model, 'agent_gender')->dropDownList(ArrayHelper::map($gender, 'id', 'name'),['class'=>'custom-select']) ?>
					</div>

				</div>

				<div class="row" >
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
	$organizationContactUrl = Url::to(['applicants/processorganizationcontactperson']);
	$organizationuploaddocument = Url::to(['applicants/organizationuploaddocument']);
	$biodataform = <<<JS
	
	
	
	
	
	
	$('#organization_contact_person').on('beforeSubmit', function (e) {
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
				
				$(document).find('#renderapplicationform').load('$organizationuploaddocument'+'&id='+data.data.applicant_id);
	
				$(document).find('.list-group-item').removeClass('active');
				$(document).find('#identification').addClass('active')
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
