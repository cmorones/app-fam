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

    /**
     * Lists all AlSalidas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlSalidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
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
    public function actionCreate()
    {
        $model = new AlSalidas();

        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->estado=1;
            $model->folio = $this->ultimoFolio();
            $model->sfolio = "MBS-"."-".$this->ultimoFolio()."-2018";
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
            unset(Yii::$app->session['cart']);




            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AlSalidas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
            FROM al_salidas   WHERE estado=1")->queryOne();

            if ($folio['lastfolio'] !=0 ){
                return $folio['lastfolio']+1;
            }else{
                return 0+1;
            }
    }

    
  public function actionItems($id){
    
    return $this->render('_items', [
            'id' => $id,
          
            ]);
    }
}