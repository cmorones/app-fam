<?php

namespace app\modules\almacen\controllers;

use Yii;
use app\modules\almacen\models\AlSalidaDetalle;
use app\modules\almacen\models\AlSalidaDetalleSearch;
use app\modules\almacen\models\AlArticulos;
use app\modules\almacen\models\InvBitacora;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Json;

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
    

        public function actionCreate($id)
    {
        $model = new AlSalidaDetalle();

          if ($model->load(Yii::$app->request->post())) {
            $model->id_salida = $id;
            $model->estado = 1;
            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->save();

                $json = Json::encode($model);

              $bitacora1 = new InvBitacora();
                $bitacora1->id_accion =1;
                $bitacora1->id_tabla =2;
                $bitacora1->contenido =$json;
                $bitacora1->id_area =Yii::$app->user->identity->perfil;
                $bitacora1->created_by=Yii::$app->user->identity->user_id;
                $bitacora1->created_at = new Expression('NOW()');
                $bitacora1->save();

           
           //  $this->calculaexistencia($model->id_producto,$model->cantidad);

            return $this->redirect(['al-salidas/items', 'id' => $id]);
        } else {
            return $this->renderAjax('create', [
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

        public function actionBorrar($id,$id_salida,$cantidad)
    {
       // $eliminacion = $this->findModel($id);
        $model2 = $this->findModel($id);
        $this->findModel($id)->delete();

        $existencia = \Yii::$app->db ->createCommand("SELECT 
        existencia
        FROM 
          al_inv_productos 
        WHERE 
          id_producto=$model2->id_producto")->queryOne();

                $result = intval($existencia['existencia']);
      
    $total  = $result + $cantidad;
    $sql="Update al_inv_productos set existencia =". $total . " where id_producto =".$model2->id_producto. "";
    
    \Yii::$app->db->createCommand($sql)->execute();

    $data = [
       'existencia_anterior' => $result,
       'existencia_nueva' => $total,
    ];

    $json = Json::encode($data);

    $bitacora = new InvBitacora();
    $bitacora->id_accion =3;
    $bitacora->id_tabla =1;
    $bitacora->contenido =$json;
    $bitacora->id_area =Yii::$app->user->identity->perfil;
    $bitacora->created_by=Yii::$app->user->identity->user_id;
    $bitacora->created_at = new Expression('NOW()');
    $bitacora->save();

    $json2 = Json::encode($model2);

    $bitacora1 = new InvBitacora();
    $bitacora1->id_accion =2;
    $bitacora1->id_tabla =2;
    $bitacora1->contenido =$json2;
    $bitacora1->id_area =Yii::$app->user->identity->perfil;
    $bitacora1->created_by=Yii::$app->user->identity->user_id;
    $bitacora1->created_at = new Expression('NOW()');
    $bitacora1->save();


        return $this->redirect(['al-salidas/items', 'id'=>$id_salida]);
    }

}
