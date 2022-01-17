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
use frontend\models\KdmSpaceType;
use frontend\models\KdmBlock;
use frontend\models\KdmFloor;
use frontend\models\KdmQuadrant;
$space = KdmSpaceName::find()->all();
$spacetype = KdmSpaceType::find()->all();
$quadrant = KdmQuadrant::find()->all();
$block = KdmBlock::find()->all();
$floor = KdmFloor::find()->all();
$reseved = [
	['id' =>0, 'name' => 'Regular'],
	['id' =>1, 'name' => 'Vip'],
	['id' =>2, 'name' => 'Reserved'],
]
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

			<div class="box-label">Space Booking </div>
			
			
			<?php $form = ActiveForm::begin(['id' => 'createbooking']); ?>
			
			<div class="row formrow">
				<div class="col-md-6">

						<?= $form->field($model, 'space_id')->dropDownList(ArrayHelper::map($space, 'id', 'name'),['class'=>'custom-select','id' => 'space']) ?>

					</div>
				
					<div class="col-md-6">

						<?= $form->field($model, 'name')->textInput() ?>

					</div>	
				
				<div class="col-md-6">

						<?= $form->field($model, 'space_type_id')->dropDownList(ArrayHelper::map($spacetype, 'id', 'name'),['class'=>'custom-select','id' => 'space']) ?>

					</div>	
				
				<div class="col-md-6">

						<?= $form->field($model, 'quadrant_id')->dropDownList(ArrayHelper::map($quadrant, 'id', 'name'),['class'=>'custom-select','id' => 'space']) ?>

					</div>	
				
				<div class="col-md-6">

						<?= $form->field($model, 'block_id')->dropDownList(ArrayHelper::map($block, 'id', 'name'),['class'=>'custom-select','id' => 'space']) ?>

					</div>	
				
				<div class="col-md-6">

						<?= $form->field($model, 'floor_id')->dropDownList(ArrayHelper::map($floor, 'id', 'name'),['class'=>'custom-select','id' => 'space']) ?>

					</div>	
				<div class="col-md-6">

						<?= $form->field($model, 'price')->textInput() ?>
					</div>	
				
				<div class="col-md-6">

						<?= $form->field($model, 'reserved')->dropDownList(ArrayHelper::map($reseved, 'id', 'name'),['class'=>'custom-select','id' => 'space']) ?>

					</div>	
				
					
					
				
				
				
				
				<div class="col-md-12">
					<?= Html::submitButton('Update', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
				</div>
				
			</div>
		
			
			
			
			<?php ActiveForm::end(); ?>

		</div>

	</div>

