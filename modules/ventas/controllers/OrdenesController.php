<?php

namespace app\modules\ventas\controllers;

use Yii;
use app\modules\ventas\models\Ordenes;
use app\modules\ventas\models\OrdenesDetalle;
use app\modules\ventas\models\OrdenesSearch;
use app\modules\ventas\models\InvProductos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;


/**
 * OrdenesController implements the CRUD actions for Ordenes model.
 */
class OrdenesController extends Controller
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
     * Lists all Ordenes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdenesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


      public function actionDocto($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'updoc';

       
       // $model2 = InvBajas::findOne($idb);

        if ($model->load(Yii::$app->request->post()) ) {
        
        $model->file = UploadedFile::getInstance($model,'file');
        $model->file->saveAs('recibos/'.$model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension);
       //  $model->file->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
        $model->docto = $model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension;
        $model->status=2;
        $model->updated_by=@Yii::$app->user->identity->user_id;
        $model->updated_at = new Expression('NOW()');    
       if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }

             $resultado =  OrdenesDetalle::find()
                                                        ->joinWith('datos')
                                                       // ->onCondition(['>', 'existencia', 0])
                                                        ->where(['=', 'id_orden', $id])
                                                        ->all();
            foreach ($resultado as $value) {
            $this->calculaexistencia($value['id_producto'],$value['cantidad'] );
            }

            return $this->redirect(['/ventas/ordenes']);
         

        } else {
            return $this->render('docto', [
                'model' => $model,
                'id' => $id,
            

            ]);
        }
    }

     public function actionPdf($id) {
    $model = $this->findModel($id);

    // This will need to be the path relative to the root of your app.
    $filePath = '/recibos';
    // Might need to change '@app' for another alias
    $completePath = Yii::getAlias('@webroot'.$filePath.'/'.$model->docto);

    return Yii::$app->response->sendFile($completePath, $model->docto);
}

    /**
     * Displays a single Ordenes model.
     * @param integer $id
     * @return mixed
     */

     public function actionPago($id)
    {
        return $this->render('orden_pago', [
            'id' => $id,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }




    /**
     * Creates a new Ordenes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($subtotal,$descuento,$total,$tipo)
    {
        $model = new Ordenes();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
             $model->fecha_reg = new Expression('NOW()');
            $model->status=1;
             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
            $orden_id = $model->id;
            $cart = Yii::$app->session['cart'];
            foreach ($cart as $key => $value) {
                $ordenDetalle = new OrdenesDetalle();
                $ordenDetalle->id_orden = $orden_id;
                $ordenDetalle->id_producto = $key;
                $ordenDetalle->precio = $value['precio'];
                $ordenDetalle->cantidad = $value['cantidad'];
                $ordenDetalle->status = 1;
                $ordenDetalle->created_by=Yii::$app->user->identity->user_id;
                $ordenDetalle->created_at = new Expression('NOW()');
                $ordenDetalle->save();
                $cantidad = intval($value['cantidad']);

         //       $this->calculaexistencia($key,$cantidad );



              /*  $idproducto = InvProductos::find()->where(['id_producto'=>$key])->count(); 

                 $intprod = intval($idproducto);

            if ($intprod > 0) {
                
                $existencia = \Yii::$app->db ->createCommand("SELECT 
        existencia
        FROM 
          inv_productos 
        WHERE 
          id_producto=1")->queryOne();

                $result = intval($existencia['existencia']);
                
                 $table = InvProductos::findOne(1);
                 $table->existencia = $result - $value['cantidad'];
                 $table->save();
                         
                
            }+*/


            }
            


           // Yii::$app->session['cart'];
            unset(Yii::$app->session['cart']);
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'subtotal'=>$subtotal,
                'descuento'=>$descuento,
                'total'=>$total,
                'tipo'=>$tipo,
            ]);
        }
    }

function calculaexistencia($id_producto, $cantidad){

  
                
                $existencia = \Yii::$app->db ->createCommand("SELECT 
        existencia
        FROM 
          inv_productos 
        WHERE 
          id_producto=$id_producto")->queryOne();

                $result = intval($existencia['existencia']);
      
    $total  = $result - $cantidad;
    $sql="Update inv_productos set existencia =". $total . " where id_producto =".$id_producto. "";
    
    \Yii::$app->db->createCommand($sql)->execute();

}

    /**
     * Updates an existing Ordenes model.
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
     * Deletes an existing Ordenes model.
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
     * Finds the Ordenes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ordenes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ordenes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
