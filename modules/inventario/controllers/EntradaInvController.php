<?php

namespace app\modules\inventario\controllers;

use Yii;
use app\modules\inventario\models\EntradaInv;
use app\modules\inventario\models\InventarioLab;
use app\modules\inventario\models\EntradaInvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EntradaInvController implements the CRUD actions for EntradaInv model.
 */
class EntradaInvController extends Controller
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
     * Lists all EntradaInv models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new EntradaInvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EntradaInv model.
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
     * Creates a new EntradaInv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate2()
    {
       // $this->layout = 'mainpop';
        $model = new EntradaInv();
        $model->id_plantel = Yii::$app->user->identity->id_plantel;
        $model->id_periodo = Yii::$app->user->identity->id_periodo;
        $model->user_reg = Yii::$app->user->identity->user_id;
        $model->fecha_reg = new \yii\db\Expression('NOW()');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate()
    {
        $model = new EntradaInv();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        $model->id_plantel = Yii::$app->user->identity->id_plantel;
        $model->id_periodo = Yii::$app->user->identity->id_periodo;
        $model->user_reg = Yii::$app->user->identity->user_id;
        $model->fecha_reg = new \yii\db\Expression('NOW()');

        if($model->save()) {

        $plantel = Yii::$app->user->identity->id_plantel;
        $id_cat = $model->id_catmat;
        $existencia = Yii::$app->db ->createCommand("SELECT sum(entrada) as existencias FROM inventario_lab WHERE id_catmat = $id_cat and id_plantel=$plantel")->queryOne();

        if($existencia['existencias']==0){
            $inventario = new InventarioLab();
            $inventario->id_catmat = $model->id_catmat;
            $inventario->id_plantel= Yii::$app->user->identity->id_plantel;
            $inventario->entrada = $model->cantidad;
            $inventario->user_reg = Yii::$app->user->identity->user_id;
            $inventario->fecha_reg = new \yii\db\Expression('NOW()');
            $inventario->save();
        }else {
            $total = $existencia['existencias'] + intval($model->cantidad);
            $fecha_mod = new \yii\db\Expression('NOW()');

            $command = Yii::$app->db ->createCommand("UPDATE inventario_lab SET entrada = :ent, fecha_mod = :fech WHERE id_catmat  = :id and id_plantel =:id_plantel")
                 ->bindValues([ ':ent' => $total, ':id' => $model->id_catmat, ':id_plantel'=>$plantel, ':fech'=>$fecha_mod ])->execute();

        }
            if(isset($_GET['return_dashboard']))
                    return $this->redirect(['/index']);
            else 
            return $this->redirect(['index']);
        }
        else {
                    return $this->renderAjax('create', ['model' => $model,]);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EntradaInv model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         $model->user_mod = Yii::$app->user->identity->user_id;
        $model->fecha_mod = new \yii\db\Expression('NOW()');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EntradaInv model.
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
     * Finds the EntradaInv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EntradaInv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EntradaInv::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
