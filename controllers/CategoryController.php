<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Tag;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    public $layout='main_';
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function() {
                    $this->redirect(['admin/login']);
                },
                'rules' => [
                    [
                    
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ]
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
        if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php?r=user');
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
        if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php?r=user');
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        
        $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
        if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php?r=user');
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
        if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php?r=user');
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
      public function actionTest()
    {
        $id = $_GET['name'];

        $models=Category::getItemsKategorija($id);
        return json_encode(\yii\helpers\ArrayHelper::getColumn($models, 'id'));
       //  $str= "";
       //  foreach ($models as $key) {
       //      $str=$str . $key->id;
       //      $str=$str . ":" ;
       //  }
       // return $str; 

    }
        public function actionTest2()
    {
        $id = $_GET['name'];

        $models=Tag::getItemsTag($id);
        return json_encode(\yii\helpers\ArrayHelper::getColumn($models, 'id'));
        //$ids = ArrayHelper::getColumn($models, 'id');
       //  $str= "";
       //  foreach ($models as $key) {
       //      $str=$str . $key->id;
       //      $str=$str . ":" ;
       //  }
       // return $str; 

    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
