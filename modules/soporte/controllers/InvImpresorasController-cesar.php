<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvImpresoras;
use app\modules\soporte\models\InvImpresorasSearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\CatMarca;
use app\modules\admin\models\CatModelo;

/**
 * InvImpresorasController implements the CRUD actions for InvImpresoras model.
 */
class InvImpresorasController extends Controller
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
                        'actions' => ['index','create','view','update', 'delete','modelos', 'impresoras'],
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
     * Lists all InvImpresoras models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvImpresorasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
        public function actionImpresoras()
    {
        $searchModel = new InvImpresorasSearch();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('impresoras', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionModelos($id)
    {
        $cuentaModelos = CatModelo::find()->where(['id_marca'=>$id])->count();
        $modelos = CatModelo::find()->where(['id_marca'=>$id])->all();

        if ($cuentaModelos > 0) {
            foreach ($modelos as $key => $value) {
                echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }

    /**
     * Displays a single InvImpresoras model.
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
     * Creates a new InvImpresoras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvImpresoras();

        if ($model->load(Yii::$app->request->post())) {

                $fecha2 = date('Y-m-d');

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = $fecha = date("Y-m-d");//new Expressi
            $fecha1 = $this->traerFechaInv($model->progresivo);
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
            $model->antiguedad = 1; //$this->antiguedad($fecha1,$fecha2);
            $model->id_tipo=2;

             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                //Yii::$app->session->setflash("error","Error: Progresivo No existe en el sistema inventarial y/o progresivo ya fue registrado ");
                 //return $this->redirect(['create']);
                //exit;
                # code...
            }
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InvImpresoras model.
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
     * Deletes an existing InvImpresoras model.
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
     * Finds the InvImpresoras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvImpresoras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvImpresoras::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function antiguedad($fechaInicio,$fechaFin)
{
    $fecha1 = new \DateTime($fechaInicio);
    $fecha2 = new \DateTime($fechaFin);
    $fecha = $fecha1->diff($fecha2);
    $tiempo = "";
         
    //años
    if($fecha->y > 0)
    {
        $tiempo .= $fecha->y;
             
        if($fecha->y == 1)
            $tiempo .= " año, ";
        else
            $tiempo .= " años, ";
    }
         
   if ($tiempo==1) {
       $rest=1;
   }
   if ($tiempo>1 && $tiempo < 4) {
       $rest=2;
   }

   if ($tiempo>3 && $tiempo < 7) {
       $rest=3;
   }

   if ($tiempo>6 && $tiempo < 11) {
       $rest=4;
   }

     if ($tiempo>10) {
       $rest=5;
   }
         
    return $rest;
}

 public function traerFechaInv($progresivo){

    $sql = "SELECT 
   bienes_muebles.fecha_alta 
FROM 
  public.bienes_muebles 
 WHERE
  bienes_muebles.clave_cabms = '5151000138' and 
  bienes_muebles.progresivo = '$progresivo'";
$inventario = \Yii::$app->db2->createCommand($sql)->queryOne();

 return $inventario['fecha_alta'];


 }
}
