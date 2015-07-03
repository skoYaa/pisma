<?php

namespace app\controllers;

use Yii;
use app\models\Template;
use app\models\TemplateSearch;
use app\models\CategoryTemplate;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * TemplateController implements the CRUD actions for Template model.
 */
class TemplateController extends Controller
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
     * Lists all Template models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TemplateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
        if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php');
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Template model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
        if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php');
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Template model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Template();
        
        $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
        if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php');
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//        die(var_export(Yii::$app->request->post("Category")));
//        new \app\models\CategoryTemplate()
//        $cate 
//        //$model->id;
            
          foreach (Yii::$app->request->post("Category") as $category){
              $model1= new CategoryTemplate();
              $model1->category_id=$category['id'][0];
              $model1->template_id=$model->id;
              $model1->save();
          }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Template model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
        if($isAdmin=='0'){ //ako nijje admin, baca ga na stranicu za frontend korisnike
                return $this->redirect('index.php');
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
     * Deletes an existing Template model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Template model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Template the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Template::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
