<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\KdmState;
use yii\bootstrap4\Modal;
use kartikorm\ActiveForm as activeform2;
use kartik\depdrop\DepDrop;
use frontend\models\KdmSpaceName;
$space = KdmSpaceName::find()->all();
?>
<style>
	.amount_section{
		display: none;
		margin-top: 10px;
		font-size: 22px;
		font-weight: bolder;
	}
	.showproceed{
		display: none;
	}
	#amount_section_word{
		color:blue; 
	}
	.forminvoice{
		display: none;
	}
	.payment_term_greater{
		display: none;
	}
	.hiddenrow{
		display: none;
	}
	.reviewamountheader{
		font-size: 25px;
		margin-bottom: 10px;
		text-align: center;
	}
	.margin-top-for-shop-button{
		margin-top: 15px;
	}
</style>
<div class="row" >

		<div class="col-md-12 form-area" >

			<div class="box-label">Space Booking (Special) </div>
			<? if( $bookingModel == null){?>
			
			<?php $form = ActiveForm::begin(['id' => 'createbooking']); ?>
			
			<div class="row formrow">
				<? if (\Yii::$app->user->can('createUser')) { ?>
				<div class="col-md-12 margin-top-for-shop-button">
					<?= Html::button('Go To Regular Shops', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'loadspecial']) ?>
				</div>
				<? } ?>
				
					<div class="col-md-4">

						<?= $form->field($model, 'space')->dropDownList(ArrayHelper::map($space, 'id', 'name'),['class'=>'custom-select','id' => 'space']) ?>

					</div>	
					<div class="col-md-4">
						
						<? echo $form->field($model, 'type')->widget(DepDrop::classname(), [
							'options' => ['id'=>'type'],
							'pluginOptions'=>[
							'depends'=>['space'],
					 		'placeholder' => 'Select...',
					 		'url' => Url::to(['/applicants/gettypespecial'])
							]
						]); ?>

					</div>
				
					<div class="col-md-4">
						
						<? echo $form->field($model, 'quadrant')->widget(DepDrop::classname(), [
							'options' => ['id'=>'quadrant'],
							'pluginOptions'=>[
							'depends'=>['space','type'],
					 		'placeholder' => 'Select...',
					 		'url' => Url::to(['/applicants/getquadrantspecial'])
							]
						]); ?>

					</div>
				
					<div class="col-md-4">
						
						<? echo $form->field($model, 'block')->widget(DepDrop::classname(), [
							'options' => ['id'=>'block'],
							'pluginOptions'=>[
							'depends'=>['space','type','quadrant'],
					 		'placeholder' => 'Select...',
					 		'url' => Url::to(['/applicants/getblockspecial'])
							]
						]); ?>

					</div>
				
					<div class="col-md-4">
						
						<? echo $form->field($model, 'floor')->widget(DepDrop::classname(), [
							'options' => ['id'=>'floor'],
							'pluginOptions'=>[
							'depends'=>['space','type','quadrant','block'],
					 		'placeholder' => 'Select...',
					 		'url' => Url::to(['/applicants/getfloorspecial'])
							]
						]); ?>

					</div>
					
					<div class="col-md-4">
						
						<? echo $form->field($model, 'shop')->widget(DepDrop::classname(), [
							'options' => ['id'=>'shop'],
							'pluginOptions'=>[
							'depends'=>['space','type','quadrant','block','floor'],
					 		'placeholder' => 'Select...',
					 		'url' => Url::to(['/applicants/getshopspecial'])
							]
						]); ?>

					</div>
				<div class="col-md-4 amount_section" >
				</div>
					<div class="col-md-4 amount_section" id="amount_section">
						
							<div class="row">
								<div class="col-md-4" id="amount_section_word"> Amount:</div>
								<div class="col-md-8" id="amount_section_text">
								 
								</div>
							</div>
						
						
					</div>
				<div class="col-md-4 amount_section" >
				</div>
				
				<div class="col-md-12 showproceed">
					<?= Html::button('Proceed', ['class' => 'btn btn-primary btn-lg  button-design','id' =>'proceed']) ?>
				</div>
				
			</div>
		
			<div class="displaydetails hiddenrow">
				<div class="col-md-12 reviewamountheader"> Amount to Pay: <strong id="amounttopay"></strong></div>
				<div class="col-md-4">
				Space : <strong id="spacetext"></strong>
				</div>
				<div class="col-md-4">
					Type : <strong id="typetext"></strong>
				</div>
				<div class="col-md-4">
					Quadrant : <strong id="quadranttext"></strong>
				</div>
				<div class="col-md-4">
					Block : <strong id="blocktext"></strong>
				</div>
				<div class="col-md-4">
					Floor : <strong id="floortext"></strong>
				</div>
				<div class="col-md-4">
					Shop Number : <strong id="shoptext"></strong>
				</div>
				
				<div class="col-md-6 margin-top-for-shop-button ">
					<?= Html::submitButton('Proceed', ['class' => 'btn btn-primary btn-lg  button-design','id' =>'proceed']) ?>
				</div>
				
				<div class="col-md-6 margin-top-for-shop-button">
					<?= Html::button('Go Back', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'proceed']) ?>
				</div>

				
			</div>
			
			
			<?php ActiveForm::end(); ?>
			<? }else{?>
			
				<div class="row">
				<div class="col-md-12 reviewamountheader"> Amount <strong id="amounttopay">₦ <?= money_format("%!n", $bookingModel->shop->price);?></strong></div>
				<div class="col-md-4">
				Space : <strong id="spacetext"><?= $bookingModel->shop->space->name; ?></strong>
				</div>
				<div class="col-md-4">
					Type : <strong id="typetext"> <?= $bookingModel->shop->type->name?></strong>
				</div>
				<div class="col-md-4">
					Quadrant : <strong id="quadranttext"><?= $bookingModel->shop->quadrant->name; ?></strong>
				</div>
				<div class="col-md-4">
					Block : <strong id="blocktext"><?= $bookingModel->shop->block->name; ?></strong>
				</div>
				<div class="col-md-4">
					Floor : <strong id="floortext"><?= $bookingModel->shop->floor->name; ?></strong>
				</div>
				<div class="col-md-4">
					Shop Number : <strong id="shoptext"><?= $bookingModel->shop->name; ?></strong>
				</div>
				
				

				
			</div>	
			<? }?>

		</div>

	</div>

<?

	$id = $FileModel->id;
	$createBioUrl = Url::to(['applicants/processbio']);
	$proccessBooking = Url::to(['applicants/proccessbooking']);
	$shopUrl = Url::to(['applicants/getshopamount']);
	$contactDetails = Url::to(['applicants/contactdata']);
	$priceUrl = Url::to(['applicants/invoiceamount']);
	$invoice = Url::to(['applicants/invoice','id' => $id]);
	$spacebookingSpecial = Url::to(['applicants/spacebooking','id' => $id]);

	$biodataform = <<<JS
	
	
	$("#loadspecial").on("click", function() {
	
	$(document).find('#renderapplicationform').html('<h1> Loading Please Wait</h1>');
		
		$(document).find('#renderapplicationform').load('$spacebookingSpecial');
	})	
	
	$("#proceed").on("click", function() {
		$(document).find('.formrow').hide();
		$(document).find('.showproceed2').show()
		$(document).find('.displaydetails').removeClass('hiddenrow')
		$(document).find('.displaydetails').addClass('row')
		$(document).find('.forminvoice').hide()
		
		// use api and value of selected to proccess amount to be paid
		
		space = $(document).find( "#space option:selected" ).text();
		type = $(document).find( "#type option:selected" ).text();
		quadrant = $(document).find( "#quadrant option:selected" ).text();
		block = $(document).find( "#block option:selected" ).text();
		floor = $(document).find( "#floor option:selected" ).text();
		shop = $(document).find( "#shop option:selected" ).text();
		amounttopay = $(document).find( ".form-area" ).data('amount');
		
		$(document).find( "#spacetext" ).html(space);
		$(document).find( "#typetext" ).html(type);
		$(document).find( "#quadranttext" ).html(quadrant);
		$(document).find( "#blocktext" ).html(block);
		$(document).find( "#floortext" ).html(floor);
		$(document).find( "#shoptext" ).html(shop);
		$(document).find( "#amounttopay" ).html(amounttopay);
	})
	
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
  
});
	
	$('#createbooking').on('beforeSubmit', function (e) {
	toastr.info('Processing biodata please wait')
	var \$form = $(this);
		var formData = new FormData(\$form[0]);
		 
    $.ajax({
        url: '$proccessBooking'+'&id=$id',
        type: 'POST',
        data: formData,
        datatype:'json',
        // async: false,
        beforeSend: function() {
            // do some loading options
        },
        success: function (data) {
        	//newData = data.data
			if(data.status == 1){
//				
//				$(document).find('.list-group-item').removeClass('active');
//				$(document).find('#contactdetails').addClass('active')
//				toastr.success('Bio Data  Saved')
				$(document).find('#renderapplicationform').load('$invoice');
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
	
		$('#shop').on('change', function (e) {
			value = $(this).val();
			$(document).find(".form-area").data("store",value);
			$.ajax({
			url: '$shopUrl'+'&id='+value,
			type: 'POST',
			datatype:'json',
			// async: false,
			beforeSend: function() {
				// do some loading options
			},
			success: function (data) {
				
				$(document).find('.amount_section').show();
				$(document).find('.showproceed').show();
				$(document).find( ".form-area" ).data('amount',data.output);
				$(document).find('#amount_section_text').html('₦'+data.output);

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

			return false;
	})

JS;
 
$this->registerJs($biodataform);
?>