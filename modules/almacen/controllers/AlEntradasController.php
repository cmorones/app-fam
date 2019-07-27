<?php

namespace app\modules\almacen\controllers;

use Yii;
use app\modules\almacen\models\AlEntradas;
use app\modules\almacen\models\AlEntradasDetalle;
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
                        'actions' => ['index','create', 'update','periodo','items'],
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
     public function actionPeriodo()
    {
       // $searchModel = new AlEntradasSearch();
      //  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('periodo', [
          //  'searchModel' => $searchModel,
         //   'dataProvider' => $dataProvider,
        ]);
    }


    public function actionIndex($idp)
    {
        $searchModel = new AlEntradasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$idp);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idp' => $idp,
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

       public function actionCreateResp($idp)
    {
        $model = new AlEntradas();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->id_periodo =2;
            $model->estado=1;

         /*   if ($model->activa) {
                $model->precio=$model->precio * 1.16;
                $model->iva=1;

            }  */
            

             if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
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

            return $this->redirect(['index', 'id' => $model->id,'idp'=>$idp,]);
        } else {
            return $this->render('create', [
                'model' => $model,
                 'idp'=>$idp,
            ]);
        }
    
    }

     public function actionItems($id,$idp){
    
    return $this->render('_items', [
            'id' => $id,
            'idp'=>$idp
          
            ]);
    }


     public function actionCreate($idp)
    {
        $model = new AlEntradas();

        if ($model->load(Yii::$app->request->post())) {

            $model->created_by=Yii::$app->user->identity->user_id;
            $model->created_at = new Expression('NOW()');
            $model->estado=1;
            $model->id_periodo = 2;
           // $model->folio = $this->ultimoFolio();
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                exit;
            }
            $orden_id = $model->id;
            $cart = Yii::$app->session['al_ent'];
            foreach ($cart as $key => $value) {
                $ordenDetalle = new AlEntradasDetalle();
                $ordenDetalle->id_entrada = $orden_id;
                $ordenDetalle->id_articulo = $key;
                $ordenDetalle->cantidad = $value['cantidad'];
                $ordenDetalle->precio = $value['precio'];
                $ordenDetalle->activa = $value['activa'];
                $ordenDetalle->estado = 1;
                $model->fecha = new Expression('NOW()');
                $ordenDetalle->created_by=Yii::$app->user->identity->user_id;
                $ordenDetalle->created_at = new Expression('NOW()');
                $ordenDetalle->save();
                $cantidad = intval($value['cantidad']);
            }

            


           // Yii::$app->session['cart'];
        //    Yii::$app->session['cart'] = array();
            unset(Yii::$app->session['al_ent']);
          // unset($_SESSION['cart']);
        //   Yii::$app->session->remove('cart');
 
          //  $session->close();  // close a session

            //Yii::app()->session->destroy();




            return $this->redirect(['index', 'id' => $model->id, 'idp'=>$idp]);
        } else {
            return $this->render('create', [
                'model' => $model,
                 'idp'=>$idp
            ]);
        }
    }


    /**
     * Updates an existing AlEntradas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$idp)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id, 'idp' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'idp'=>$idp,
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
