<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvEquiposEx;
use app\modules\soporte\models\InvEquiposExSearch;
use app\modules\soporte\models\CatAntiguedad;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\helpers\Html; 

/**
 * InvEquiposExController implements the CRUD actions for InvEquiposEx model.
 */
class InvEquiposExController extends Controller
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
                        'actions' => ['index','create','view','update','update2', 'delete','modelos','update2'],
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
     * Lists all InvEquiposEx models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvEquiposExSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
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
     * Displays a single InvEquiposEx model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        //$telecom = InvTelecom::findOne($model->stu_master_stu_info_id);
        $telecom =  0;//InvTelecom::find()->where(['id_equipo' => $model->id])->one();
        $count = 0;// Yii::$app->db->createCommand('SELECT COUNT(*) FROM inv_telecom where id_equipo='.$id.'')->queryScalar();
        $count2 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM inv_soex where id_equipo='.$id.'')->queryScalar();
        $count3 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM inv_swex where id_equipo='.$id.'')->queryScalar();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'info' => $telecom,
            'count' => $count,
            'count2' => $count2,
            'count3' => $count3,
        ]);
    }


    /**
     * Creates a new InvEquiposEx model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvEquiposEx();

       
        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = $fecha = date("Y-m-d");//new Expression('NOW()');
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
            $model->id_area=1;
            $model->id_piso=1;
           
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
     * Updates an existing InvEquiposEx model.
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
    /**
     * Deletes an existing InvEquiposEx model.
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
     * Finds the InvEquiposEx model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvEquiposEx the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvEquiposEx::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
