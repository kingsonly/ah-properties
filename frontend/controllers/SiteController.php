<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\KdmShop;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\KdmStaff;
use frontend\models\CsvForm;
use frontend\models\KdmRootApplicant;
use frontend\models\KdmInvoice;
use frontend\models\KdmApplicantFileNumber;
use frontend\models\KdmInvoiceLinkPayment;
use yii\web\UploadedFile;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = 'loginlayout';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/dashboard']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
				
            ]);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
		$this->layout = 'loginlayout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
	
	
	
	public function actionDashboard()
    {
		$totalApplicantModel = KdmApplicantFileNumber::find()->all();
		$totalApplicant = [];
		foreach($totalApplicantModel as $value){
			if(!empty($value->applicantid)){
				if($value->applicantid->stage_status == 9){
					array_push($totalApplicant,$value);
				}
			}
			
			
		}
		
		
		
		$jan = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "01"])->all();
		$feb = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "02"])->all();
		$mar = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "03"])->all();
		$apr = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "04"])->all();
		$may = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "05"])->all();
		$jun = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "06"])->all();
		$jul = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "07"])->all();
		$aug = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "08"])->all();
		$sep = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "09"])->all();
		$oct = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "10"])->all();
		$nov = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "11"])->all();
		$dec = KdmRootApplicant::find()->andWhere(['stage_status' => 9])->andWhere(['YEAR(date_created)' => date("Y"),"MONTH(date_created)" => "12"])->all();
		
		$applicant5 = KdmRootApplicant::find()
			->andWhere(['stage_status' => 9])
			->orderBy(['id'=>SORT_ASC])
			->limit(5)
			->all();
		
		$users5 = User::find()
			->andWhere(['status' => 10])
			->orderBy(['id'=>SORT_ASC])
			->limit(5)
			->all();
		$paid = [];
		$invoice = KdmInvoice::find()->all();
		$over40 = [];
		
		$penddingPayment = [];
		foreach($invoice as $key =>$value){
			if($value->sumpayment > 0 and $value->sumpayment < $value->amount){
				//array_push($penddingPayment,$value);
				array_push($over40,$value);
				
			}elseif($value->sumpayment >= $value->amount){
				array_push($paid,$value);
			}else{
				array_push($penddingPayment,$value);
			}
			
			
		}
		
		
        return $this->render('dashboard',[
			'totalapplicant' => count($totalApplicant),
			'paid' => count($paid),
			'over40' => count($over40),
			'penddingPayment' => count($penddingPayment),
			'applicant5' => $applicant5,
			'users5' => $users5,
			'jan' => count($jan),
			'feb' => count($feb),
			'mar' => count($mar),
			'apr' => count($apr),
			'may' => count($may),
			'jun' => count($jun),
			'jul' => count($jul),
			'aug' => count($aug),
			'sep' => count($sep),
			'oct' => count($oct),
			'nov' => count($nov),
			'dec' => count($dec),
			
			
		]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
    public function actionSignup()
    {
        $model = new SignupForm();
        $staff_model = new KdmStaff();
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
        
        $role = [
            [
                'id' => 'admin',
                'name' => 'Admin',
            ],
            [
                'id' => 'allocation',
                'name' => 'Allocation',
            ],
			[
                'id' => 'verification',
                'name' => 'Verification',
            ],
			[
                'id' => 'dataentry',
                'name' => 'Data Entry',
            ]
        ];
		
		

        if ($model->load(Yii::$app->request->post()) && $staff_model->load(Yii::$app->request->post())) {
            //return var_dump(Yii::$app->request->post('KdmStaff')['position']);
            $user_id = $model->signup(Yii::$app->request->post('KdmStaff')['position']);
            if(!empty($user_id)){
                $staff_model->staff_user_id = $user_id;
                if($staff_model->save()){
                    Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                    return $this->goHome();
                }
                
            }
            
        }

        return $this->render('signup', [
            'model' => $model,
            'staff_model' => $staff_model,
            'gender' => $gender,
            'edu' => $edu,
            'marriage' => $marriage,
            'role' => $role
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
	
	public function actionUpload(){
    $model = new CsvForm;
   $block = [
	   'D' => 1,
	   'H' => 2,
	   'C' => 3,
	   'F' => 4,
	   'G' => 5,
	   'I' => 6,
	   'J' => 7,
	   'M' => 8,
	   'K' => 9,
	   'L' => 10,
	   'N' => 11,
	   'O' => 12,
	   'S' => 13,
	   'Q' => 14,
	   'R' => 15,
	   'U' => 16,
	   'T' => 17,
	   'X' => 18,
	   'V' => 19,
	   'W' => 20,
   ];
	$quater = [
		'ONE' => 1,
		'TWO' => 2,
		'THREE' => 3,
		'FOUR' => 4,
	];
	$type = [
		'TYPE1' => 2,
		'TYPE2' => 3,
		'TYPE3' => 4,
		'SERVICESHOPS' => 5,
		'TYPE2A' => 6,
	];
	$space = [
		'BANKINGHALL' => 1,
		'RETAILSHOP' => 2,
		'DISPLAYSHOP' => 3,
		'SMALLOFFICESPACE' => 4,
		'BIGOFFICESPACE' => 5,
		'FADAMASHOPS' => 6,
		'SINGLECOLDROOMS' => 7,
		'DOUBLECOLDROOMS' => 8,
		'FOODCOURT' => 9,
		'RESTAURANT' => 10,
		'FASTFOOD' => 11,
		'SMALLWAREHOUSE' => 12,
		'BIGWAREHOUSE' => 13,
		'DUPLEXSHOP' => 14,
		'LUXURYDUPLEXSHOP' => 15,
	];
	$floor = [
		'ALLFLOORS' => 1,
		'GROUND' => 2,
		'FIRST' => 3,
		'SECOND' => 4,
		'THIRD' => 5,
		
	];
    if($model->load(Yii::$app->request->post())){
        $file = UploadedFile::getInstance($model,'file');
        $filename = 'Data.'.$file->extension;
        $upload = $file->saveAs('uploads/'.$filename);
        if($upload){
            define('CSV_PATH','uploads/');
            $csv_file = CSV_PATH . $filename;
            //$filecsv = file($csv_file);
            //print_r($filecsv);
			$newdata = [];
			if (($h = fopen($csv_file,'r')) !== FALSE) 
			{
			  // Convert each line into the local $data variable
			  while (($data = fgetcsv($h, 100000, ",")) ) 
			  {	
				  
				  $model = new KdmShop();
				  $spaces = str_replace(' ','',$data[0]);
				  $types = str_replace(' ','',$data[1]);
				  $quaters = str_replace(' ','',$data[2]);
				  $names = str_replace(' ','',$data[3]);
				  $blocks = str_replace(' ','',$data[4]);
				  $floors = str_replace(' ','',$data[5]);
				  $prices = (float) str_replace('.00','',str_replace(',','',$data[6]));
				  
				
				  $model->name = $names;
				  $model->space_id = $space[$spaces];
				  $model->space_type_id = !empty($types)?$type[$types]:1;
				  $model->quadrant_id = $quater[$quaters];
				  $model->block_id = $block[$blocks];
				  $model->floor_id = $floor[$floors];
				  $model->price = $prices ;
				  $model->status = 0;
				  $model->reserved = 2;
				  $model->save(false);
				  
				// Read the data from a single line
			  }

			  // Close the file
			  fclose($h);
			}
			var_dump($newdata);

            unlink('uploads/'.$filename);
			return;
        }
    }else{
        return $this->render('upload',['model'=>$model]);
    }
}
}
