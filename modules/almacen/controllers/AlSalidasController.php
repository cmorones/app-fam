<?php

namespace app\modules\almacen\controllers;

use Yii;
use app\modules\almacen\models\AlSalidas;
use app\modules\almacen\models\AlSalidasSearch;
use app\modules\almacen\models\AlEmpleados;
use app\modules\almacen\models\AlSalidaDetalle;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Json;
use  yii\web\Session;


/**
 * AlSalidasController implements the CRUD actions for AlSalidas model.
 */
class AlSalidasController extends Controller
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

     public function actionPeriodo()
    {
       // $searchModel = new AlEntradasSearch();
      //  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('_periodo', [
          //  'searchModel' => $searchModel,
         //   'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Lists all AlSalidas models.
     * @return mixed
     */
    public function actionIndex($idp)
    {
        $searchModel = new AlSalidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$idp);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
              'idp' => $idp,
        ]);
    }

     public function actionPendientes()
    {
        $searchModel = new AlSalidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('_pendientes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

      public function actionSolicitudes($idp,$tipo)
    {
        $searchModel = new AlSalidasSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams,$idp,$tipo);

        return $this->render('sol_pendientes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionTerminadas()
    {
        $searchModel = new AlSalidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('_terminadas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlSalidas model.
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
     * Creates a new AlSalidas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idp)
    {
        $model = new AlSalidas();

        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->estado=1;
            $model->id_periodo = 2;
            $model->folio = $this->ultimoFolio();
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
            $orden_id = $model->id;
            $cart = Yii::$app->session['al_cart'];
            foreach ($cart as $key => $value) {
                $ordenDetalle = new AlSalidaDetalle();
                $ordenDetalle->id_salida = $orden_id;
                $ordenDetalle->id_producto = $key;
                $ordenDetalle->cantidad = $value['cantidad'];
                $ordenDetalle->cantidad_sol = $value['cantidad'];
                $ordenDetalle->cantidad_aut = $value['cantidad'];
                $ordenDetalle->estado = 1;
                $ordenDetalle->created_by=Yii::$app->user->identity->user_id;
                $ordenDetalle->created_at = new Expression('NOW()');
                $ordenDetalle->save();
                $cantidad = intval($value['cantidad']);
            }

            // $this->calculaexistencia($key,$cantidad );



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


       //     }*/
            


           // Yii::$app->session['cart'];
        //    Yii::$app->session['cart'] = array();
            unset(Yii::$app->session['al_cart']);
          // unset($_SESSION['cart']);
        //   Yii::$app->session->remove('cart');
 
          //  $session->close();  // close a session

            //Yii::app()->session->destroy();




            return $this->redirect(['index', 'id' => $model->id, 'idp'=>$idp]);
        } else {
            return $this->render('create', [
                'model' => $model,
                 'idp'=>$idp
            ]);
        }
    }

    /**
     * Updates an existing AlSalidas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$idp)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'idp'=>$idp
            ]);
        }
    }

    /**
     * Deletes an existing AlSalidas model.
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
     * Finds the AlSalidas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlSalidas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlSalidas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

      public function actionEmpleados($id)
    {
        $cuentaModelos = AlEmpleados::find()->where(['id_depto'=>$id])->count();
        $modelos = AlEmpleados::find()->where(['id_depto'=>$id])->all();

        if ($cuentaModelos > 0) {
            foreach ($modelos as $key => $value) {
                echo "<option value=". $value->id . ">". $value->nombre. "</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }

      public function ultimoFolio(){

            $folio = \Yii::$app->db->createCommand("SELECT max(al_salidas.folio) as lastfolio
            FROM al_salidas   WHERE id_periodo=2")->queryOne();

            if ($folio['lastfolio'] !=0 ){
                return $folio['lastfolio']+1;
            }else{
                return 0+1;
            }
    }

    
  public function actionItems($id,$idp){
    
    return $this->render('_items', [
            'id' => $id,
            'idp'=>$idp
          
            ]);
    }

     public function actionItems2($id){
    
    return $this->render('_items2', [
            'id' => $id,
          
            ]);
    }


          public function actionAutorizar($idp)
    {
        //$actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->all();
  //var_dump($_POST['cant1']); 
       if(isset($_POST['update'])){

        $sol = $_POST['solicitud'];

           $sql="UPDATE al_salidas SET estado='2' WHERE id='$sol'"; 
            \Yii::$app->db ->createCommand($sql)->execute();

         //print_r($_POST['qty']);

        /* 
            pobacion_esperada
            pobacion_atendida
        */

       

         foreach ($_POST['qty'] as $idc){ 
           

            $cantidad = $_POST['cant1'][$idc];
            $cantidad2 = $_POST['cant2'][$idc];
            $cantidad3 = $_POST['cant3'][$idc];

          // $sql="UPDATE inv_bajas SET cantidad='".$_POST['cant1'][$idc]. "' WHERE id='".$idc."'"; 
            $sql="UPDATE al_salida_detalle SET cantidad='$cantidad', cantidad_sol='$cantidad2', cantidad_aut='$cantidad3' WHERE id='$idc'"; 
            \Yii::$app->db ->createCommand($sql)->execute();
            //var_dump($sql); 
          }  

       }


        $searchModel = new AlSalidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$idp);
         

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
             'idp'=>$idp
        ]);
    }

     public function actionModificar()
    {
        //$actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->all();
  //var_dump($_POST['cant1']); 

      $idp = 4;
      $tipo=1;
       if(isset($_POST['update'])){

        $sol = $_POST['solicitud'];

       /*    $sql="UPDATE al_salidas SET estado='2' WHERE id='$sol'"; 
            \Yii::$app->db ->createCommand($sql)->execute();*/

         //print_r($_POST['qty']);

        /* 
            pobacion_esperada
            pobacion_atendida
        */

       

         foreach ($_POST['qty'] as $idc){ 
           

            $cantidad = $_POST['cant1'][$idc];
          

          // $sql="UPDATE inv_bajas SET cantidad='".$_POST['cant1'][$idc]. "' WHERE id='".$idc."'"; 
            $sql="UPDATE al_salida_detalle SET cantidad='$cantidad' WHERE id='$idc'"; 
            \Yii::$app->db ->createCommand($sql)->execute();
            //var_dump($sql); 
          }  

       }


          $searchModel = new AlSalidasSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams,$idp,$tipo);
      //   $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$idp);


        return $this->render('sol_pendientes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idp'=>4,
            'tipo'=>1
        ]);
    }

          public function actionDocto($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'updoc';

       
       // $model2 = InvBajas::findOne($idb);

        if ($model->load(Yii::$app->request->post()) ) {
        
        $model->file = UploadedFile::getInstance($model,'file');
        $model->file->saveAs('alsalidas/'.$model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension);
       //  $model->file->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
        $model->docto = $model->file->baseName.'-'.date('Y-m-d h:m:s').'.'.$model->file->extension;
        $model->estado=3;
        $model->updated_by=@Yii::$app->user->identity->user_id;
        $model->updated_at = new Expression('NOW()');    
       if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }

             $resultado =  AlSalidaDetalle::find()
                                                        ->joinWith('datos')
                                                       // ->onCondition(['>', 'existencia', 0])
                                                        ->where(['=', 'id_salida', $id])
                                                        ->all();
         /*   foreach ($resultado as $value) {
            $this->calculaexistencia($value['id_producto'],$value['cantidad'] );
            } */

            return $this->redirect(['/almacen/al-salidas']);
         

        } else {
            return $this->render('docto', [
                'model' => $model,
                'id' => $id,
            

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


     public function actionPdf($id) {
    $model = $this->findModel($id);

    // This will need to be the path relative to the root of your app.
    $filePath = '/alsalidas';
    // Might need to change '@app' for another alias
    $completePath = Yii::getAlias('@webroot'.$filePath.'/'.$model->docto);

    return Yii::$app->response->sendFile($completePath, $model->docto);
}
}
