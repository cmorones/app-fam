<?php

namespace app\modules\almacen\controllers;

use Yii;
use app\modules\almacen\models\AlEntradasDetalle;
use app\modules\almacen\models\AlEntradasDetalleSearch;
use app\modules\almacen\models\AlArticulos;
use app\modules\almacen\models\InvBitacora;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * AlEntradasDetalleController implements the CRUD actions for AlEntradasDetalle model.
 */
class AlEntradasDetalleController extends Controller
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
     * Lists all AlEntradasDetalle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlEntradasDetalleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlEntradasDetalle model.
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
     * Creates a new AlEntradasDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlEntradasDetalle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
  public function actionCreate2($idp)
    {
        $model = new AlEntradasDetalle();

        if ($model->load(Yii::$app->request->post()) ) {


                $data = new AlArticulos();
                $dataProduct = $data->getInfoProductBy($model->id_entrada);
                if (!isset(Yii::$app->session['al_ent'])) {

                        if ($model->activa) {
                           $iva = 1;
                        }else{
                            $iva = 0;
                        }

                        $cart[$model->id_entrada] = [
                                'nombre'=> $dataProduct['descripcion'],
                                'precio'=> $model->precio,
                                'activa'=> $iva,
                                'cantidad'=> $model->cantidad,

                        ];
                }else{

                        $cart = Yii::$app->session['al_ent'];
                        if (array_key_exists($model->id_entrada,$cart)) {

                             if ($model->activa) {
                           $iva = 1;
                        }else{
                            $iva = 0;
                        }

                                  $cart[$model->id_entrada] = [
                                'nombre'=> $dataProduct['descripcion'],
                             //   'precio'=> $dataProduct['precio'],
                                'precio'=> $model->precio,
                                'activa'=> $iva,
                                'cantidad'=> (int)$cart[$model->id_entrada]['cantidad']+$model->cantidad,

                        ];
                        }else{

                             if ($model->activa) {
                           $iva = 1;
                        }else{
                            $iva = 0;
                        }

                                 $cart[$model->id_entrada] = [
                                'nombre'=> $dataProduct['descripcion'],
                             //   'precio'=> $dataProduct['precio'],
                                'precio'=> $model->precio,
                                'activa'=> $iva,
                                'cantidad'=> $model->cantidad,

                        ];

                        }
                }

             Yii::$app->session['al_ent'] = $cart;


            return $this->redirect(['shopping-cart/entrada','idp'=>$idp]);
        } else {
            return $this->renderAjax('create2', [
                'model' => $model,
                'idp'=>$idp
            ]);
        }
    }

    /**
     * Updates an existing AlEntradasDetalle model.
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
     * Deletes an existing AlEntradasDetalle model.
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
     * Finds the AlEntradasDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlEntradasDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlEntradasDetalle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
