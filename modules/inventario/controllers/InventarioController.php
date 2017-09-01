<?php

namespace app\modules\inventario\controllers;

use Yii;
use app\modules\inventario\models\InventarioLab;
use app\modules\inventario\models\InventarioLabSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * InventarioLabController implements the CRUD actions for InventarioLab model.
 */
class InventarioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all InventarioLab models.
     * @return mixed
     */
        public function actionIndex()
    {
       /* $searchModel = new InventarioLabSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/


              $data = new \yii\db\Query();
            $data ->select('*')
                ->from('inventario_lab')
                ->join('join','cat_matyreact', 'cat_matyreact.id = inventario_lab.id_catmat')
                ->where(['inventario_lab.id_plantel' => Yii::$app->user->identity->id_plantel]);
                //->andFilterWhere(['inventario_lab.id_periodo' => Yii::$app->user->identity->id_periodo]);

                // ->join('join','cat_matyreact', 'cat_matyreact.id = inventario_lab.id_catmat')
                
            $command = $data->createCommand();
            $listado = $command->queryAll();

           // print_r($listado);

        return $this->render('index', [
           // 'searchModel' => $searchModel,
            'listado' => $listado,
        ]);
    }

    /**
     * Displays a single InventarioLab model.
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
     * Creates a new InventarioLab model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InventarioLab();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InventarioLab model.
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
     * Deletes an existing InventarioLab model.
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
     * Finds the InventarioLab model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InventarioLab the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InventarioLab::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
