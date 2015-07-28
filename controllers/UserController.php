<?php

namespace app\controllers;

use Yii;
use app\models\Account;
use app\models\AccountSearch;
use app\models\Package;
use app\models\Category;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Template;
use yii\web\NotFoundHttpException;


class UserController extends Controller
{
    public $layout = 'main';
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                
                //'only' => ['index','contact','about','login','logout','create'],
                'rules' => [
                    ['actions' => ['index','login','create','about','contact'],
                     'allow' => true,
                     'roles' => ['?']  
                        ],
        
                    [
                        'actions' => ['index','contact','about','logout','access','kategorija','say'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }

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

    public function actionIndex($q = "")
    {

        if (Yii::$app->user->isGuest) {
                    return $this->render('index');
                } else {
                    $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
                    if ($isAdmin == '0') { //ako nijje admin, baca ga na stranicu za frontend korisnike
                        //return $this->redirect(['//user/index.php']);
                        return $this->render('index');
                    }
                    return $this->render('index');
                }
                return $this->render('index');
        
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
             
            
            $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
            
            if($isAdmin=='1'){ //ako je admin, baca ga na admin kontroler
                return $this->redirect('index.php?r=admin');
            }
            else {
                return $this->render('index');
            }
                       
            
            
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->render('index');
    }
    public function actionSay($message = 'Hello')
        
    {   $ime = $_GET['message'];
        $model=Template::getItemss($ime);
        return $this->render('say', ['model'=>$model ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionCreate() {
        $model = new account();

        

            return $this->render('create', [
                        'model' => $model,
            ]);
        
    }
    public function actionPackage() {
     

        return $this->redirect('index.php?r=purchase/create');

            
        
    }
    public function actionKategorija() {
        /*  
        if(isset($_GET['c'])){
            $var= $_GET['c'];
            $models = Category::find()->where(['parent_category' => $var])->all();
        }else{
           $models = Category::find()->where(['parent_category' => $var])->all(); 
        } */ 
        return $this->render('kategorije');
    }

     public function actionPozivanje() {
   
      return 'ok';
          
    }

    
   
}
