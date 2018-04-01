<?php

namespace app\modules\almacen\controllers;

use Yii;
use app\modules\almacen\models\AlSalidaDetalle;
use app\modules\almacen\models\AlSalidaDetalleSearch;
use app\modules\almacen\models\AlArticulos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlSalidaDetalleController implements the CRUD actions for AlSalidaDetalle model.
 */
class AlSalidaDetalleController extends Controller
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
     * Lists all AlSalidaDetalle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlSalidaDetalleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlSalidaDetalle model.
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
     * Creates a new AlSalidaDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlSalidaDetalle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

     public function actionCreate2()
    {
        $model = new AlSalidaDetalle();

        if ($model->load(Yii::$app->request->post()) ) {


                $data = new AlArticulos();
                $dataProduct = $data->getInfoProductBy($model->id_producto);
                if (!isset(Yii::$app->session['al_cart'])) {
                        $cart[$model->id_producto] = [
                                'nombre'=> $dataProduct['descripcion'],
                              //  'precio'=> $dataProduct['precio'],
                                'cantidad'=> $model->cantidad,

                        ];
                }else{

                        $cart = Yii::$app->session['al_cart'];
                        if (array_key_exists($model->id_producto,$cart)) {
                                  $cart[$model->id_producto] = [
                                'nombre'=> $dataProduct['descripcion'],
                             //   'precio'=> $dataProduct['precio'],
                                'cantidad'=> (int)$cart[$model->id_producto]['cantidad']+$model->cantidad,

                        ];
                        }else{

                                 $cart[$model->id_producto] = [
                                'nombre'=> $dataProduct['descripcion'],
                             //   'precio'=> $dataProduct['precio'],
                                'cantidad'=> $model->cantidad,

                        ];

                        }
                }

             Yii::$app->session['al_cart'] = $cart;


            return $this->redirect(['shopping-cart/cart']);
        } else {
            return $this->renderAjax('create2', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AlSalidaDetalle model.
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
     * Deletes an existing AlSalidaDetalle model.
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
     * Finds the AlSalidaDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlSalidaDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlSalidaDetalle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
