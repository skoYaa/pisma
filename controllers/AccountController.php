<?php

namespace app\controllers;

use Yii;
use app\models\account;
use app\models\AccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * AccountController implements the CRUD actions for account model.
 */
class AccountController extends Controller {

    public $layout = 'main_';

    public function behaviors() {
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
             * Lists all account models.
             * @return mixed
             */
            public function actionIndex() {
                $searchModel = new AccountSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
                if ($isAdmin == '0') { //ako nijje admin, baca ga na stranicu za frontend korisnike
                    return $this->redirect('index.php');
                }

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
            }

            /**
             * Displays a single account model.
             * @param integer $id
             * @return mixed
             */
            public function actionView($id) {

                $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
                if ($isAdmin == '0') { //ako nijje admin, baca ga na stranicu za frontend korisnike
                    return $this->redirect('index.php');
                }

                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
            }

            /**
             * Creates a new account model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             * @return mixed
             */
            public function actionCreate() {
                $model = new account();

                $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
                if ($isAdmin == '0') { //ako nijje admin, baca ga na stranicu za frontend korisnike
                    return $this->redirect('index.php');
                }

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    //return $this->redirect(['view', 'id' => $model->id]);

                    return $this->redirect(['index']); //nakon unosa vraca na pocetak
                } else {
                    return $this->render('create', [
                                'model' => $model,
                    ]);
                }
            }

            /**
             * Updates an existing account model.
             * If update is successful, the browser will be redirected to the 'view' page.
             * @param integer $id
             * @return mixed
             */
            public function actionUpdate($id) {
                $model = $this->findModel($id);

                $isAdmin = Yii::$app->user->identity->administrator; //pokupi vrijednost administrator polja
                if ($isAdmin == '0') { //ako nijje admin, baca ga na stranicu za frontend korisnike
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
             * Deletes an existing account model.
             * If deletion is successful, the browser will be redirected to the 'index' page.
             * @param integer $id
             * @return mixed
             */
            public function actionDelete($id) {
                /* umjesto brisanja accounta, da uradi samo promjenu statusa da nije aktivan */
                $model = $this->findModel($id); //nadji model
                $model->status = 0; //postavi plje status u 0
                $model->update(); //izvrsi update
            
                return $this->redirect(['index']); 
            }

            /**
             * Finds the account model based on its primary key value.
             * If the model is not found, a 404 HTTP exception will be thrown.
             * @param integer $id
             * @return account the loaded model
             * @throws NotFoundHttpException if the model cannot be found
             */
            protected function findModel($id) {
                if (($model = account::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }

        }
        