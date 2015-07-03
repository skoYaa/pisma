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
use app\models\AccountSearch;
use app\models\Purchase;
use app\models\PurchaseSearch;
use yii\web\NotFoundHttpException;

//use yii\data\Sort;


class AdminController extends Controller {

    public $layout = 'main_';

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function() {
                    $this->redirect(['admin/login']);   //prebacuje na login od admin kontrolera
                },
                'rules' => [
                    ['actions' => ['login'], //da salje direktno na login izbrisati index akciju
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        
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
        /*         * *************************** */
        //$korisnik = Account::find()->orderBy('id')->all();
        $searchModel1= new AccountSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        $dataProvider1->sort = ['defaultOrder' => ['id' => 'DESC']];
        $dataProvider1->pagination = ['pageSize' => 5];
        
        $searchModel2 = new PurchaseSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $dataProvider2->sort = ['defaultOrder' => ['id' => 'DESC']];
        $dataProvider2->pagination = ['pageSize' => 5];
        /*         * ************************* */

        if (Yii::$app->user->isGuest) {
            return $this->render('index');
        } else {
            $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
            if ($isAdmin == '0') { //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php');
            }
           
            return $this->render('welcome', ['dataProvider1' => $dataProvider1, 'dataProvider2' => $dataProvider2,]);
        }
        //return $this->render('welcome');
        return $this->render('welcome', ['dataProvider1' => $dataProvider1, 'dataProvider2' => $dataProvider2,]);
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

            /* umjesto render welcome, radimo redirect na gornju akciju index,
             * jer u njoj pokupi sve korisnike iz baze, a u render('welcome') to ne radi,
             * i onda izbacje bug,jer viewu welcome ne prosljedimo korisnika */
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
