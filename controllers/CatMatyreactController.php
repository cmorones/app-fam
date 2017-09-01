<?php

namespace app\controllers;

use Yii;
use app\models\CatMatyreact;
use app\models\CatMatyreactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CatMatyreactController implements the CRUD actions for CatMatyreact model.
 */
class CatMatyreactController extends Controller
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
     * Lists all CatMatyreact models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatMatyreactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatMatyreact model.
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
     * Creates a new CatMatyreact model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatMatyreact();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CatMatyreact model.
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
     * Deletes an existing CatMatyreact model.
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
     * Finds the CatMatyreact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatMatyreact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatMatyreact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionMatPhoto($eid)
    {
    $model = $this->findModel($eid);
//$info = EmpInfo::findOne($model->emp_master_emp_info_id);
  //  $info->scenario = 'photo-upload';
  $old_photo = $model->imagen;

    if($model->load(Yii::$app->request->post()))
    {
        //$model->attributes = $_POST['EmpInfo'];
        $model->imagen = UploadedFile::getInstance($model,'imagen');
       // $model->updated_by = Yii::$app->getid->getId();
       // $model->updated_at= new \yii\db\Expression('NOW()');

        if($model->validate('emp_photo') && !empty($model->imagen))
        {
            $ext= substr(strrchr($model->imagen,'.'),1);
            $photo = $old_photo;
            $dir1 = Yii::getAlias('@webroot').'/data/mat_images/';

            if(file_exists($dir1.$photo) && $photo!='no-photo' && $photo!= NULL) {
                unlink($dir1.$photo);
            }
            if($ext!=null) {
                 $newfname = $model->imagen.'_'.$model->id.'.'.$ext;
                 $returnResults = $model->imagen->saveAs(Yii::getAlias('@webroot').'/data/mat_images/'.$model->imagen = $newfname);
                if($returnResults) {
                    $model->save(false);
                }
            }
        }
        return $this->redirect(['view', 'id' => $model->id]);
      }
      return $this->renderAjax('photo_form', ['model' => $model ]);
      }


}
