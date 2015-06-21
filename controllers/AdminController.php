<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\PaymentMethod;
use app\models\PaymentMethodSearch;
use app\models\Account;
use yii\web\NotFoundHttpException;
use yii\data\Sort;

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
       /******************************/
        $korisnik = Account::find()->orderBy('id')->all();

       // return $this->render('welcome', ['model' => $korisnik]);
        /****************************/

        if (Yii::$app->user->isGuest) {
            return $this->render('index');
        } else {
            $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
            if ($isAdmin == '0') { //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php');
            }
            //return $this->render('welcome');
            return $this->render('welcome', ['model' => $korisnik]);
        }
        //return $this->render('welcome');
        return $this->render('welcome', ['model' => $korisnik]);
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja

            if ($isAdmin == '0') { //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php');
            }
            
            /*umjesto render welcome, radimo redirect na gornju akciju index,
             * jer u njoj pokupi sve korisnike iz baze, a u render('welcome') to ne radi,
             * i onda izbacje bug,jer viewu welcome ne prosljedimo korisnika*/
            //return $this->render('welcome'); 
            return $this->redirect('index.php?r=admin/index');
            
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
