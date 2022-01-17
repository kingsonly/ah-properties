<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */


?>


<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	
		  <tr>
          <td valign="middle" class="hero" style="background:#000;height: 100px;position: relative;">
            <table>
            	<tr>
            		<td>
            			<div class="text" style="padding: 0 3em; text-align: center; color: rgba(255,255,255,.8);">
            				<h2 style="color: #ffffff;font-size: 20px;margin-bottom: 0;"><?= $header;?></h2>
            			</div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
	      <tr>
		      <td style="background:#fff">
		        
				 <div style="max-width: 600px;min-width: 320px !important; margin: 0 auto;" class="email-container">
				  	<?= $body;?>
				  </div>
				
		      </td>
		    </tr><!-- end:tr -->
		<tr>
			<td style="background:#fff">
		        
				 <div style="max-width: 600px;min-width: 320px !important; margin: 0 auto;" class="email-container">
				  	<a href="http://<?= $link; ?>" class="btn btn-info" role="button">View Letter</a>
					 <br/>
					 <br/>
					 <?= $message; ?>
					 <br/>
					 <br/>
				  </div>
				
		      </td>
	</tr>
	
	
      <!-- 1 Column Text + Button : END -->
  </table>