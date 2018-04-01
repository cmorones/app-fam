<?php

namespace app\modules\almacen\controllers;

use Yii;
use app\modules\almacen\models\AlEntradas;
use app\modules\almacen\models\AlEntradasSearch;
use app\modules\almacen\models\AlInvProductos;
use app\modules\almacen\models\InvBitacora;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Json;
/**
 * AlEntradasController implements the CRUD actions for AlEntradas model.
 */
class AlEntradasController extends Controller
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
                        'actions' => ['index','create', 'update'],
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
     * Lists all AlEntradas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlEntradasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlEntradas model.
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
     * Creates a new AlEntradas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateddd()
    {
        $model = new AlEntradas();

        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->estado=1;
             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
                
            }
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

       public function actionCreate()
    {
        $model = new AlEntradas();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->estado=1;
            

             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }

             $idproducto = AlInvProductos::find()->where(['id_producto'=>$model->id_articulo])->count(); 

            $intprod = intval($idproducto);

            if ($intprod == 0) {
                $entrada = new AlInvProductos();
                $entrada->id_producto = $model->id_articulo;
                $entrada->entradas = $model->cantidad;
                $entrada->salidas = 0;
                $entrada->existencia = $model->cantidad;
                $entrada->created_by=Yii::$app->user->identity->user_id;
                $entrada->created_at = new Expression('NOW()');
                $entrada->save();

                $json = Json::encode($entrada);

            $bitacora = new InvBitacora();
            $bitacora->id_accion =1;
            $bitacora->id_tabla =1;
            $bitacora->contenido =$json;
            $bitacora->id_area =Yii::$app->user->identity->perfil;
            $bitacora->created_by=Yii::$app->user->identity->user_id;
            $bitacora->created_at = new Expression('NOW()');
            $bitacora->save();

            }elseif ($intprod > 0) {
                
                $existencia = \Yii::$app->db ->createCommand("SELECT 
          sum(al_inv_productos.existencia) as suma 
        FROM 
          al_inv_productos 
        WHERE 
          id_producto=$model->id_articulo")->queryOne();

                $addsum = intval($existencia['suma']);
                
                $table = AlInvProductos::find()->where(['id_producto'=>$model->id_articulo])->one();
                $table->existencia = $addsum + $model->cantidad;
                $table->save();

        $total = $addsum + $model->cantidad;
              $data = [
                   'existencia_anterior' => $addsum,
                   'existencia_nueva' => $total,
                ];

             $json3 = Json::encode($data);

            $bitacora2 = new InvBitacora();
            $bitacora2->id_accion =3;
            $bitacora2->id_tabla =1;
            $bitacora2->contenido =$json3;
            $bitacora2->id_area =Yii::$app->user->identity->perfil;
            $bitacora2->created_by=Yii::$app->user->identity->user_id;
            $bitacora2->created_at = new Expression('NOW()');
            $bitacora2->save();
                         
                
            }


            $json2 = Json::encode($model);

            $bitacora1 = new InvBitacora();
            $bitacora1->id_accion =1;
            $bitacora1->id_tabla =3;
            $bitacora1->contenido =$json2;
            $bitacora1->id_area =Yii::$app->user->identity->perfil;
            $bitacora1->created_by=Yii::$app->user->identity->user_id;
            $bitacora1->created_at = new Expression('NOW()');
            $bitacora1->save();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing AlEntradas model.
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
     * Deletes an existing AlEntradas model.
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
     * Finds the AlEntradas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlEntradas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlEntradas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
