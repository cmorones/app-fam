<?php

namespace app\modules\soporte\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\soporte\models\InvTelecom;
use app\modules\soporte\models\InvTelecomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * InvTelecomController implements the CRUD actions for InvTelecom model.
 */
class InvTelecomController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
               // 'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index','create','update', 'externos'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all InvTelecom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvTelecomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider2 = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider' => $dataProvider2,            
        ]);
    }

        public function actionExternos()
    {
        $searchModel = new InvTelecomSearch();
        $dataProvider = $searchModel->search3(Yii::$app->request->queryParams);


        return $this->render('externos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
          
        ]);
    }

    /**
     * Displays a single InvTelecom model.
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
     * Creates a new InvTelecom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new InvTelecom();

        if ($model->load(Yii::$app->request->post())) {

            $model->id_equipo=$id;
            $model->created_by= Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->updated_at = new Expression('NOW()');
            $model->updated_by= Yii::$app->user->identity->user_id;
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                # code...
            }

            return $this->redirect(['/soporte/inv-equipos/view', 'id' => $model->id_equipo]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    /**
     * Updates an existing InvTelecom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$ide)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
           // $model->id_equipo=$id;
            $model->updated_at = new Expression('NOW()');
            $model->updated_by= Yii::$app->user->identity->user_id;
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                # code...#telecom
            }
            return $this->redirect(['/soporte/inv-equipos/view', 'id' => $ide, '#' =>'telecom']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ide' => $ide,
            ]);
        }
         
    }

    /**
     * Deletes an existing InvTelecom model.
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
     * Finds the InvTelecom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvTelecom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvTelecom::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
