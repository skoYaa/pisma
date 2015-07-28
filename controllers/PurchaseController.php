<?php

namespace app\controllers;

use Yii;
use app\models\Purchase;
use app\models\PurchaseSearch;
use app\models\CategoryPurchase;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PurchaseController implements the CRUD actions for Purchase model.
 */
class PurchaseController extends Controller
{
    
    /*$isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
            if($isAdmin=='1'){ //ako je admin, baca ga na admin kontroler
                public $layout = 'main_';
            ;
            }
            else {
                        public $layout = 'main';
                    
                }  */
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Purchase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Purchase model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Purchase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Purchase();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

             foreach (Yii::$app->request->post("Category") as $category){
              $model1= new CategoryPurchase();
              $model1->category_id=$category['id'][0];
              $model1->purchase_id=$model->id;
              $model1->save();
          }
            return $this->redirect(['//user/index.php']);
        } else { 
            $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
            if($isAdmin=='1'){ //ako je admin, baca ga na admin kontroler
                return $this->render('create', [
                        'model' => $model,
            ]);
            }
            else {
                        return $this->render('create(user)', [
                                'model' => $model,
                    ]);
                    
                }   
                   return $this->render('create(user)', [
                        'model' => $model,
            ]);     
    }}

    /**
     * Updates an existing Purchase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Purchase model.
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
     * Finds the Purchase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Purchase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Purchase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
