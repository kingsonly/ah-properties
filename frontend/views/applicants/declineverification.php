<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<style>
	.display_image{
		width: 200px;
		height: 300px;
	}
	.big_image{
		width: 300px;
		height: 400px;
	}
	.confirmbox{
		text-align: center;
		height: 150px;
		border: solid 2px #8EC7F0;
		padding: 20px 0;
		margin-bottom: 5px;
	}
	.checkcss{
		font-size: 50px;
		color: green;
	}
	.border-text-color{
		font-size: 30px;
		color: #1D90E2;
	}
</style>

						
						<div class="container ">
<!--							form content goes here-->
							
							
							
							
							<div class="row" style="margin-top:100px;text-align:center">
								
								<div class="col-md-12 confirmbox" style="text-align:center">
									
									<h1> Verification  Was Declined</h1>
								</div>
								
								<? $confirmUrl = Url::to(['applicants/applicants']);?>
								
								<a href="<?= $confirmUrl;?>" style="margin:0 auto">
									
															
													<?= Html::button('Go To Applicants', ['class' => 'btn btn-default button-border border-text-color btn-lg  button-design']) ?>
																</a>
							
							</div>
							
						</div>
							
								
								<?
	
	$declerationDetails = Url::to(['applicants/declerationdata']);
	$biodataform = <<<JS
	
	$("#customFile").on("change", function() {
  var fileName = $(this).val();
  $(document).find("#customFile").addClass("selected").html('fileName');
});


JS;
 
$this->registerJs($biodataform);
?>
