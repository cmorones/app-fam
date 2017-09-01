<?php

namespace app\modules\soporte\controllers;

use Yii;
use app\modules\soporte\models\InvImpresorasEx;
use app\modules\soporte\models\InvImpresorasExSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\admin\models\CatMarca;
use app\modules\admin\models\CatModelo;

/**
 * InvImpresorasExController implements the CRUD actions for InvImpresorasEx model.
 */
class InvImpresorasExController extends Controller
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
                        'actions' => ['index','create','view','update', 'delete','modelos'],
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
     * Lists all InvImpresorasEx models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvImpresorasExSearch();
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
     * Displays a single InvImpresorasEx model.
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
     * Creates a new InvImpresorasEx model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvImpresorasEx();

        if ($model->load(Yii::$app->request->post())) {

                $fecha2 = date('Y-m-d');

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = $fecha = date("Y-m-d");//new Expressi
         //   $fecha1 = $this->traerFechaInv($model->progresivo);
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
       //     $model->antiguedad = 1; //$this->antiguedad($fecha1,$fecha2);
         //   $model->id_tipo=2;

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
     * Updates an existing InvImpresorasEx model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

        $model->updated_by=Yii::$app->user->identity->user_id;
        $model->updated_at = $fecha = date("Y-m-d");//new Expressi
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
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InvImpresorasEx model.
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
     * Finds the InvImpresorasEx model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvImpresorasEx the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvImpresorasEx::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
