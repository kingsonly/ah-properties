<div class="row" >

		<div class="col-md-12 form-area" >

			<div class="box-label">FILES </div>


			<div class="row">
				<? foreach($rootModel->filenumber as $key => $value){ ?>
														<div class="col-md-3">
															
															<a href="<?= Url::to(['applicants/applicantfiledashboard','id' => $value->id])?>"> 
																<?= Html::img('@web/'.'uploads/passportplaceholder880628419658791.jpg', ['alt' => 'My logo','class'=>'display_image']) ?>
															</a>
															
															
															<h4><?= $value->file_number; ?></h4>
															
														</div>
													<?}?>
													

			</div>

		</div>

	</div>