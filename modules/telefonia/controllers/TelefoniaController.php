<?php

namespace app\modules\telefonia\controllers;

use Yii;
use app\modules\telefonia\models\InvTelefonia;
use app\modules\telefonia\models\TelefoniaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\telefonia\models\CatMarca;
use app\modules\telefonia\models\CatModelo;
use app\modules\telefonia\models\CatMarcatel;
use app\modules\telefonia\models\CatModelotel;
use yii\db\Expression;

/**
 * TelefoniaController implements the CRUD actions for InvTelefonia model.
 */
class TelefoniaController extends Controller
{
    /**
     * @inheritdoc
     */
/*

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
    */
public function actionModelos($id)
    {
        $cuentaModelos = CatModelotel::find()->where(['id_marca'=>$id])->count();
        $modelos = CatModelotel::find()->where(['id_marca'=>$id])->all();

        if ($cuentaModelos > 0) {
            foreach ($modelos as $key => $value) {
                echo "<option value=". $value->id . ">". $value->modelo. "</option>";
            }
        }else{
            echo "<option>-</option>";
        }
    }
    /**
     * Lists all InvTelefonia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TelefoniaSearch();
        $searchModel = new TelefoniaSearch();
        $dataProvider2 = $searchModel->search2(Yii::$app->request->queryParams); 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider2' => $dataProvider2,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvTelefonia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionTelefonos()
    {
        $searchModel = new TelefoniaSearch();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('telefonos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

        public function actionInternos()
    {
        $searchModel = new TelefoniaSearch();
        $dataProvider = $searchModel->search3(Yii::$app->request->queryParams);

        return $this->render('internos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new InvTelefonia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InvTelefonia();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_usuario=Yii::$app->user->identity->user_id;
            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                # code...
            }
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate2()
    {
        $model = new InvTelefonia();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_usuario=Yii::$app->user->identity->user_id;
            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->id_plantel=Yii::$app->user->identity->id_plantel;
             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                # code...
            }
            return $this->redirect(['internos', 'id' => $model->id]);
        } else {
            return $this->render('create2', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InvTelefonia model.
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

public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['internos', 'id' => $model->id]);
        } else {
            return $this->render('update2', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing InvTelefonia model.
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
     * Finds the InvTelefonia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvTelefonia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvTelefonia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
