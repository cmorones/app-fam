<?php

namespace app\modules\ventas\controllers;

use Yii;
use app\modules\ventas\models\InvEntradas;
use app\modules\ventas\models\InvProductos;
use app\modules\ventas\models\InvEntradasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * InvEntradasController implements the CRUD actions for InvEntradas model.
 */
class InvEntradasController extends Controller
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
     * Lists all InvEntradas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvEntradasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvEntradas model.
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
     * Creates a new InvEntradas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvEntradas();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');


             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }

             $idproducto = InvProductos::find()->where(['id_producto'=>$model->id_producto])->count(); 

            $intprod = intval($idproducto);

            if ($intprod == 0) {
                $entrada = new InvProductos();
                $entrada->id_producto = $model->id_producto;
                $entrada->id_ubicacion = 1;
                $entrada->existencia = $model->cantidad;
                $entrada->created_by=Yii::$app->user->identity->user_id;
                $entrada->created_at = new Expression('NOW()');
                $entrada->save();

            }elseif ($intprod > 0) {
                
                $existencia = \Yii::$app->db ->createCommand("SELECT 
          sum(inv_productos.existencia) as suma 
        FROM 
          inv_productos 
        WHERE 
          id_producto=$model->id_producto")->queryOne();


                
                 $table = InvProductos::findOne($model->id_producto);
                 $table->existencia = $existencia['suma'] + $model->cantidad;
                 $table->save();
                         
                
            }


           


            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InvEntradas model.
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
     * Deletes an existing InvEntradas model.
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
     * Finds the InvEntradas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvEntradas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvEntradas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
