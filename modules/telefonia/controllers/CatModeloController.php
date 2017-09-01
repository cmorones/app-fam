<?php

namespace app\modules\telefonia\controllers;

use Yii;
use app\modules\telefonia\models\CatModelo;
use app\modules\telefonia\models\CatModeloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatModeloController implements the CRUD actions for CatModelo model.
 */
class CatModeloController extends Controller
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
     * Lists all CatModelo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatModeloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatModelo model.
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
     * Creates a new CatModelo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatModelo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CatModelo model.
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
     * Deletes an existing CatModelo model.
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
     * Finds the CatModelo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatModelo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
   public function actionLists($id)
   {

             $data=CatModelo::model()->findAll('id_marca=:id_marca',
             array(':id_marca'=>(int) $_POST['modelo']));

             $data=CHtml::listData($data,'id','nombre');
              foreach($data as $value=>$subcategory)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($subcategory),true);
                }

   /* $countCatModelos = CatModelo::find()
            ->where(['id_marca' => $id])
            ->count();

    $catmodelos = CatModelo::find()
            ->where(['id_marca' => $id])
            ->all();  
            if($countCatModelos>0)
            {
                foreach ($catmodelos as $catmodelo) {
                    echo "<option value='".$catmodelo->id."'>".$catmodelo->nombre."</option>";
                    # code...
                }
            }
            else{
                echo "<option>-</option>";
            }  
            */     
   }


    protected function findModel($id)
    {
        if (($model = CatModelo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
