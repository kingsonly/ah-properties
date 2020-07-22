<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


?>
<?php $randomId = uniqid(); ?>
<div id="<?php echo $randomId; ?>"><?php //echo $randomId; ?></div>

<style>
	     .divs{
                
                    
                    margin-right: 50px;
                    margin-top: 61px;
                    
                    word-spacing: 10px;
                   
                    line-height: 76px;
			 		padding: 0 50px 0 50px;
                    
            }
            .dashboardminicontainer{
                
                    width: 100%;
                    height: 79px;
                    background-color: #fff;
                    margin-right: 50px;
                    margin-top: 61px;
                   
                    word-spacing: 28px;
                   
                    line-height: 76px;
				border-right: 10px solid #1D90E2;
				border-radius: 5px;
				box-shadow: 1px 1px 1px 1px #ccc;
                    
            }
            
         
            
            i{
                
                font-size: 20px;
                padding-top: 22px;
                margin-left: 52px;
            }
            
            ul{
                
                
            }
            
            ul li{
                list-style: none;
                display: inline-block;
                
                
            }
            
            ul li a{
                text-decoration: none;
                
                
                
            }
            
            .m{
                
                width: 169px;
                height: 44px;
            }
            
            .g{
                
                
            }
            
            .l{
                word-spacing: 6px
            }
</style>

<div class="container ">
							 
                            
                            <div class="divs">
								<h4>Welcome,<strong><?= Yii::$app->user->identity->first_name.' '.  Yii::$app->user->identity->last_name;?></strong> </h4>
								<div  class="dashboardminicontainer">
                                <ul class="list">
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-user-plus"></i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        Applicants
                                    </li>
                                    
                                    <li>
										<a href="<?= Url::to(['applicants/'])?>">
                                        <button type="button" class="btn btn-primary m fas fa-plus-circle g">Add New</button>
										</a>
                                    </li>
									
                                         
                                    <li>
										<a href="<?= Url::to(['applicants/applicants'])?>">
                                        <button type="button" class="btn btn-primary m fas fa-bars">View Applications </button>
										</a>
                                    </li>
                               
                                </ul>
								</div>
                                
                                
                                <div  class="dashboardminicontainer">
                                    <ul class="list">
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-users-cog"></i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        Staff
                                    </li>
                                    
                                    <li>
                                        <button type="button" class="btn btn-primary m fas fa-plus-circle g">Add New</button>
                                    </li>
                                         
                                    <li>
										
										<button type="button" class="btn btn-primary m fas fa-bars">View staff</button>
                                        
                                    </li>
                               
                                </ul>
                                
                                </div>
                                
                                <div  class="dashboardminicontainer">
                                    <ul class="list">
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-receipt"></i>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        Receipts
                                    </li>
                                    
                                    <li>
                                       
                                         <form class="form-inline " action="/action_page.php">
                                        
                                            <input type="email" class="form-control   " id="email" placeholder="e.g 10000001332 " name="email">
                                        
                                        </form>
                                        
                                        
                                    </li>
                                         
                                    <li>
                                        <button type="button" class="btn btn-primary m">Check Receipt</button>
                                    </li>
                               
                                </ul>
                                
                                
                                </div>
                                
                                    
                            
                            </div>
							
						</div> 
