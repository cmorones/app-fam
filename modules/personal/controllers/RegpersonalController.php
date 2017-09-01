<?php

namespace app\modules\personal\controllers;

use Yii;
use app\modules\personal\models\Regpersonal;
use app\modules\personal\models\RegpersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegpersonalController implements the CRUD actions for Regpersonal model.
 */
class RegpersonalController extends Controller
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
                    //'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Regpersonal models.
     * @return mixed
     */
    public function actionIndex($id,$idp,$partida)
    {
        $searchModel = new RegpersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id,$idp,$partida);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>$id,
            'idp'=>$idp,
            'partida'=>$partida
        ]);
    }

    /**
     * Displays a single Regpersonal model.
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
     * Creates a new Regpersonal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$idp,$partida)
    {
        $model = new Regpersonal();

        if ($model->load(Yii::$app->request->post())) {

        $model->partida = $partida;
        $model->id_periodo = $id;
        $model->subprograma =$idp;
        $model->estado =1;
        $model->created_by = 1; //Yii::$app->user->identity->user_id;
        $model->created_at = new \yii\db\Expression('NOW()');
        $model->save();
            return $this->redirect(['index', 'id' => $id,'idp' => $idp,'partida' => $partida]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id'=>$id,
                'idp'=>$idp,
                'partida'=>$partida
            ]);
        }
    }

    /**
     * Updates an existing Regpersonal model.
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
     * Deletes an existing Regpersonal model.
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
     * Finds the Regpersonal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Regpersonal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Regpersonal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
