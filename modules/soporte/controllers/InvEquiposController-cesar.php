<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvEquipos;
use app\modules\soporte\models\InvTelecom;
use app\modules\soporte\models\InvEquiposSearch;
use app\modules\soporte\models\CatModelo;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\helpers\Html; 

/**
 * InvEquiposController implements the CRUD actions for InvEquipos model.
 */
class InvEquiposController extends Controller
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
                        'actions' => ['index','create','view','update','update2', 'delete','modelos', 'equipos', 'dictaminar'],
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
     * Lists all InvEquipos models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('ListarEquipos')) { 
            echo "No tienes permiso para entrar aqui";
        }
        $searchModel = new InvEquiposSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

        public function actionEquipos()
    {
        if(!Yii::$app->user->can('ListarEquipos')) { 
            echo "No tienes permiso para entrar aqui";
        }
        $searchModel = new InvEquiposSearch();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('equipos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvEquipos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        //$telecom = InvTelecom::findOne($model->stu_master_stu_info_id);
        $telecom =  InvTelecom::find()->where(['id_equipo' => $model->id])->one();
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM inv_telecom where id_equipo='.$id.'')->queryScalar();
        $count2 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM inv_so where id_equipo='.$id.'')->queryScalar();
        $count3 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM inv_sw where id_equipo='.$id.'')->queryScalar();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'info' => $telecom,
            'count' => $count,
            'count2' => $count2,
            'count3' => $count3,
        ]);
    }

    /**
     * Creates a new InvEquipos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvEquipos();
        
        $fecha2 = date('Y-m-d');

        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = $fecha = date("Y-m-d");//new Expression('NOW()');
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
            $model->id_area=1;
            $model->id_piso=1;
            $fecha1 = $this->traerFechaInv($model->progresivo);
            $model->clasif = $this->antiguedad($fecha1,$fecha2);
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                Yii::$app->session->setflash("error","Error: Progresivo No existe en el sistema inventarial y/o progresivo ya fue registrado ");
                 return $this->redirect(['create']);
                //exit;
                # code...
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InvEquipos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            $model->updated_by=Yii::$app->user->identity->user_id;
            $model->updated_at = new Expression('NOW()');
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                # code...
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

     public function actionUpdate2($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'upuser';


        if ($model->load(Yii::$app->request->post())) {
            $model->updated_by=Yii::$app->user->identity->user_id;
            $model->updated_at = new Expression('NOW()');
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                # code...
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update2', [
                'model' => $model,
            ]);
        }
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
     * Deletes an existing InvEquipos model.
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
     * Finds the InvEquipos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvEquipos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvEquipos::findOne($id)) !== null) {
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
