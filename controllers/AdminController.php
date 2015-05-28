<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\PaymentMethod;
use app\models\PaymentMethodSearch;
use yii\web\NotFoundHttpException;

class AdminController extends Controller {

    public $layout = 'main_';

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['actions' => ['index', 'login'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['index', 'logout'],
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

    public function actions() {
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

    public function actionIndex() {
       if (Yii::$app->user->isGuest){
        return $this->render('index');
       }
       else 
           return $this->render('welcome');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
            
            if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php');
            }
            else {
                return $this->render('index');
            }
            
            
            return $this->render('welcome');
            //return $this->redirect(['account/index']);
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->render('index');
    }

}
