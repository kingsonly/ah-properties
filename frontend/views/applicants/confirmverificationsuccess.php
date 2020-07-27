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
									<svg width="1em" height="1em" viewBox="0 0 16 16" class=" checkcss bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
									  <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
									</svg>
									<h1> Verification  Saved</h1>
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
