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
use frontend\models\KdmStaff;

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
        return $this->render('dashboard');
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
                'id' => 'author',
                'name' => 'Author',
            ],
            [
                'id' => 'admin',
                'name' => 'Admin',
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
}
