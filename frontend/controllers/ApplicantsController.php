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
use frontend\models\KdmRootApplicant;
use frontend\models\RootModel;
use frontend\models\KdmApplicantFileNumber;
use frontend\models\KdmApplicantOrganizationBio;
use frontend\models\KdmOrganizationContactDetails;
use frontend\models\KdmDeclaration;
use frontend\models\KdmSpaceBooking;
use frontend\models\KdmCities;
use frontend\models\KdmShop;
use frontend\models\KdmBlock;
use frontend\models\KdmQuadrant;
use frontend\models\KdmSpaceType;
use frontend\models\KdmInvoice;
use frontend\models\KdmInvoiceLinkPayment;
use frontend\models\KdmFloor;
use frontend\models\Config;
use frontend\models\KdmApplicantOrganizationContactPersonDetails;
use frontend\models\BookingModel;
use common\models\User;
use yii\web\UploadedFile;
use yii\base\Model;
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
	
	//verification starts here
	public function actionStatverification($id=null){
		
		$model = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
		return $this->render('statverification', [
			'model' => $model,
            ]);
	}
	
	public function actionBiodataverification($id=null){
		
		$model = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('biodataverification', [
			'model' => $model,
            ]);
	}
	
	public function actionContactdataverification($id=null){
		
		$model = KdmContactDetails::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('contactdataverification', [
			'model' => $model,
            ]);
	}
	
	
	public function actionOrgbiodataverification($id=null){
		
		$model = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('orgbiodataverification', [
			'model' => $model,
            ]);
	}
	
	
	public function actionSpacebooking($id=null){
		
		$model = new BookingModel();
		$FileModel = KdmApplicantFileNumber::find()->andWhere(['id'=>$id])->one();
		// Check booking model to confirm if space have been booked for this file 
		$bookingModel = KdmSpaceBooking::find()->andWhere(['file_id' => $id])->one();
		return $this->renderAjax('spacebooking', [
			'model' => $model,
			'bookingModel' =>$bookingModel,
			'FileModel' =>$FileModel,
            ]);
	}
	
	
	public function actionInvoice($id=null){
		
		$model = KdmInvoice::find()->andWhere(['file_no' => $id])->one();
		$FileModel = KdmApplicantFileNumber::find()->andWhere(['id'=>$id])->one();
		return $this->renderAjax('invoice', [
			'model' => $model,
			'FileModel' =>$FileModel,
            ]);
	}
	
	public function actionFolderpayments($id=null){
		
		$model = new KdmPayment();
		$FileModel = KdmApplicantFileNumber::find()->andWhere(['id'=>$id])->one();
		return $this->renderAjax('folderpayments', [
			'model' => $model,
			'FileModel' =>$FileModel,
            ]);
	}
	
	public function actionOrgaddressverification($id=null){
		
		$model = KdmOrganizationContactDetails::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('orgaddressverification', [
			'model' => $model,
            ]);
	}
	
	public function actionOrgcontactpersonverification($id=null){
		
		$model = KdmApplicantOrganizationContactPersonDetails::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('orgcontactpersonverification', [
			'model' => $model,
            ]);
	}
	
	public function actionNextofkindataverification($id=null){
		
		$model = KdmNextOfKin::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('nextofkindataverification', [
			'model' => $model,
            ]);
	}
	
	public function actionIdentificationdataverification($id=null){
		
		$model = KdmDocumentUpload::find()->andWhere(['applicant_id' => $id,'status'=>0])->all();
		return $this->renderAjax('identificationdataverification', [
			'model' => $model,
            ]);
	}
	
	public function actionPaymentverification($id=null){
		
		$model = KdmPayment::find()->andWhere(['applicant_id' => $id])->all();
		return $this->renderAjax('paymentverification', [
			'model' => $model,
            ]);
	}
	
	public function actionAgentverification($id=null){
		
		$model = KdmApplicantAgent::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('agentverification', [
			'model' => $model,
            ]);
	}
	
	public function actionDeclerationverification($id=null){
		
		$model = KdmDeclaration::find()->andWhere(['applicant_id' => $id])->one();
		if($model->applicant->applicant_type == 1){
			$bioModel = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();;
		}else{
			$bioModel = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		}
		return $this->renderAjax('declerationverification', [
			'model' => $model,
			'bioModel' => $bioModel,
			
            ]);
	}
	
	public function actionConfirmverification($id=null){
		
		$model = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
		return $this->renderAjax('confirmverification', [
			'model' => $model,
            ]);
	}
	
	public function actionLocalgov() {
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = [];
		
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
			$getCities  = KdmCities::find()->andWhere(['state_id' => $cat_id])->all();
			foreach($getCities as $key => $value){
				array_push($out,[
					'id' =>$value->id,
					'name' =>$value->name,
					]);
			}
            
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            return ['output'=>$out, 'selected'=>''];
        }
    }
    return ['output'=>'', 'selected'=>''];
}
	
	
	
	
	
	public function actionPreview($id=null)
    {
		
		$this->layout = 'preview';
		$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$id])->one();
		$modelKdmDocumentUpload = KdmDocumentUpload::find()->andWhere(['applicant_id' => $id])->all();
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['applicant_id' => $id])->all();
		
		$modelKdmApplicantAgent = KdmApplicantAgent::find()->andWhere(['applicant_id' => $id])->one();
		
		$modelKdmUser = User::find()->andWhere(['id' => $rootModel->user_id])->one();
		if($rootModel->applicant_type == 1){
			$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		
			$modelKdmContactDetails = KdmContactDetails::find()->andWhere(['applicant_id' => $id])->one();

			$modelKdmNextOfKin = KdmNextOfKin::find()->andWhere(['applicant_id' => $id])->one();
		}else{
			$modelBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
			$modelContactPersonBio = KdmApplicantOrganizationContactPersonDetails::find()->andWhere(['applicant_id' => $id])->one();
			$modelContactBio = KdmOrganizationContactDetails::find()->andWhere(['applicant_id' => $id])->one();
		}
		
		
		
		
		if($rootModel->applicant_type == 1){
			return $this->render('preview', [
			'modelBio' => $modelBio,
			'modelKdmContactDetails' => $modelKdmContactDetails,
			'modelKdmNextOfKin' => $modelKdmNextOfKin,
			'modelKdmDocumentUpload' => $modelKdmDocumentUpload,
			'modelKdmPayment' => $modelKdmPayment,
			'modelKdmApplicantAgent' => $modelKdmApplicantAgent,
			'modelKdmUser' => $modelKdmUser,
			'rootModel' => $rootModel,
                
            ]);
		}else{
			return $this->render('preview', [
			'modelBio' => $modelBio,
			'modelKdmDocumentUpload' => $modelKdmDocumentUpload,
			'modelKdmPayment' => $modelKdmPayment,
			'modelKdmApplicantAgent' => $modelKdmApplicantAgent,
			'modelKdmUser' => $modelKdmUser,
			'modelContactPersonBio' => $modelContactPersonBio,
			'modelContactBio' => $modelContactBio,
			'rootModel' => $rootModel,
                
            ]);
		}
		
		
    }
	
	public function actionConfirm($id=null)
    {
		
		$this->layout = 'preview';
		return $this->render('confirm', [
			
            ]);
		
		
    }
	
	public function actionConfirmverificationsuccess($id=null)
    {
		
		$this->layout = 'preview';
		return $this->render('confirmverificationsuccess', [
			
            ]);
		
		
    }
	
	
	public function actionView($id)
    {

		
		$this->layout = 'preview';
		$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$id])->one();
		$modelKdmDocumentUpload = KdmDocumentUpload::find()->andWhere(['applicant_id' => $id])->all();
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['applicant_id' => $id])->all();

      
		
		$modelKdmApplicantAgent = KdmApplicantAgent::find()->andWhere(['applicant_id' => $id])->one();
		
		$modelKdmUser = User::find()->andWhere(['id' => $rootModel->user_id])->one();
		if($rootModel->applicant_type == 1){
			$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		
			$modelKdmContactDetails = KdmContactDetails::find()->andWhere(['applicant_id' => $id])->one();

			$modelKdmNextOfKin = KdmNextOfKin::find()->andWhere(['applicant_id' => $id])->one();
		}else{
			$modelBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
			$modelContactPersonBio = KdmApplicantOrganizationContactPersonDetails::find()->andWhere(['applicant_id' => $id])->one();
			$modelContactBio = KdmOrganizationContactDetails::find()->andWhere(['applicant_id' => $id])->one();
		}
		
		
		
		
		if($rootModel->applicant_type == 1){
			return $this->render('view', [
			'modelBio' => $modelBio,
			'modelKdmContactDetails' => $modelKdmContactDetails,
			'modelKdmNextOfKin' => $modelKdmNextOfKin,
			'modelKdmDocumentUpload' => $modelKdmDocumentUpload,
			'modelKdmPayment' => $modelKdmPayment,
			'modelKdmApplicantAgent' => $modelKdmApplicantAgent,
			'modelKdmUser' => $modelKdmUser,
			'rootModel' => $rootModel,
                
            ]);
		}else{
			return $this->render('view', [
			'modelBio' => $modelBio,
			'modelKdmDocumentUpload' => $modelKdmDocumentUpload,
			'modelKdmPayment' => $modelKdmPayment,
			'modelKdmApplicantAgent' => $modelKdmApplicantAgent,
			'modelKdmUser' => $modelKdmUser,
			'modelContactPersonBio' => $modelContactPersonBio,
			'modelContactBio' => $modelContactBio,
			'rootModel' => $rootModel,
                
            ]);
		}
		
		
		
		
    }
	
	public function actionApplicantfileview($id)
    {

		
		$this->layout = 'preview';
		$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$id])->one();
		$modelKdmDocumentUpload = KdmDocumentUpload::find()->andWhere(['applicant_id' => $id])->all();
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['applicant_id' => $id])->all();

      
		
		$modelKdmApplicantAgent = KdmApplicantAgent::find()->andWhere(['applicant_id' => $id])->one();
		
		$modelKdmUser = User::find()->andWhere(['id' => $rootModel->user_id])->one();
		if($rootModel->applicant_type == 1){
			$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		
			$modelKdmContactDetails = KdmContactDetails::find()->andWhere(['applicant_id' => $id])->one();

			$modelKdmNextOfKin = KdmNextOfKin::find()->andWhere(['applicant_id' => $id])->one();
		}else{
			$modelBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
			$modelContactPersonBio = KdmApplicantOrganizationContactPersonDetails::find()->andWhere(['applicant_id' => $id])->one();
			$modelContactBio = KdmOrganizationContactDetails::find()->andWhere(['applicant_id' => $id])->one();
		}
		
		
		
		
		if($rootModel->applicant_type == 1){
			return $this->render('applicantfileview', [
			'modelBio' => $modelBio,
			'modelKdmContactDetails' => $modelKdmContactDetails,
			'modelKdmNextOfKin' => $modelKdmNextOfKin,
			'modelKdmDocumentUpload' => $modelKdmDocumentUpload,
			'modelKdmPayment' => $modelKdmPayment,
			'modelKdmApplicantAgent' => $modelKdmApplicantAgent,
			'modelKdmUser' => $modelKdmUser,
			'rootModel' => $rootModel,
                
            ]);
		}else{
			return $this->render('applicantfileview', [
			'modelBio' => $modelBio,
			'modelKdmDocumentUpload' => $modelKdmDocumentUpload,
			'modelKdmPayment' => $modelKdmPayment,
			'modelKdmApplicantAgent' => $modelKdmApplicantAgent,
			'modelKdmUser' => $modelKdmUser,
			'modelContactPersonBio' => $modelContactPersonBio,
			'modelContactBio' => $modelContactBio,
			'rootModel' => $rootModel,
                
            ]);
		}
		
		
		
		
    }
	
	public function actionApplicantfiledashboard($id)
    {

		
		$this->layout = 'preview';
		$model = KdmApplicantFileNumber::find()->andWhere(['id'=>$id])->one();
		$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
		
		
		if($rootModel->applicant_type == 1){
			$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $rootModel->id])->one();
		
		}else{
			$modelBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $rootModel->id])->one();
		}
		
		
		
		
		if($rootModel->applicant_type == 1){
			return $this->render('applicantfiledashboard', [
			'modelBio' => $modelBio,
			'rootModel' => $rootModel,
			'model' => $model,
                
            ]);
		}else{
			return $this->render('applicantfiledashboard', [
			'modelBio' => $modelBio,
			'rootModel' => $rootModel,
				'model' => $model,
                
            ]);
		}
		
		
		
		
    }
	
	
	public function actionPayment($id)
    {
		
		$this->layout = 'preview';
		$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
		if($rootModel->applicant_type == 1){
			$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		}else{
			$modelBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		}
		
		$fileModel = KdmApplicantFileNumber::find()->andwhere(['applicant_id' => $rootModel->id])->all();
		
		$modelKdmUser = User::find()->andWhere(['id' => $rootModel->user_id])->one();
		
		return $this->render('payment', [
			'modelBio' => $modelBio,
			'fileModel' => $fileModel,
			'rootModel' => $rootModel,
			
                
            ]);
		
		
    }
	
	public function actionViewpayment($id)
    {
		
		$this->layout = 'preview';
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['id' => $id])->one();
		$rootModel = KdmRootApplicant::find()->andWhere(['id' => $modelKdmPayment->applicant_id])->one();
		if($rootModel->applicant_type == 1){
			$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $modelKdmPayment->applicant_id])->one();
		}else{
			$modelBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $modelKdmPayment->applicant_id])->one();
		}
		
		
		
		$modelKdmUser = User::find()->andWhere(['id' => $rootModel->user_id])->one();
		
		return $this->render('viewpayment', [
			'modelBio' => $modelBio,
			'modelKdmPayment' => $modelKdmPayment,
			'rootModel' => $rootModel,
			
                
            ]);
		
		
    }
	
	public function actionReceipt($id)
    {
		
		$this->layout = 'print';
		
		
		$modelKdmPayment = KdmPayment::find()->andWhere(['id' => $id])->one();
		$rootModel = KdmRootApplicant::find()->andWhere(['id' => $modelKdmPayment->applicant_id])->one();
		if($rootModel->applicant_type == 1){
			$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $modelKdmPayment->applicant_id])->one();
		}else{
			$modelBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $modelKdmPayment->applicant_id])->one();
		}
		
		
		
		$modelKdmUser = User::find()->andWhere(['id' => $rootModel->user_id])->one();
		
		return $this->render('receipt', [
			'modelBio' => $modelBio,
			'modelKdmPayment' => $modelKdmPayment,
			'rootModel' => $rootModel,
            ]);
		
		
    }
	
	
	public function actionApplicants()
    {
		
		$this->layout = 'preview';
		$model = KdmRootApplicant::find()->all();;
		$modelApproved = KdmRootApplicant::find()->andWhere(['status' => 3])->all();
		$modelPending = KdmRootApplicant::find()->andWhere(['status' => 2])->all();
		$modelDeclined = KdmRootApplicant::find()->andWhere(['status' => 4])->all();
		
		return $this->render('applicants', [
			'model' => $model,
			'modelApproved' => $modelApproved,
			'modelPending' => $modelPending,
			'modelDeclined' => $modelDeclined,
		]);
		
		
    }
	
	public function actionStage1($id=null)
    {
		$rootModel = new RootModel();
		
		return $this->renderAjax('stage1', [
			'rootModel' => $rootModel,
			
                
            ]);
    }
	
	public function actionOrganizationbio($id=null)
    {
		$model = new KdmApplicantOrganizationBio();
		
		return $this->renderAjax('organizationbio', [
			'model' => $model,
			'rootModel' => $id,
			
                
            ]);
    }
	
	public function actionOrganizationcontactdetailsdata($id=null)
    {
		$model = new KdmOrganizationContactDetails();
		$organizationBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		
		return $this->renderAjax('organizationcontactdetailsdata', [
			'model' => $model,
			'rootModel' => $id,
			'organizationBio' => $organizationBio,
                
            ]);
    }
	
	public function actionOrganizationcontactpersonbios($id=null)
    {
		$model = new KdmApplicantOrganizationContactPersonDetails();
		$organizationBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		
		return $this->renderAjax('organizationcontactpersonbios', [
			'model' => $model,
			'rootModel' => $id,
			'organizationBio' => $organizationBio,
                
            ]);
    }
	
	
	public function actionOrganizationuploaddocument($id=null)
    {
		
		$model =   new KdmDocumentUpload();
		$organizationBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('organizationuploaddocument', [
			'model' => $model,
			'rootModel' => $id,
			'organizationBio' => $organizationBio,
                
            ]);
		
    }
	
	public function actionOrganizationdocumentformcac($id=null)
    {
		
		$model =   new KdmDocumentUpload();
		$organizationBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('organizationdocumentformcac', [
			'model' => $model,
			'rootModel' => $id,
			'organizationBio' => $organizationBio,
                
            ]);
		
    }
	
	public function actionOrganizationdocumentformc02($id=null)
    {
		
		$model =   new KdmDocumentUpload();
		$organizationBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('organizationdocumentformc02', [
			'model' => $model,
			'rootModel' => $id,
			'organizationBio' => $organizationBio,
                
            ]);
		
    }
	
	public function actionOrganizationdocumentformc07($id=null)
    {
		
		$model =   new KdmDocumentUpload();
		$organizationBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('organizationdocumentformc07', [
			'model' => $model,
			'rootModel' => $id,
			'organizationBio' => $organizationBio,
                
            ]);
		
    }
	
	public function actionOrganizationdocumentformmemorandum($id=null)
    {
		
		$model =   new KdmDocumentUpload();
		$organizationBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		return $this->renderAjax('organizationdocumentformmemorandum', [
			'model' => $model,
			'rootModel' => $id,
			'organizationBio' => $organizationBio,
                
            ]);
		
    }
	
	public function actionBiodata($id=null)
    {
		$model = new KdmApplicantBioData();
		return $this->renderAjax('biodata', [
			'model' => $model,
			'rootModel' => $id,
                
            ]);
    }
	
	public function actionContactdata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		$model = new KdmContactDetails();
		return $this->renderAjax('contactdata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	
	public function actionNextofkindata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		$model = new KdmNextOfKin();
		return $this->renderAjax('nextofkindata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	

	public function actionUploaddocumentdata($id)
    {
		$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		$model = new KdmDocumentUpload();
		return $this->renderAjax('uploaddocumentdata', [
			'model' => $model,
			'bioData' => $bioData,
                
            ]);
    }
	
	public function actionPaymentdata($id)
    {
		$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
		if($rootModel->applicant_type == 1){
			$modelBio = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		}else{
			$modelBio = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		}
		
		$fileNumberModel = KdmApplicantFileNumber::find()->andWhere(['applicant_id' => $id])->all();
		$paymentCount = KdmPayment::find()->andWhere(['applicant_id' => $id])->count();
		$model = new KdmPayment();
		
		return $this->renderAjax('paymentdata', [
			'model' => $model,
			'rootModel' => $rootModel, 
			'paymentCount' => $paymentCount,
			'fileNumberModel' => $fileNumberModel,
			'modelBio' => $modelBio,
                
            ]);
    }
	
		public function actionFilepaymentdata($id,$invoice)
    {
		
		$fileNumberModel = KdmApplicantFileNumber::find()->andWhere(['id' => $id])->one();
		
		$model = new KdmPayment();
		
		return $this->renderAjax('filepaymentdata', [
			'model' => $model,
			'fileNumberModel' => $fileNumberModel,
			'invoice' => $invoice,
            ]);
    }
	
	public function actionAgentdata($id)
    {
		$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$id])->one();
		if($rootModel->applicant_type == 1){
			$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		}else{
			$bioData = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		}
		
		$model = new KdmApplicantAgent();
		return $this->renderAjax('agentdata', [
			'model' => $model,
			'rootModel' => $rootModel,
			'modelBio' => $bioData,
                
            ]);
    }
	
	public function actionDeclerationdata($id)
    {
		$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$id])->one();
		if($rootModel->applicant_type == 1){
			$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		}else{
			$bioData = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		}
		$model = new KdmDocumentUpload();
		$declarationModel = new KdmDeclaration();
		return $this->renderAjax('declerationdata', [
			'model' => $model,
			'rootModel' => $rootModel,
			'modelBio' => $bioData,
			'declarationModel' => $declarationModel,
                
            ]);
    }
	
	public function actionProcessbio()
    {
		$model = new KdmApplicantBioData();
		
		
	
			
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->stage_status = 1;
			$model->user_id = Yii::$app->user->identity->id;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 2;
				
				if($rootModel->save()){
				
				return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	public function actionProcesscontact()
    {
		$model = new KdmContactDetails();
		
		
        if ($model->load(Yii::$app->request->post()) ) {
			
			
			$model->status = 0;
			//$model->user_id = Yii::$app->user->identity->id;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 3;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
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
			
			
			$model->status = 0;
			//$model->user_id = Yii::$app->user->identity->id;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 4;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
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
			$model->status = 0;
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 5;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => 0 ,'data' => $model];
			}
            
        }
    }
	
	
	public function actionProcessorganizationdocumentformidentity()
    {
		$model = new KdmDocumentUpload();
        if ($model->load(Yii::$app->request->post()) ) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 0;
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 5;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model,'tyui'];
			}
            
        }
    }
	
	
	
	public function actionProcessorganizationdocumentformcac()
    {
		$model = new KdmDocumentUpload();
        if ($model->load(Yii::$app->request->post()) ) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 0;
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 6;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model,'tyui'];
			}
            
        }
    }
	
	
	public function actionProcessorganizationdocumentformc02()
    {
		$model = new KdmDocumentUpload();
        if ($model->load(Yii::$app->request->post()) ) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 0;
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 7;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model,'tyui'];
			}
            
        }
    }
	
	public function actionProcessorganizationdocumentformc07()
    {
		$model = new KdmDocumentUpload();
        if ($model->load(Yii::$app->request->post()) ) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 0;
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 8;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model,'tyui'];
			}
            
        }
    }
	
	
	public function actionProcessorganizationdocumentformmemorandum()
    {
		$model = new KdmDocumentUpload();
        if ($model->load(Yii::$app->request->post()) ) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 0;
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 9;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model,'tyui'];
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
			$model->status = 0;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$fileNumberModel = KdmApplicantFileNumber::find()->andWhere(['applicant_id' => $model->applicant_id])->count();
				$paymentCount = KdmPayment::find()->andWhere(['applicant_id' => $model->applicant_id])->count();
				$status = (int) $fileNumberModel - (int) $paymentCount;
				
				if($status  == 0){
					$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
					// determine type of applicant to set stage status
					if($rootModel->applicant_type == 1){
						$rootModel->stage_status = 6;
					}else{
						$rootModel->stage_status = 10;
					}
					
				
					if($rootModel->save()){
						return ['status' => 1,'data' => $model,'stage_status' => $status];
					}else{
						return ['status' => 0,'data' => 'status not updated'];
					}
					
				}else{
					return ['status' => 1,'data' => $model,'stage_status' => $status];
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
			
			$model->status = 0;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				if($rootModel->applicant_type == 1){
						$rootModel->stage_status = 7;
					}else{
						$rootModel->stage_status = 11;
					}
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
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
		$declarationModel = new KdmDeclaration();
			
        if ($model->load(Yii::$app->request->post()) && $declarationModel->load(Yii::$app->request->post()) ) {
			
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 0;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload() && $declarationModel->save()) {
				$bioData = KdmApplicantBioData::find()->andWhere(['applicant_id'=>$model->applicant_id])->one();
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				if($rootModel->applicant_type == 1){
						$rootModel->stage_status = 8;
					}else{
						$rootModel->stage_status = 12;
					}
				$rootModel->status = 1;
				
				if($rootModel->save()){
					return $this->redirect(['applicants/preview','id' => $rootModel->id]);
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	public function actionProcessorganizationbio()
    {
		
		$model = new KdmApplicantOrganizationBio();
			
        if ($model->load(Yii::$app->request->post()) ) {
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 0;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 2;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	public function actionProcessuservalidate($id)
    {
		
		$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$id])->one();
			
        if ($rootModel->load(Yii::$app->request->post()) ) {
				if($rootModel->applicant_type == 1){
						$rootModel->stage_status = 9;
					}else{
						$rootModel->stage_status = 13;
					}
				$rootModel->status = 2;
				
				if($rootModel->save()){
					return $this->redirect(['applicants/confirm']);
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
            
        }
    }
	
	public function actionProcessorganizationcontact()
    {
		
		$model = new KdmOrganizationContactDetails();
			
        if ($model->load(Yii::$app->request->post()) ) {
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 0;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 3;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	public function actionProcessorganizationcontactperson()
    {
		
		$model = new KdmApplicantOrganizationContactPersonDetails();
			
        if ($model->load(Yii::$app->request->post()) ) {
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 0;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id'=>$model->applicant_id])->one();
				$rootModel->stage_status = 4;
				
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => 'status not updated'];
				}
                
            }else{
				return ['status' => $model];
			}
            
        }
    }
	
	
	public function actionProcessstage1()
    {
		
		$model = new RootModel();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($model->load(Yii::$app->request->post()) ) {
			
			
			if ($model->proccessStage1()) {
				
				return ['status' => 1,'data' => $model];
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        }
    }
	
	public function actionProccessbioveri($id = null)
    {
		
		$model = KdmApplicantBioData::find()->andWhere(['applicant_id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 1;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
				$rootModel->verification_status = 1;
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccessorgbioveri($id = null)
    {
		
		$model = KdmApplicantOrganizationBio::find()->andWhere(['applicant_id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 1;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
				$rootModel->verification_status = 1;
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccessorgaddressveri($id = null)
    {
		
		$model = KdmOrganizationContactDetails::find()->andWhere(['applicant_id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 1;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
				$rootModel->verification_status = 2;
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccessorgcontactperson($id = null)
    {
		
		$model = KdmApplicantOrganizationContactPersonDetails::find()->andWhere(['applicant_id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 1;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
				$rootModel->verification_status = 3;
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccesscontactdetailsveri($id = null)
    {
		
		$model = KdmContactDetails::find()->andWhere(['applicant_id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 1;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
				$rootModel->verification_status = 2;
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccessnextofkindetailsveri($id = null)
    {
		
		$model = KdmNextOfKin::find()->andWhere(['applicant_id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 1;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
				$rootModel->verification_status = 3;
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	
	public function actionProccessdocumentsveri($id = null)
    {
		
		
		$model = KdmDocumentUpload::find()->andWhere(['applicant_id' => $id,'status'=>0])->all();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model[0]->status = 1;
			if ($model[0]->save(false)) {
				$model2 = KdmDocumentUpload::find()->andWhere(['applicant_id' => $id,'status'=>0])->count();
				if($model2 > 0 ){
					return ['status' => 1,'data' => $model,'counts' => $model2 ];
				}else{
					$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
					$rootModel->verification_status = 4;
					if($rootModel->save()){
						return ['status' => 1,'data' => $model,'counts' => $model2 ];
					}else{
						return ['status' => 0,'data' => $model,'counts' => $model2 ];
					}
				}
				
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccesspaymentveri($id = null)
    {
		
		
		$model = KdmPayment::find()->andWhere(['applicant_id' => $id,'status'=>0])->all();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model[0]->status = 1;
			if ($model[0]->save(false)) {
				$model2 = KdmPayment::find()->andWhere(['applicant_id' => $id,'status'=>0])->count();
				if($model2 > 0 ){
					return ['status' => 1,'data' => $model,'counts' => $model2 ];
				}else{
					$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
					$rootModel->verification_status = 5;
					if($rootModel->save()){
						return ['status' => 1,'data' => $model,'counts' => $model2 ];
					}else{
						return ['status' => 0,'data' => $model,'counts' => $model2 ];
					}
				}
				
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccessagentveri($id = null)
    {
		
		$model = KdmPayment::find()->andWhere(['applicant_id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 1;
			if ($model->save(false)) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
				$rootModel->verification_status = 6;
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccessdeclerationveri($id = null)
    {
		
		$model = KdmDeclaration::find()->andWhere(['applicant_id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 1;
			if ($model->save()) {
				$rootModel = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
	
				$rootModel->verification_status = 7;
				if($rootModel->save()){
					return ['status' => 1,'data' => $model];
				}else{
					return ['status' => 0,'data' => $model];
				}
				
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccessconfirmveri($id = null)
    {
		
		$model = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			$model->status = 3;
			$model->verification_status = 8;
			$model->user_validate = yii::$app->user->identity->id;
			if ($model->save()) {
				// redirect to success page
				// send sms to user
				if($model->applicant_type == 1){
					$bioModel = KdmContactDetails::find()->andWhere(['applicant_id' => $id])->one();
					$phone = $bioModel->mobile_number;
				}else{
					$bioModel = KdmApplicantOrganizationContactPersonDetails::find()->andWhere(['applicant_id' => $id])->one();
					$phone = $bioModel->phone_number;
				}
				$message = 'Congratulation your application for a space at The Kafe District Market has been processed and verified. kindly visit the office at No 1 Masarki close off Parakou Cresent Wuse2 Abuja for space allocation.';
				Config::sendSms($phone,$message);
				return $this->redirect(['applicants/confirmverificationsuccess']);
				return ['status' => 1,'data' => $model];
                
            }else{
				return ['status' => 0,'data' => $model];
			}
            
        
    }
	
	public function actionProccessdeclineveri($id = null)
    {
		
		$model = KdmRootApplicant::find()->andWhere(['id' => $id])->one();
		
			
			$model->status = 4;
			$model->verification_status = 7;
			$model->user_validate = yii::$app->user->identity->id;
			$model->save();
		
			return $this->render('declineverification',[]);
            
        
    }
	

    
    public function actionUpdate(){
         if (\Yii::$app->user->can('deletePost')) {
             return 12345;
         } else {
             return 'sorry you dont have the permission to update post';
         }
        
    }
	
	public function actionGettype() {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		//$out = [];

		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			if ($parents != null) {
				$shop_id = $parents[0];
				$getShops  = KdmShop::find()->select(['space_type_id'])->andWhere(['space_id' => $shop_id,'status'=>0,'reserved'=>0])->asArray()->all();

				$shopTypeIdValue = [];
				foreach($getShops as $key => $value){
					array_push($shopTypeIdValue,$value['space_type_id']);
				}

				$newShopTypeId = array_unique($shopTypeIdValue);
				$shopTypeId = array_values($newShopTypeId);
				$getAvailableTypes = KdmSpaceType::findAll($shopTypeId);
				$out = $getAvailableTypes;

				// the getSubCatList function will query the database based on the
				// cat_id and return an array like below:
				// [
				//    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
				//    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
				// ]
				return ['output'=>$out, 'selected'=>''];
			}
		}
		return ['output'=>'', 'selected'=>''];
	}
	
	public function actionGetquadrant() {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		//$out = [];

		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			if ($parents != null) {
				$shop_id = $parents[0];
				$shop_type_id = $parents[1];
				$getShops  = KdmShop::find()->select(['quadrant_id'])->andWhere(['space_id' => $shop_id,'space_type_id'=>$shop_type_id,'status'=>0,'reserved'=>0])->asArray()->all();

				$shopQuadrantIdValue = [];
				foreach($getShops as $key => $value){
					array_push($shopQuadrantIdValue,$value['quadrant_id']);
				}

				$newShopQuadrantId = array_unique($shopQuadrantIdValue);
				$shopQuadrantId = array_values($newShopQuadrantId);
				$getAvailableQuadrant = KdmQuadrant::findAll($shopQuadrantId);
				$out = $getAvailableQuadrant;

				// the getSubCatList function will query the database based on the
				// cat_id and return an array like below:
				// [
				//    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
				//    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
				// ]
				return ['output'=>$out, 'selected'=>''];
			}
		}
		return ['output'=>'', 'selected'=>''];
	}
	
	public function actionGetblock() {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		//$out = [];

		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			if ($parents != null) {
				$shop_id = $parents[0];
				$shop_type_id = $parents[1];
				$quadrant_id = $parents[2];
				$getShops  = KdmShop::find()->select(['block_id'])->andWhere(['space_id' => $shop_id,'space_type_id'=>$shop_type_id,'quadrant_id'=>$quadrant_id,'status'=>0,'reserved'=>0])->asArray()->all();

				$shopBlockIdValue = [];
				foreach($getShops as $key => $value){
					array_push($shopBlockIdValue,$value['block_id']);
				}

				$newShopBlockId = array_unique($shopBlockIdValue);
				$shopBlockId = array_values($newShopBlockId);
				$getAvailableBlock = KdmBlock::findAll($shopBlockId);
				$out = $getAvailableBlock;

				// the getSubCatList function will query the database based on the
				// cat_id and return an array like below:
				// [
				//    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
				//    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
				// ]
				return ['output'=>$out, 'selected'=>''];
			}
		}
		return ['output'=>'', 'selected'=>''];
	}
	
	public function actionGetfloor() {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		//$out = [];

		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			if ($parents != null) {
				$shop_id = $parents[0];
				$shop_type_id = $parents[1];
				$quadrant_id = $parents[2];
				$block_id = $parents[3];
				$getShops  = KdmShop::find()->select(['floor_id'])->andWhere(['space_id' => $shop_id,'space_type_id'=>$shop_type_id,'quadrant_id'=>$quadrant_id,'block_id'=>$block_id,'status'=>0,'reserved'=>0])->asArray()->all();

				$shopFloorIdValue = [];
				foreach($getShops as $key => $value){
					array_push($shopFloorIdValue,$value['floor_id']);
				}

				$newShopFloorId = array_unique($shopFloorIdValue);
				$shopFloorId = array_values($newShopFloorId);
				$getAvailableFloor = KdmFloor::findAll($shopFloorId);
				$out = $getAvailableFloor;

				// the getSubCatList function will query the database based on the
				// cat_id and return an array like below:
				// [
				//    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
				//    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
				// ]
				return ['output'=>$out, 'selected'=>''];
			}
		}
		return ['output'=>'', 'selected'=>''];
	}
	
	public function actionGetshop() {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		//$out = [];

		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];
			if ($parents != null) {
				$shop_id = $parents[0];
				$shop_type_id = $parents[1];
				$quadrant_id = $parents[2];
				$block_id = $parents[3];
				$floor_id = $parents[4];
				$getShops  = KdmShop::find()->andWhere(['space_id' => $shop_id,'space_type_id'=>$shop_type_id,'quadrant_id'=>$quadrant_id,'block_id'=>$block_id,'floor_id'=>$floor_id,'status'=>0,'reserved'=>0])->all();

				$out = $getShops;

				
				return ['output'=>$out, 'selected'=>''];
			}
		}
		return ['output'=>'', 'selected'=>''];
	}
	
	public function actionGetshopamount($id) {
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		
		$getShop  = KdmShop::findOne([$id]);	
		setlocale(LC_MONETARY, 'en_US');
		$money = money_format("%!n", $getShop->price);
		return ['output'=>$money];
	}
	
	public function actionInvoiceamount($id,$shop){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$getShop  = KdmShop::findOne([$shop]);
		$price = $getShop->price;
		// amount multiply by % divided by 100
		$invoiceAmount;
		if($price){
				if($id == 1){
					$invoiceAmount = $price;
				}
				
				if($id == 2){
					$invoiceAmount = $price * 40 / 100;
				}

				if($id == 3){
					$invoiceAmount = 0;
				}

				return ['status'=>1, 'price'=>$invoiceAmount, 'form' => $id];
			}
		
	}
	
	public function actionProccessbooking($id){
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$shopBookingModel = new KdmSpaceBooking();
		
		$shopBookingInvoiceModel = new KdmInvoice();
		$model = new BookingModel();
		if ($model->load(Yii::$app->request->post()) ) {
			$shopBookingModel->file_id = $id;
			$shopBookingModel->shop_id = $model->shop;
			$shopBookingModel->user_id = yii::$app->user->identity->id;
			$shopBookingModel->date_created =  date("Y-m-d");
			$shop = KdmShop::find()->andWhere(['id'=>$model->shop])->one();
			$shop->status = 1;
			$shopBookingInvoiceModel->invoice_number = 'KDM/'.rand(100,10000).Yii::$app->user->identity->id.$id;
			$shopBookingInvoiceModel->shop_id = $model->shop;
			$shopBookingInvoiceModel->payment_mode = 1;
			$shopBookingInvoiceModel->file_no = $id;
			$shopBookingInvoiceModel->amount = $shop->price;
			$shopBookingInvoiceModel->due_date = date("Y-m-d", strtotime("+1 week"));
			$shopBookingInvoiceModel->date_created = date("Y-m-d");
			
			if($shopBookingInvoiceModel->save(false) && $shopBookingModel->save(false) && $shop->save(false)){
				return ['status'=> 1];
			}else{
				return ['status'=> 0];
			}
		}
		
	}
	
	public function actionProcesspaymentallocation($id)
    {
		
		$model = new KdmPayment();
		$invoicePaymentLink = new KdmInvoiceLinkPayment();
		
		$model->bill_reff = '00000A2';
		$model->payment_id = '00000B2';
		$model->receipt_date = date('Y-m-d');
		$model->receit_id = '00A'.time();
		$model->payment_for = 'Space Allocation';
		
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$model->status = 0;
			
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			
			if ($model->upload()) {
				$getPaymentSum = KdmPayment::find()->andWhere(['file_number_id' =>$model->file_number_id,'payment_for' => $model->payment_for])->sum('amount');
				$getInvoiceAmount = KdmInvoice::find()->andwhere(['id' =>$id])->one()->amount;
				$checkBalance = $getInvoiceAmount - $getPaymentSum;
				$invoiceUpdater = KdmInvoice::find()->andwhere(['id' =>$id])->one();
				
				if($checkBalance > 0){
					// check if its the first payment update date to 3months from now 
					$countPayments = KdmPayment::find()->andWhere(['file_number_id' =>$model->file_number_id,'payment_for' => $model->payment_for])->count();
					if($countPayments = 1  ){
						// update 9months from now
						$invoiceUpdater->due_date = date("Y-m-d", strtotime("+27 week"));
						$invoiceUpdater->save(false);
					}
					
					
				}else{
					// clear invoice
					$invoiceUpdater->payment_status = 1;
					$invoiceUpdater->save(false);
				}
				
				$invoicePaymentLink->invoice_id = $id;
				$invoicePaymentLink->payment_id = $model->id;
				$invoicePaymentLink->amount = $model->amount;
				$invoicePaymentLink->date_paid = date("Y-m-d");
				$invoicePaymentLink->user_id = yii::$app->user->identity->id;
				$invoicePaymentLink->status = 1;
				
				// do linking
				if($invoicePaymentLink->save()){
					return ['status' => 1, 'data' => $model->id];
				}else{
					return ['status' => 0, 'data' => $model];	
				}
				
				
                
            }else{
				return ['status' =>0];
			}
            
        }
    }

   
}
