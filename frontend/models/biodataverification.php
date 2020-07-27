<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\VerificationModel;
$verificationModel = new VerificationModel();
?>
<div class="container content-form-area">
<!--							form content goes here-->
							
							
						
								<div class="row" style="margin-top:20px">
											<div class="col-md-12 form-area">
												
												<div class="box-label">Applicant Selection </div>
												
												
												<div class="row" id="applicantselection">
														<div class="col-md-6">
															
														aa		
														</div>
														<div class="col-md-6">
															
														</div>
										 
														
														
													</div>
												
														
													</div>
													
													
													

												 
											</div>
												
											<?php $form = ActiveForm::begin(['id' => 'stage1_form']); ?>
											<div class="row ">
														
														<div class="col-md-1">
													<?= $form->field($verificationModel, "user_validate")->checkbox(['value' => '1', 'uncheckValue'=>'0', 'class' => '','id' => 'customCheck'])->label(false); ?>
																	
												</div>
												<div class="col-md-9">
													<?= Html::submitButton('SAVE AND CONTINUE', ['class' => 'btn btn-primary btn-lg  button-design']) ?>
													<?//= Html::button('GO BACK', ['class' => 'btn btn-default button-border btn-lg button-design','id' =>'test']) ?>
												</div>
												<div class="col-md-2"></div>
												
													</div>
										<?php ActiveForm::end(); ?>
										
								</div>
							