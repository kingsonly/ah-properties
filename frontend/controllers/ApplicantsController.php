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
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\KdmApplicantBioData;
use frontend\models\KdmContactDetails;
use frontend\models\KdmNextOfKin;
use frontend\models\KdmDocumentUpload;
use frontend\models\KdmPayment;
use frontend\models\KdmApplicantAgent;
use common\models\User;
use yii\web\UploadedFile;
/**
 * Site controller
 */
class ApplicantsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                   
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
    public function actionIndex($id=null)
    {
		$model = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		
		if($model){
			$modelStatus = $model->stage_status;
		}else{
			$modelStatus = 0;
		}
		return $this->render('index', [
			'stage' => $modelStatus,
                
            ]);
    }
	
	public function actionPreview($id=null)
    {
		
		$this->layout = 'preview';
		$modelBio = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		
		$modelKdmContactDetails = KdmContactDetails::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->one();
		
		$modelKdmNextOfKin = KdmNextOfKin::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->one();
		
		$modelKdmDocumentUpload = KdmDocumentUpload::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->all();
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->one();
		
		$modelKdmApplicantAgent = KdmApplicantAgent::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->one();
		
		$modelKdmUser = User::find()->andWhere(['id' => $modelBio->user_id])->one();
		
		return $this->render('preview', [
			'modelBio' => $modelBio,
			'modelKdmContactDetails' => $modelKdmContactDetails,
			'modelKdmNextOfKin' => $modelKdmNextOfKin,
			'modelKdmDocumentUpload' => $modelKdmDocumentUpload,
			'modelKdmPayment' => $modelKdmPayment,
			'modelKdmApplicantAgent' => $modelKdmApplicantAgent,
			'modelKdmUser' => $modelKdmUser,
                
            ]);
    }
	
	public function actionConfirm($id=null)
    {
		
		$this->layout = 'preview';
		$modelBio = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		$modelBio->status = 2;
		if($modelBio->save()){
			return $this->render('confirm', [
			
            ]);
		}else{
			return $this->render('confirm', [
			
            ]);
		}
		
		
    }
	
	
	public function actionView($id)
    {
            $this->layout = 'preview';
		$modelBio = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		
		$modelKdmContactDetails = KdmContactDetails::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->one();
		
		$modelKdmNextOfKin = KdmNextOfKin::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->one();
		
		$modelKdmDocumentUpload = KdmDocumentUpload::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->all();
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->one();
		
		$modelKdmApplicantAgent = KdmApplicantAgent::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->one();
		
		$modelKdmUser = User::find()->andWhere(['id' => $modelBio->user_id])->one();
		
		return $this->render('view', [
			'modelBio' => $modelBio,
			'modelKdmContactDetails' => $modelKdmContactDetails,
			'modelKdmNextOfKin' => $modelKdmNextOfKin,
			'modelKdmDocumentUpload' => $modelKdmDocumentUpload,
			'modelKdmPayment' => $modelKdmPayment,
			'modelKdmApplicantAgent' => $modelKdmApplicantAgent,
			'modelKdmUser' => $modelKdmUser,
                
            ]);
		
		
		
		
    }
	
	
	public function actionPayment($id)
    {
		
		$this->layout = 'preview';
		$modelBio = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['applicant_id' => $modelBio->applicant_id])->all();
		
		$modelKdmUser = User::find()->andWhere(['id' => $modelBio->user_id])->one();
		
		return $this->render('payment', [
			'modelBio' => $modelBio,
			'modelKdmPayment' => $modelKdmPayment,
			
                
            ]);
		
		
    }
	
	public function actionViewpayment($id)
    {
		
		$this->layout = 'preview';
		
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['id' => $id])->one();
		$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $modelKdmPayment->applicant_id])->one();
		
		$modelKdmUser = User::find()->andWhere(['id' => $modelBio->user_id])->one();
		
		return $this->render('viewpayment', [
			'modelBio' => $modelBio,
			'modelKdmPayment' => $modelKdmPayment,
			
                
            ]);
		
		
    }
	
	public function actionReceipt($id)
    {
		
		$this->layout = 'print';
		
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['id' => $id])->one();
		$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $modelKdmPayment->applicant_id])->one();
		
		$modelKdmUser = User::find()->andWhere(['id' => $modelBio->user_id])->one();
		
		return $this->render('receipt', [
			'modelBio' => $modelBio,
			'modelKdmPayment' => $modelKdmPayment,
			
                
            ]);
		
		
    }
	
	
	public function actionApplicants()
    {
		
		$this->layout = 'preview';
		$model = KdmApplicantBioData::find()->all();
		$modelApproved = KdmApplicantBioData::find()->andWhere(['status' => 3])->all();
		$modelPending = KdmApplicantBioData::find()->andWhere(['status' => 2])->all();
		$modelDeclined = KdmApplicantBioData::find()->andWhere(['status' => 4])->all();
		
		return $this->render('applicants', [
			'model' => $model,
			'modelApproved' => $modelApproved,
			'modelPending' => $modelPending,
			'modelDeclined' => $modelDeclined,
		]);
		
		
    }
	
	public function actionBiodata()
    {
		$model = new KdmApplicantBioData();
		return $this->renderAjax('biodata', [
			'model' => $model,
                
            ]);
    }
	
	public function actionContactdata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		$model = new KdmContactDetails();
		return $this->renderAjax('contactdata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	
	public function actionNextofkindata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		$model = new KdmNextOfKin();
		return $this->renderAjax('nextofkindata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	
	
	
	
	public function actionUploaddocumentdata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		$model = new KdmDocumentUpload();
		return $this->renderAjax('uploaddocumentdata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	
	public function actionPaymentdata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		$model = new KdmPayment();
		return $this->renderAjax('paymentdata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	
	public function actionAgentdata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		$model = new KdmApplicantAgent();
		return $this->renderAjax('agentdata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	
	public function actionDeclerationdata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['id' => $id])->one();
		$model = new KdmDocumentUpload();
		return $this->renderAjax('declerationdata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	
	public function actionProcessbio()
    {
		$model = new KdmApplicantBioData();
		
		
	
			
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->applicant_id = 'KDM/'.time();
			$model->stage_status = 1;
			$model->user_id = Yii::$app->user->identity->id;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				
				return ['status' => 1,'data' => $model];
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	public function actionProcesscontact()
    {
		$model = new KdmContactDetails();
		
		
        if ($model->load(Yii::$app->request->post()) ) {
			
			
			$model->status = 1;
			//$model->user_id = Yii::$app->user->identity->id;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if ($model->save()) {
				$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id'=>$model->applicant_id])->one();
				$bioData->stage_status = 2;
				if($bioData->save()){
					return ['status' => 1,'data' => $model,'id' =>$bioData->id];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
				
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	public function actionProcessnextofkin()
    {
		$model = new KdmNextOfKin();
		
		
        if ($model->load(Yii::$app->request->post()) ) {
			
			
			$model->status = 1;
			//$model->user_id = Yii::$app->user->identity->id;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if ($model->save()) {
				$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id'=>$model->applicant_id])->one();
				$bioData->stage_status = 3;
				if($bioData->save()){
					return ['status' => 1,'data' => $model,'id' =>$bioData->id];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
				
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	public function actionProcessuploaddocument()
    {
		$model = new KdmDocumentUpload();
			
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 1;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id'=>$model->applicant_id])->one();
				$bioData->stage_status = 4;
				
				if($bioData->save()){
					return ['status' => 1,'data' => $model,'id' => $bioData->id];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	public function actionProcesspayment()
    {
		
		$model = new KdmPayment();
			$model->bill_reff = '00000A1';
			$model->payment_id = '00000B1';
			$model->receipt_date = date('Y-m-d');
			$model->receit_id = '00A'.time();
			$model->payment_for = 'Application Fee';
		
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 1;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id'=>$model->applicant_id])->one();
				$bioData->stage_status = 5;
				
				if($bioData->save()){
					return ['status' => 1,'data' => $model,'id' => $bioData->id];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	public function actionProcessagent()
    {
		
		$model = new KdmApplicantAgent();
			
		
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->status = 1;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->save()) {
				$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id'=>$model->applicant_id])->one();
				$bioData->stage_status = 6;
				
				if($bioData->save()){
					return ['status' => 1,'data' => $model,'id' => $bioData->id];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	
	public function actionProcessdeclerationdata()
    {
		
		$model = new KdmDocumentUpload();
			
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 1;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id'=>$model->applicant_id])->one();
				$bioData->stage_status = 7;
				$bioData->status = 1;
				
				if($bioData->save()){
					return $this->redirect(['applicants/preview','id' => $bioData->id]);
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
    
    public function actionUpdate(){
         if (\Yii::$app->user->can('deletePost')) {
             return 12345;
         } else {
             return 'sorry you dont have the permission to update post';
         }
        
    }

   
}
