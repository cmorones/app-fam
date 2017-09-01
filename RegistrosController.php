<?php

namespace app\controllers;

use Yii;
use app\models\Registros;
use app\models\RegistrosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;




/**
 * RegistrosController implements the CRUD actions for Registros model.
 */
class RegistrosController extends Controller
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

     public function ultimoFolio5km($carrera){

        //$carrera = $_GET['car'];



        $folio = \Yii::$app->db ->createCommand("SELECT 
          max(registros.dorsal) as dorsal 
        FROM 
          registros 
        WHERE 
          carrera=$carrera and status=1 and distancia<>3")->queryOne();

        
                
                                        
                if( $folio['dorsal'] !=0 ){
                        return $folio['dorsal']+1; 
                }else{
                        return 0+221; 
                }

        }

             public function ultimoFolio10km($carrera){

        //$carrera = $_GET['car'];



        $folio = \Yii::$app->db ->createCommand("SELECT 
          max(registros.dorsal) as dorsal 
        FROM 
          registros 
        WHERE 
          carrera=$carrera and status=1 and distancia=2 and tipo_usuario IN(1,2)")->queryOne();

        
                
                                        
                if( $folio['dorsal'] !=0 ){
                        return $folio['dorsal']+1; 
                }else{
                        return 0+1; 
                }

        }

         public function ultimoFolio1km($carrera){

        //$carrera = $_GET['car'];



        $folio = \Yii::$app->db ->createCommand("SELECT 
          max(registros.dorsal) as dorsal 
        FROM 
          registros 
        WHERE 
          carrera=$carrera and status=1 and distancia=3 and tipo_usuario IN(1,2)")->queryOne();

        
                
                                        
                if( $folio['dorsal'] !=0 ){
                        return $folio['dorsal']+1; 
                }else{
                        return 0+121; 
                }

        }


         public function ultimoFolioInfante($carrera){

        //$carrera = $_GET['car'];



        $folio = \Yii::$app->db ->createCommand("SELECT 
      max(registros.dorsal) as dorsal 
    FROM 
      registros 
    WHERE 
      carrera=$carrera and distancia<> 3 and status=1")->queryOne();

        
                
                                        
                if( $folio['dorsal'] !=0 ){
                        return $folio['dorsal']+1; 
                }else{
                        return 0+221; 
                }

        }





    /**
     * Lists all Registros models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'principal2';
        $searchModel = new RegistrosSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Registros model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($emp,$car,$id,$dorsal,$tipo)
    {
         $this->layout = 'principal2';
        return $this->render('view', [
            'model' => $this->findModel($id),
            'emp'=>$emp,
            'car'=>$car,
            'id'=>$id,
            'dorsal'=>$dorsal,
            'tipo'=>$tipo,
        ]);
    }

    /**
     * Creates a new Registros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'principal2';
        $model = new Registros();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

        public function actionCar1k($car,$emp)
     {
        $this->layout = 'principal2';
        $model = new Registros(['scenario'=>'upuser']);

    
        if ($model->load(Yii::$app->request->post())) {
            $model->tipo_usuario =1;
            $model->id_empleado =$emp;
            $model->id_invitado = '0'; 
            $model->distancia =3;
            $model->status =1;
            $model->paypal = '0';
            $model->carrera =$car;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio1km($car);   
            $model->edad = $this->edad($model->fecha);
            $model->edad1k = $this->edad($model->fecha1k);
            $model->parent = '0';
            if ($model->sindicalizado==1 and ($model->edad1k > 7 and $model->edad1k < 11)) {
                 $model->categoria = 1;
            }elseif ($model->sindicalizado==1 and ($model->edad1k > 10 and $model->edad1k < 15)) {
                 $model->categoria = 2;
            }elseif ($model->sindicalizado==2 and ($model->edad1k > 7 and $model->edad1k < 11)) {
                 $model->categoria = 3;
            }elseif ($model->sindicalizado==2 and ($model->edad1k > 10 and $model->edad1k < 15)) {
                 $model->categoria = 4;
            }else{
                $model->categoria = 0;
            }




              if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
             /**
     * @inheritdoc
     public $nompre1k;
    public $apellido_pk; 
    public $apellido_mk;
    public $fecha1k;
    public $edad1k;
    public $sexo1k;
    public $talla1k;
    public $parentesco1k; 
     */
            }else{
                $model2 = new Registros();
                $model2->tipo_usuario =3;
                $model2->id_empleado =$emp;
                $model2->id_invitado = '0'; 
                $model2->nombre =$model->nompre1k;
                $model2->apellido_paterno =$model->apellido_pk;
                $model2->apellido_materno =$model->apellido_mk;;
                $model2->fecha =$model->fecha1k;
                $model2->status =1;
                $model2->paypal = '0';
                $model2->carrera =$car;
                $model2->fecha_reg = $model->fecha_reg;
                $model2->dorsal = $model->dorsal;
                $model2->talla = $model->talla1k; 
                $model2->sexo = $model->sexo1k;
                $model2->parent = $model->parentesco1k;    
                $model2->edad = $model->edad1k;
                $model2->distancia =3;
                $model2->email =$model->email;
                $model2->ciudad =$model->ciudad;
                $model2->telefono =$model->telefono;
                $model2->sindicalizado =$model->sindicalizado;


                $model2->categoria =$model->categoria;



                 if (!$model2->save()) {
                echo "<pre>";
                print_r($model2->getErrors());
                echo "</pre>";
                exit;
            }

            }

            $mensaje = $this->mensaje1k($car,$model->dorsal);

             Yii::$app->mailer->compose()
            ->setFrom('correyjuega@mail.telcel.com')
            ->setTo(array($model->email,'vazzacsd@gmail.com'))
            ->setSubject('Inscripción Carrera Sindicato Telcel')
            ->setHtmlBody($mensaje)
            ->send();
            return $this->redirect(['view', 'emp'=>$emp,'car'=>$car,'id' => $model->id, 'dorsal'=>$model->dorsal, 'tipo'=>3]);
        } else {
            return $this->render('create1km', [
                'model' => $model,
                'emp' =>$emp,
                'car'=>$car
            ]);
        }
    }



     public function actionInvitado1k($car,$emp)
     {
        $this->layout = 'principal2';
        $model = new Registros(['scenario'=>'upuser']);

    
        if ($model->load(Yii::$app->request->post())) {
            $model->tipo_usuario =2;
            $model->id_empleado =$emp;
            $model->id_invitado = $emp; 
            $model->distancia =3;
            $model->status =1;
            $model->paypal = '0';
            $model->carrera =$car;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio1km($car);   
            $model->edad = $this->edad($model->fecha);
            $model->edad1k = $this->edad($model->fecha1k);
            $model->parent = '0';
            if ($model->sindicalizado==1 and ($model->edad1k >= 7 and $model->edad1k < 11)) {
                 $model->categoria = 1;
            }elseif ($model->sindicalizado==1 and ($model->edad1k > 10 and $model->edad1k < 15)) {
                 $model->categoria = 2;
            }elseif ($model->sindicalizado==2 and ($model->edad1k > 7 and $model->edad1k < 11)) {
                 $model->categoria = 3;
            }elseif ($model->sindicalizado==2 and ($model->edad1k > 10 and $model->edad1k <= 15)) {
                 $model->categoria = 4;
            }else{
                $model->categoria = 0;
            }
            
              if (!$model->save()) {
                echo "<pre>";
                echo $model->edad1k;
                print_r($model->getErrors());
                echo "</pre>";
                exit;
             /**
     * @inheritdoc
     public $nompre1k;
    public $apellido_pk; 
    public $apellido_mk;
    public $fecha1k;
    public $edad1k;
    public $sexo1k;
    public $talla1k;
    public $parentesco1k; 
     */
            }else{
                $model2 = new Registros();
                $model2->tipo_usuario =3;
                $model2->id_empleado =$emp;
                $model2->id_invitado = $emp; 
                $model2->nombre =$model->nompre1k;
                $model2->apellido_paterno =$model->apellido_pk;
                $model2->apellido_materno =$model->apellido_mk;;
                $model2->fecha =$model->fecha1k;
                $model2->status =1;
                $model2->paypal = '0';
                $model2->carrera =$car;
                $model2->fecha_reg = $model->fecha_reg;
                $model2->dorsal = $model->dorsal;
                $model2->talla = $model->talla1k; 
                $model2->sexo = $model->sexo1k;
                $model2->parent = $model->parentesco1k;    
                $model2->edad = $model->edad1k;
                $model2->distancia =3;
                $model2->email =$model->email;
                $model2->ciudad =$model->ciudad;
                $model2->telefono =$model->telefono;
                $model2->sindicalizado =$model->sindicalizado;
                $model2->categoria =$model->categoria;



                 if (!$model2->save()) {
                echo "<pre>";
                print_r($model2->getErrors());
                echo "</pre>";
                exit;
            }

            }

            $mensaje = $this->mensaje1k($car,$model->dorsal);

             Yii::$app->mailer->compose()
            ->setFrom('correyjuega@mail.telcel.com')
            ->setTo(array($model->email,'vazzacsd@gmail.com'))
            ->setSubject('Inscripción Carrera 1K FAMILIAR Sindicato Telcel')
            ->setHtmlBody($mensaje)
            ->send();
            return $this->redirect(['view', 'emp'=>$emp,'car'=>$car,'id' => $model->id, 'dorsal'=>$model->dorsal, 'tipo'=>3]);
        } else {
            return $this->render('invitado1k', [
                'model' => $model,
                'emp' =>$emp,
                'car'=>$car
            ]);
        }
    }

     public function actionCreate5km($car,$emp)
    {
        $this->layout = 'principal2';
        $model = new Registros();

        if ($model->load(Yii::$app->request->post())) {
            $model->tipo_usuario =1;
            $model->id_empleado =$emp;
            $model->id_invitado = '0'; 
            $model->distancia =1;
            $model->status =1;
            $model->paypal = '0';
            $model->parent =0;
            $model->carrera =$car;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio5km($car);   
            $model->edad = $this->edad($model->fecha);
            if ($model->sindicalizado == 1) {
                 $model->categoria = 9;
            }else{
                $model->categoria = 10;
            }
              if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
                # code...
            }
            $mensaje = $this->mensaje($model->id);

             Yii::$app->mailer->compose()
            ->setFrom('correyjuega@mail.telcel.com')
            ->setTo(array($model->email,'vazzacsd@gmail.com'))
            ->setSubject('Inscripción Carrera Sindicato Telcel 5K')
            ->setHtmlBody($mensaje)
            ->send();


            return $this->redirect(['view', 'emp'=>$emp,'car'=>$car,'id' => $model->id, 'dorsal'=>$model->dorsal, 'tipo'=>1]);
        } else {
            return $this->render('create5km', [
                'model' => $model,
                'emp' =>$emp,
                'car'=>$car
            ]);
        }
    }

      public function actionCreate10k($car,$emp)
    {
        $this->layout = 'principal2';
        $model = new Registros();

        if ($model->load(Yii::$app->request->post())) {
            $model->tipo_usuario =1;
            $model->id_empleado =$emp;
            $model->id_invitado ='0';
            $model->distancia =2;
            $model->status =1;
            $model->paypal = '0';
            $model->parent =0;
            $model->carrera =$car;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio10km($car);   
            $model->edad = $this->edad($model->fecha);
            if ($model->sindicalizado == 1) {
                 $model->categoria = 9;
            }else{
                $model->categoria = 10;
            }
              if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
                # code...
            }

            $mensaje = $this->mensaje($model->id);

             Yii::$app->mailer->compose()
            ->setFrom('correyjuega@mail.telcel.com')
            ->setTo(array($model->email,'vazzacsd@gmail.com'))
            ->setSubject('Inscripción Carrera Sindicato Telcel 10K')
            ->setHtmlBody($mensaje)
            ->send();

            return $this->redirect(['view', 'emp'=>$emp,'car'=>$car,'id' => $model->id, 'dorsal'=>$model->dorsal, 'tipo'=>1]);
        } else {
            return $this->render('create10km', [
                'model' => $model,
                'emp' =>$emp,
                'car'=>$car
            ]);
        }
    }

   

     public function actionInvitado5km($car,$emp)
    {
        $this->layout = 'principal2';
        $model = new Registros();

    
        if ($model->load(Yii::$app->request->post())) {
            $model->tipo_usuario =2;
            $model->id_empleado =$emp;
            $model->id_invitado = $emp; 
            $model->distancia =1;
            $model->status =1;
            $model->paypal = '0';
            $model->parent =0;
            $model->carrera =$car;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio5km($car);   
            $model->edad = $this->edad($model->fecha);
            if ($model->sindicalizado == 1) {
                 $model->categoria = 11;
            }else{
                $model->categoria = 12;
            }
              if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
                # code...
            }

            $mensaje = $this->mensaje($model->id);

             Yii::$app->mailer->compose()
            ->setFrom('correyjuega@mail.telcel.com')
            ->setTo(array($model->email,'vazzacsd@gmail.com'))
            ->setSubject('Inscripción Carrera Sindicato Telcel 5k')
            ->setHtmlBody($mensaje)
            ->send();

             return $this->redirect(['view', 'emp'=>$emp,'car'=>$car,'id' => $model->id, 'dorsal'=>$model->dorsal, 'tipo'=>1]);
        } else {
            return $this->render('invitado5km', [
                'model' => $model,
                'emp' =>$emp,
                'car'=>$car
            ]);
        }
    }

     public function actionInvitado10k($car,$emp)
    {
        $this->layout = 'principal2';
        $model = new Registros();

    
        if ($model->load(Yii::$app->request->post())) {
            $model->tipo_usuario =2;
            $model->id_empleado =$emp;
            $model->id_invitado = $emp; 
            $model->distancia =2;
            $model->status =1;
            $model->paypal = '0';
            $model->parent =0;
            $model->carrera =$car;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio10km($car);   
            $model->edad = $this->edad($model->fecha);
            if ($model->sindicalizado == 1) {
                 $model->categoria = 11;
            }else{
                $model->categoria = 12;
            }
              if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
                # code...
            }

            $mensaje = $this->mensaje($model->id);

             Yii::$app->mailer->compose()
            ->setFrom('correyjuega@mail.telcel.com')
            ->setTo(array($model->email,'vazzacsd@gmail.com'))
            ->setSubject('Inscripción Carrera Sindicato Telcel 10K')
            ->setHtmlBody($mensaje)
            ->send();

            return $this->redirect(['view', 'emp'=>$emp,'car'=>$car,'id' => $model->id, 'dorsal'=>$model->dorsal, 'tipo'=>2]);
        } else {
            return $this->render('invitado10k', [
                'model' => $model,
                'emp' =>$emp,
                'car'=>$car
            ]);
        }
    }




     public function actionInfantil($car,$emp)
    {
        $this->layout = 'principal2';
        $model = new Registros();


        if ($model->load(Yii::$app->request->post())) {

            $info = $this->infoemp($car,$emp);
            $model->tipo_usuario =3;
            $model->id_empleado =$emp;
            $model->id_invitado = $emp; 
            $model->status =1;
            $model->paypal = '0';
            $model->email =$info['email'];
            $model->carrera =$car;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolioInfante($car);   
            $model->edad = $this->edad($model->fecha);
            if ($model->edad > 5) {
                 $model->categoria = 8;
                 $model->distancia =5;
            }else{
                $model->categoria = 7;
                $model->distancia =4;
            }
              if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
                # code...
            }
             $mensaje = $this->mensaje($model->id);

             Yii::$app->mailer->compose()
            ->setFrom('correyjuega@mail.telcel.com')
            ->setTo(array($model->email,'vazzacsd@gmail.com'))
            ->setSubject('Inscripción Carrera Sindicato Telcel Infantil')
            ->setHtmlBody($mensaje)
            ->send();

            return $this->redirect(['view', 'emp'=>$emp,'car'=>$car,'id' => $model->id, 'dorsal'=>$model->dorsal, 'tipo'=>4]);
        } else {
            return $this->render('infantil', [
                'model' => $model,
                'emp' =>$emp,
                'car'=>$car
            ]);
        }
    }

      public function actionCreate5kmsadad($car,$emp)
    {
        $this->layout = 'principal2';
        $model = new Registros();
        

     

        if ($model->load(Yii::$app->request->post())) {

        
            $model->tipo_usuario =1;
            $model->id_empleado =$emp;
            $model->id_invitado = 0; 
            $model->distancia =1;
            $model->status =1;
            $model->paypal =0;
            $model->parent =0;
            $model->carrera =$car;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio5km($car);   
            $model->edad = $this->edad($model->fecha); 

          
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
                # code...
            }
            return $this->redirect(['view', 'car' => $car, 'emp' =>$emp]);
        } else {
            return $this->render('create5km', [
                'model' => $model,
            ]);
        }
    }


      public function actionCreate5km333($car)
    {
        $this->layout = 'principal2';
        $model = new Registros();
        $session = Yii::$app->session;
        $carrera = $_GET['car'];

        $existe = $this->verificaExite($session['emp'],$carrera);

        if ($existe >0) {
            $id = $this->traerID5km($session['emp'],$carrera,1);
            return $this->redirect(['view', 'id'=>$id,'emp' =>$session['emp']]);
        }else{
        if ($model->load(Yii::$app->request->post()))
         {

            $model->tipo_usuario =1;
            $model->id_empleado =$session['emp'];
            $model->id_invitado = '0'; 
            $model->distancia =1;
            $model->status =1;
            $model->paypal ='0';
            $model->parent =0;
            $model->carrera =$carrera;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio5km($carrera);   
            $model->edad = $this->edad($model->fecha); 
            $model->save();
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
                # code...
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create5km', [
                'model' => $model,
            ]);
        }
    }
    }

    public function actionInvitados5km($car)
    {
        $this->layout = 'principal2';
        $model = new Registros();
        $model->scenario = 'upuser';

        $session = Yii::$app->session;
        $carrera = $_GET['car'];




        //$numero = $this->traerInvitadosEmp5km($session['emp'],$carrera,2);

        /*if ($numero >0 && $numero < 3) {
            $id = $this->traerID5km($session['emp'],$carrera,1);
            return $this->redirect(['view', 'id'=>$id,'emp' =>$session['emp']]);
        }else{*/
        if ($model->load(Yii::$app->request->post()))
         {

            $model->tipo_usuario =1;
            $model->id_empleado = '0';
            $model->id_invitado = $session['emp']; 
            $model->distancia =1;
            $model->status =1;
            $model->paypal ='0';
            $model->parent =0;
            $model->carrera =$carrera;
            $model->fecha_reg = new \yii\db\Expression('NOW()');
            $model->dorsal = $this->ultimoFolio5km($carrera);   
            $model->edad = $this->edad($model->fecha); 
            $model->save();
            if (!$model->save()) {
                echo "<pre>";
                print_r($model->getErrors());
                echo "</pre>";
                exit;
                # code...
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('invitado5km', [
                'model' => $model,
            ]);
        //}
    }
    }

    /**
     * Updates an existing Registros model.
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
     * Deletes an existing Registros model.
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
     * Finds the Registros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Registros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Registros::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



   
    public function verificaExite($emp,$car){
        $existe = Registros::find()->where(['id_empleado'=>$emp])->andWhere(['distancia'=>1])->andWhere(['carrera'=>$car])->count();
        $result =intval($existe);
        return $result;
            }


    public function verificaExiteInv($emp,$car){
        $existe = Registros::find()->where(['id_e'=>$emp])->andWhere(['distancia'=>1])->andWhere(['carrera'=>$car])->count();
        $result =intval($existe);
        return $result;
            }

      public function traerID5km($emp,$car,$tipo){
        $existe = Registros::find()->where(['id_empleado'=>$emp])->andWhere(['tipo_usuario'=>$tipo])->andWhere(['distancia'=>1])->andWhere(['carrera'=>$car])->one();
        return $existe->id;
            }


public function actionPdf1km($car,$id)
    {
        //$this->layout = 'principal2';

       $datoscar = \Yii::$app->db->createCommand("SELECT * FROM registros where carrera=$car and (tipo_usuario=1 or tipo_usuario=2) and dorsal=$id")->queryOne();

        $datoscar2 = \Yii::$app->db->createCommand("SELECT * FROM registros where carrera=$car and tipo_usuario=3 and dorsal=$id")->queryOne();

    $detallecar = \Yii::$app->db->createCommand("SELECT * FROM detalle_carrera where id_carrera=$datoscar[carrera]")->queryOne();

    $dorsal = str_pad( $datoscar['dorsal'], 3, '0', STR_PAD_LEFT);

    if ($datoscar['distancia']==4) {
       $dist ='100 m';
    }

    if ($datoscar['distancia']==5) {
       $dist ='200 m';
    }

    $edad = $datoscar['edad'];

        $html = "<br>
<b> $detallecar[titulo]</b>
        <br><bR>";


$html .="<p>NOMBRE DEL NIÑO:  <b><b>$datoscar2[nombre] $datoscar2[apellido_paterno] $datoscar2[apellido_materno]</b></b></p>
        <p>NOMBRE DEL ADULTO: <b><b>$datoscar[nombre] $datoscar[apellido_paterno] $datoscar[apellido_materno]</b></b></p>";
        $html .="<p>Por este medio tenemos el gusto de informarle que su registro a la carrera <strong>1 KM</strong> se ha completado satisfactoriamente.</p>";
           $html .= "<p>Sus número para la carrera es:<b>$dorsal</b></p>";
                    $html .= "<center><p style='text-align:center;'><b>EXONERACIÓN DE RESPONSABILIDAD LEGAL</b></p></center>";
        $html .= "<p align='justify' style='font-size:12px'> Yo actuando como adulto responsable del menor de edad _____________________________________________________, declaro
en forma voluntaria que he decidido permitir su participación en este EVENTO deportivo. Al haber hecho la inscripción del menor
personalmente o por medio de un tercero; Declaro que el menor es apto y se encuentra en adecuadas condiciones de salud física y
mental, está entrenado y preparado para participar en el EVENTO; Declaro que he leído, conozco y acepto el reglamento del
EVENTO. Acepto cualquier decisión de la organización del EVENTO sobre la participación del menor. Asumo todos los riesgos
asociados con su participación en este EVENTO incluyendo caídas, accidentes o lesiones (esguinces, contusiones, fracturas,
cortaduras y laceraciones) e incluso la muerte, desprendimientos de tierra, alteraciones de orden público, acciones delincuenciales,
enfermedades generales, enfermedades de tipo cardiaco y respiratorio entre otras razones, por el contacto con otros participantes y
otros individuos o grupos, las condiciones del clima incluyendo temperatura, lluvias y humedad, vegetación, tránsito vehicular,
condiciones del recorrido, y en general todo riesgo que declaro conocido y valorado por mí, así mismo declaro que conozco la
información general y particular del EVENTO y la ruta en la que participara el menor, entiendo y acepto que la participación del menor
en el EVENTO puede conllevar a riesgos para su salud e integridad física o moral, no obstante deseo que participe. Habiendo leído
esta declaración, acepto y permito su participación en el EVENTO, yo, en mi nombre y en el de cualquier persona que actúe en mi
representación libero a los organizadores del EVENTO, prestadores de servicios, voluntarios, proveedores de insumos,
patrocinadores y sus representantes y sucesores, de todo reclamo o responsabilidad de cualquier tipo que surja de la participación del
menor de edad en este EVENTO, así mismo los libero de cualquier responsabilidad de extravío, robo y/o hurto que pudiere sufrir el
menor de edad. Autorizo a los organizadores del EVENTO y a los patrocinadores al uso de los datos personales del menor para fines
institucionales y publicitarios, para el envío de mensajes de texto y correos electrónicos, así como para trasmitirlos y difundirlos en
medios digitales, redes sociales y cualquier otro medio que consideren pertinente, también los autorizo para el uso de fotografías,
películas, videos, grabaciones y cualquier otro medio de registro de este evento para cualquier uso legítimo sin compensación
económica alguna.</p>
<p>Padre o Tutor:</p>
<p> Nombre completo: ________________________________________Número de Empleado:________________

<p>Imprime y llena esta forma.</p>";




        
     



$html .= "

<p style='text-align:center;'>FIRMA</p>
<p style='text-align:center;'>___________________________________________</p>

<p style='text-align:center;font-size:12px'>¡Te deseamos toda la suerte del mundo y disfruta la carrera!</p>
<p style='text-align:center;font-size:12px'>Atentamente</p>
<p style='text-align:center;font-size:12px'><b>Organización de la Carrera Sindicato Telcel 2017</b><p>
         ";

        $fName = "";

        return Yii::$app->pdf->exportData('Inscripcion',$fName,$html);

    }

public function actionPdf5km($id)
    {
        //$this->layout = 'principal2';

       $datoscar = \Yii::$app->db->createCommand("SELECT * FROM registros where id=$id")->queryOne();

    $detallecar = \Yii::$app->db->createCommand("SELECT * FROM detalle_carrera where id_carrera=$datoscar[carrera]")->queryOne();

    $dorsal = str_pad( $datoscar['dorsal'], 3, '0', STR_PAD_LEFT);

    if ($datoscar['distancia']==4) {
       $dist ='100 m';
    }

    if ($datoscar['distancia']==5) {
       $dist ='200 m';
    }

    if ($datoscar['distancia']==1) {
       $dist ='5 KM';
    }

     if ($datoscar['distancia']==2) {
       $dist='10 KM';
    }

    $edad = $datoscar['edad'];

        $html = "<br>
<b> $detallecar[titulo]</b>
        <br><bR>";
if ($datoscar['tipo_usuario']==3) {

    $html .= "<p>Estimado <b>NIÑO(A) $datoscar[nombre] $datoscar[apellido_paterno] $datoscar[apellido_materno]</b>,</p>";
    $html .="<p>Por este medio tenemos el gusto de informarle que su registro a la carrera <b>INFANTIL $dist</b> se ha completado
satisfactoriamente.</p>";
   $html .= "<p>Su número para la carrera es:<b>N$dorsal</b></p>";
    $html .= "<center><p style='text-align:center;'><b>EXONERACIÓN DE RESPONSABILIDAD LEGAL</b></p></center>";

    $html .= "<p align='justify' style='font-size:12px'> Yo actuando como adulto responsable del menor de edad _____________________________________________________, declaro
en forma voluntaria que he decidido permitir su participación en este EVENTO deportivo. Al haber hecho la inscripción del menor
personalmente o por medio de un tercero; Declaro que el menor es apto y se encuentra en adecuadas condiciones de salud física y
mental, está entrenado y preparado para participar en el EVENTO; Declaro que he leído, conozco y acepto el reglamento del
EVENTO. Acepto cualquier decisión de la organización del EVENTO sobre la participación del menor. Asumo todos los riesgos
asociados con su participación en este EVENTO incluyendo caídas, accidentes o lesiones (esguinces, contusiones, fracturas,
cortaduras y laceraciones) e incluso la muerte, desprendimientos de tierra, alteraciones de orden público, acciones delincuenciales,
enfermedades generales, enfermedades de tipo cardiaco y respiratorio entre otras razones, por el contacto con otros participantes y
otros individuos o grupos, las condiciones del clima incluyendo temperatura, lluvias y humedad, vegetación, tránsito vehicular,
condiciones del recorrido, y en general todo riesgo que declaro conocido y valorado por mí, así mismo declaro que conozco la
información general y particular del EVENTO y la ruta en la que participara el menor, entiendo y acepto que la participación del menor
en el EVENTO puede conllevar a riesgos para su salud e integridad física o moral, no obstante deseo que participe. Habiendo leído
esta declaración, acepto y permito su participación en el EVENTO, yo, en mi nombre y en el de cualquier persona que actúe en mi
representación libero a los organizadores del EVENTO, prestadores de servicios, voluntarios, proveedores de insumos,
patrocinadores y sus representantes y sucesores, de todo reclamo o responsabilidad de cualquier tipo que surja de la participación del
menor de edad en este EVENTO, así mismo los libero de cualquier responsabilidad de extravío, robo y/o hurto que pudiere sufrir el
menor de edad. Autorizo a los organizadores del EVENTO y a los patrocinadores al uso de los datos personales del menor para fines
institucionales y publicitarios, para el envío de mensajes de texto y correos electrónicos, así como para trasmitirlos y difundirlos en
medios digitales, redes sociales y cualquier otro medio que consideren pertinente, también los autorizo para el uso de fotografías,
películas, videos, grabaciones y cualquier otro medio de registro de este evento para cualquier uso legítimo sin compensación
económica alguna.</p>
<p>Padre o Tutor:</p>
<p> Nombre completo: ________________________________________Número de Empleado:________________

<p>Imprime y llena esta forma.</p>";
    # code...
}else{

$html .="<p>Estimad@: <b>$datoscar[nombre] $datoscar[apellido_paterno] $datoscar[apellido_materno]</b></p>";
        $html .="<p>Por este medio tenemos el gusto de informarle que su registro a la carrera <b>$dist</b> se ha completado satisfactoriamente.</p>";
           $html .= "<p>Su número para la carrera es:<b>$dorsal</b></p>";
                    $html .= "<center><p style='text-align:center;'><b>EXONERACIÓN DE RESPONSABILIDAD LEGAL</b></p></center>";
         $html .= "<p align='justify' style='font-size:12px'>Por medio del presente documento hago constar que he leído la convocatoria totalmente y me responsabilizo que me encuentro en
perfectas condiciones físicas, que conozco el deporte del atletismo, así como los riesgos que implica la práctica del mismo, el
reglamento vigente de cada federación mexicana de este deporte y que en base a todo lo anterior declaro que libero a la Federación
Mexicana de Atletismo, a los integrantes del comité organizador, patrocinadores, organizadores, accionistas o representantes de las
compañías, de todos los riesgos, peligros y daños que pudiera sufrir mi salud al participar en la carrera de arriba mencionada. Yo soy
el único responsable de mi salud, cualquier accidente o deficiencia que pudiera causar de cualquier manera alteración a mi salud o
integridad física e incluso la muerte. Por esta razón renuncio a cualquier derecho, demanda o indemnización al respecto, ya que
voluntaria y conscientemente he solicitado inscribirme.</p>
<p align='justify'  style='font-size:12px'>
Autorizo al Comité Organizador, a utilizar mi imagen, voz y nombre ya sea total o parcialmente en lo relacionado al evento. Estoy
consciente de que para participar en la carrera debo estar preparado físicamente para el esfuerzo que voy a realizar.</p>
<p align='justify'  style='font-size:12px'>
Manifiesto expresamente que me encuentro en perfecto estado de salud tanto física como mental, así como legalmente capacitado
para la suscripción del presente documento, además de haberlo leído, entendido y comprendido en su totalidad las reglas de
participación del EVENTO, por lo que en este acto suscribo el presente documento.</p>
<p> Nombre completo: ________________________________________Número de Empleado:________________

<p>Imprime y llena esta forma.</p><bR>";


}

        
     



$html .= "

<p style='text-align:center;'>FIRMA</p>
<p style='text-align:center;'>___________________________________________</p>
<br>
<p style='text-align:center;'>¡Te deseamos toda la suerte del mundo y disfruta la carrera!</p>
<p style='text-align:center;'>Atentamente</p>
<p style='text-align:center;'><b>Organización de la Carrera Sindicato Telcel 2017</b><p>
         ";

        $fName = "";

        return Yii::$app->pdf->exportData('Inscripcion',$fName,$html);

    }

    function traerInvitadosEmp5km($carrera,$emp,$db){

 $numero_invitado = Registros::find()->where(['id_empleado'=>$emp])->andWhere(['tipo_usuario'=>$tipo])->andWhere(['distancia'=>1])->andWhere(['carrera'=>$car])->count();


return $numero_invitado;
}

public function actionPdfInfantil($id)
    {
        //$this->layout = 'principal2';

       $datoscar = \Yii::$app->db->createCommand("SELECT * FROM registros where id=$id")->queryOne();

    $detallecar = \Yii::$app->db->createCommand("SELECT * FROM detalle_carrera where id_carrera=$datoscar[carrera]")->queryOne();

    $dorsal = str_pad( $datoscar['dorsal'], 3, '0', STR_PAD_LEFT);

        $html = "<br>
<b> $detallecar[titulo]</b>
        <br><bR>";
if ($datoscar['tipo_usuario']==3) {

    $html .= "<p>Por este medio le informamos que el niño(a) <b>$datoscar[nombre] $datoscar[apellido_paterno] $datoscar[apellido_materno]</b>, ha sido registrado
satisfactoriamente a la carrera.</p>";
   $html .= "<p>Su número para la carrera es:<b>N$dorsal</b></p>";
    # code...
}else{

$html .="<p>Estimad@: <b>$datoscar[nombre] $datoscar[apellido_paterno] $datoscar[apellido_materno]</b></p>";
        $html .="<p>Por este medio tenemos el gusto de informarle que su registro a la carrera <strong>5 KM</strong> se ha completado satisfactoriamente.</p>";
           $html .= "<p>Su número para la carrera es:<b>$dorsal</b></p>";

}

        
     
         $html .= "<center><p style='text-align:center;'><b>EXONERACIÓN DE RESPONSABILIDAD LEGAL</b></p></center>";
         $html .= "<p align='justify' style='font-size:12px'>Por medio del presente documento hago constar que he leído la convocatoria totalmente y me responsabilizo que me encuentro en
perfectas condiciones físicas, que conozco el deporte del atletismo, así como los riesgos que implica la práctica del mismo, el
reglamento vigente de cada federación mexicana de este deporte y que en base a todo lo anterior declaro que libero a la Federación
Mexicana de Atletismo, a los integrantes del comité organizador, patrocinadores, organizadores, accionistas o representantes de las
compañías, de todos los riesgos, peligros y daños que pudiera sufrir mi salud al participar en la carrera de arriba mencionada. Yo soy
el único responsable de mi salud, cualquier accidente o deficiencia que pudiera causar de cualquier manera alteración a mi salud o
integridad física e incluso la muerte. Por esta razón renuncio a cualquier derecho, demanda o indemnización al respecto, ya que
voluntaria y conscientemente he solicitado inscribirme.</p>
<p align='justify'  style='font-size:12px'>
Autorizo al Comité Organizador, a utilizar mi imagen, voz y nombre ya sea total o parcialmente en lo relacionado al evento. Estoy
consciente de que para participar en la carrera debo estar preparado físicamente para el esfuerzo que voy a realizar.</p>
<p align='justify'  style='font-size:12px'>
Manifiesto expresamente que me encuentro en perfecto estado de salud tanto física como mental, así como legalmente capacitado
para la suscripción del presente documento, además de haberlo leído, entendido y comprendido en su totalidad las reglas de
participación del EVENTO, por lo que en este acto suscribo el presente documento.</p>
<p> Nombre completo: ________________________________________Número de Empleado:________________

<p>Imprime y llena esta forma.</p>";



$html .= "<bR>

<p style='text-align:center;'>FIRMA</p>
<p style='text-align:center;'>___________________________________________</p>
<br>
<p style='text-align:center;'>¡Te deseamos toda la suerte del mundo y disfruta la carrera!</p>
<p style='text-align:center;'>Atentamente</p>
<p style='text-align:center;'><b>Organización de la Carrera Sindicato Telcel 2017</b><p>
         ";

        $fName = "";

        return Yii::$app->pdf->exportData('Inscripcion',$fName,$html);

    }

 public function edad($fecha){
    $fecha = str_replace("/","-",$fecha);
    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    $edad = $hoy - $fecha;
    return $edad;
    }



public function mensaje($id)
    {
        //$this->layout = 'principal2';

        $datoscar = \Yii::$app->db->createCommand("SELECT * FROM registros where id=$id")->queryOne();

    $detallecar = \Yii::$app->db->createCommand("SELECT * FROM detalle_carrera where id_carrera=$datoscar[carrera]")->queryOne();

    $dorsal = str_pad( $datoscar['dorsal'], 3, '0', STR_PAD_LEFT);

    if ($datoscar['distancia']==4) {
       $dist ='100 m';
    }

    if ($datoscar['distancia']==5) {
       $dist ='200 m';
    }

    if ($datoscar['distancia']==1) {
       $dist ='5 KM';
    }

     if ($datoscar['distancia']==2) {
       $dist='10 KM';
    }

    $edad = $datoscar['edad'];


        $html = "<br>
<b> $detallecar[titulo]</b>
        <br><bR>";

if ($datoscar['tipo_usuario']==3) {

    $html .= "<p>Estimado <b>NIÑO(A) $datoscar[nombre] $datoscar[apellido_paterno] $datoscar[apellido_materno]</b>,</p>";
    $html .="<p>Por este medio tenemos el gusto de informarle que su registro a la carrera <b>INFANTIL $dist</b> se ha completado
satisfactoriamente.</p>";
   $html .= "<p>Su número para la carrera es:<b>N$dorsal</b></p>";
    $html .= "<center><p style='text-align:center;'><b>EXONERACIÓN DE RESPONSABILIDAD LEGAL</b></p></center>";

    $html .= "<p align='justify' style='font-size:12px'> Yo actuando como adulto responsable del menor de edad _____________________________________________________, declaro
en forma voluntaria que he decidido permitir su participación en este EVENTO deportivo. Al haber hecho la inscripción del menor
personalmente o por medio de un tercero; Declaro que el menor es apto y se encuentra en adecuadas condiciones de salud física y
mental, está entrenado y preparado para participar en el EVENTO; Declaro que he leído, conozco y acepto el reglamento del
EVENTO. Acepto cualquier decisión de la organización del EVENTO sobre la participación del menor. Asumo todos los riesgos
asociados con su participación en este EVENTO incluyendo caídas, accidentes o lesiones (esguinces, contusiones, fracturas,
cortaduras y laceraciones) e incluso la muerte, desprendimientos de tierra, alteraciones de orden público, acciones delincuenciales,
enfermedades generales, enfermedades de tipo cardiaco y respiratorio entre otras razones, por el contacto con otros participantes y
otros individuos o grupos, las condiciones del clima incluyendo temperatura, lluvias y humedad, vegetación, tránsito vehicular,
condiciones del recorrido, y en general todo riesgo que declaro conocido y valorado por mí, así mismo declaro que conozco la
información general y particular del EVENTO y la ruta en la que participara el menor, entiendo y acepto que la participación del menor
en el EVENTO puede conllevar a riesgos para su salud e integridad física o moral, no obstante deseo que participe. Habiendo leído
esta declaración, acepto y permito su participación en el EVENTO, yo, en mi nombre y en el de cualquier persona que actúe en mi
representación libero a los organizadores del EVENTO, prestadores de servicios, voluntarios, proveedores de insumos,
patrocinadores y sus representantes y sucesores, de todo reclamo o responsabilidad de cualquier tipo que surja de la participación del
menor de edad en este EVENTO, así mismo los libero de cualquier responsabilidad de extravío, robo y/o hurto que pudiere sufrir el
menor de edad. Autorizo a los organizadores del EVENTO y a los patrocinadores al uso de los datos personales del menor para fines
institucionales y publicitarios, para el envío de mensajes de texto y correos electrónicos, así como para trasmitirlos y difundirlos en
medios digitales, redes sociales y cualquier otro medio que consideren pertinente, también los autorizo para el uso de fotografías,
películas, videos, grabaciones y cualquier otro medio de registro de este evento para cualquier uso legítimo sin compensación
económica alguna.</p>
<p>Padre o Tutor:</p>
<p> Nombre completo: ________________________________________Número de Empleado:________________

<p>Imprime y llena esta forma.</p>";
    # code...
}else{



$html .="<p>Estimad@: <b>$datoscar[nombre] $datoscar[apellido_paterno] $datoscar[apellido_materno]</b></p>";
        $html .="<p>Por este medio tenemos el gusto de informarle que su registro a la carrera <b>$dist</b> se ha completado satisfactoriamente.</p>";
           $html .= "<p>Su número para la carrera es:<b>$dorsal</b></p>";
                    $html .= "<center><p style='text-align:center;'><b>EXONERACIÓN DE RESPONSABILIDAD LEGAL</b></p></center>";
         $html .= "<p align='justify' style='font-size:12px'>Por medio del presente documento hago constar que he leído la convocatoria totalmente y me responsabilizo que me encuentro en
perfectas condiciones físicas, que conozco el deporte del atletismo, así como los riesgos que implica la práctica del mismo, el
reglamento vigente de cada federación mexicana de este deporte y que en base a todo lo anterior declaro que libero a la Federación
Mexicana de Atletismo, a los integrantes del comité organizador, patrocinadores, organizadores, accionistas o representantes de las
compañías, de todos los riesgos, peligros y daños que pudiera sufrir mi salud al participar en la carrera de arriba mencionada. Yo soy
el único responsable de mi salud, cualquier accidente o deficiencia que pudiera causar de cualquier manera alteración a mi salud o
integridad física e incluso la muerte. Por esta razón renuncio a cualquier derecho, demanda o indemnización al respecto, ya que
voluntaria y conscientemente he solicitado inscribirme.</p>
<p align='justify'  style='font-size:12px'>
Autorizo al Comité Organizador, a utilizar mi imagen, voz y nombre ya sea total o parcialmente en lo relacionado al evento. Estoy
consciente de que para participar en la carrera debo estar preparado físicamente para el esfuerzo que voy a realizar.</p>
<p align='justify'  style='font-size:12px'>
Manifiesto expresamente que me encuentro en perfecto estado de salud tanto física como mental, así como legalmente capacitado
para la suscripción del presente documento, además de haberlo leído, entendido y comprendido en su totalidad las reglas de
participación del EVENTO, por lo que en este acto suscribo el presente documento.</p>
<p> Nombre completo: ________________________________________Número de Empleado:________________

<p>Imprime y llena esta forma.</p><bR>";

}

$html .= "

<p style='text-align:center;'>FIRMA</p>
<p style='text-align:center;'>___________________________________________</p>
<br>
<p style='text-align:center;'>¡Te deseamos toda la suerte del mundo y disfruta la carrera!</p>
<p style='text-align:center;'>Atentamente</p>
<p style='text-align:center;'><b>Organización de la Carrera Sindicato Telcel 2017</b><p>
         ";

      //  $fName = "";

       // $fName = "";

        return $html;

    }


    public function mensaje1k($car,$id)
    {
        //$this->layout = 'principal2';

   
       $datoscar = \Yii::$app->db->createCommand("SELECT * FROM registros where carrera=$car and (tipo_usuario=1 or tipo_usuario=2) and dorsal=$id")->queryOne();

        $datoscar2 = \Yii::$app->db->createCommand("SELECT * FROM registros where carrera=$car and tipo_usuario=3 and dorsal=$id")->queryOne();

    $detallecar = \Yii::$app->db->createCommand("SELECT * FROM detalle_carrera where id_carrera=$datoscar[carrera]")->queryOne();

    $dorsal = str_pad( $datoscar['dorsal'], 3, '0', STR_PAD_LEFT);

    if ($datoscar['distancia']==4) {
       $dist ='100 m';
    }

    if ($datoscar['distancia']==5) {
       $dist ='200 m';
    }

    $edad = $datoscar['edad'];

        $html = "<br>
<b> $detallecar[titulo]</b>
        <br><bR>";


$html .="<p>NOMBRE DEL NIÑO:  <b><b>$datoscar2[nombre] $datoscar2[apellido_paterno] $datoscar2[apellido_materno]</b></b></p>
        <p>NOMBRE DEL ADULTO: <b><b>$datoscar[nombre] $datoscar[apellido_paterno] $datoscar[apellido_materno]</b></b></p>";
        $html .="<p>Por este medio tenemos el gusto de informarle que su registro a la carrera <strong>1 KM</strong> se ha completado satisfactoriamente.</p>";
           $html .= "<p>Sus número para la carrera es:<b>$dorsal</b></p>";
                    $html .= "<center><p style='text-align:center;'><b>EXONERACIÓN DE RESPONSABILIDAD LEGAL</b></p></center>";
        $html .= "<p align='justify' style='font-size:12px'> Yo actuando como adulto responsable del menor de edad _____________________________________________________, declaro
en forma voluntaria que he decidido permitir su participación en este EVENTO deportivo. Al haber hecho la inscripción del menor
personalmente o por medio de un tercero; Declaro que el menor es apto y se encuentra en adecuadas condiciones de salud física y
mental, está entrenado y preparado para participar en el EVENTO; Declaro que he leído, conozco y acepto el reglamento del
EVENTO. Acepto cualquier decisión de la organización del EVENTO sobre la participación del menor. Asumo todos los riesgos
asociados con su participación en este EVENTO incluyendo caídas, accidentes o lesiones (esguinces, contusiones, fracturas,
cortaduras y laceraciones) e incluso la muerte, desprendimientos de tierra, alteraciones de orden público, acciones delincuenciales,
enfermedades generales, enfermedades de tipo cardiaco y respiratorio entre otras razones, por el contacto con otros participantes y
otros individuos o grupos, las condiciones del clima incluyendo temperatura, lluvias y humedad, vegetación, tránsito vehicular,
condiciones del recorrido, y en general todo riesgo que declaro conocido y valorado por mí, así mismo declaro que conozco la
información general y particular del EVENTO y la ruta en la que participara el menor, entiendo y acepto que la participación del menor
en el EVENTO puede conllevar a riesgos para su salud e integridad física o moral, no obstante deseo que participe. Habiendo leído
esta declaración, acepto y permito su participación en el EVENTO, yo, en mi nombre y en el de cualquier persona que actúe en mi
representación libero a los organizadores del EVENTO, prestadores de servicios, voluntarios, proveedores de insumos,
patrocinadores y sus representantes y sucesores, de todo reclamo o responsabilidad de cualquier tipo que surja de la participación del
menor de edad en este EVENTO, así mismo los libero de cualquier responsabilidad de extravío, robo y/o hurto que pudiere sufrir el
menor de edad. Autorizo a los organizadores del EVENTO y a los patrocinadores al uso de los datos personales del menor para fines
institucionales y publicitarios, para el envío de mensajes de texto y correos electrónicos, así como para trasmitirlos y difundirlos en
medios digitales, redes sociales y cualquier otro medio que consideren pertinente, también los autorizo para el uso de fotografías,
películas, videos, grabaciones y cualquier otro medio de registro de este evento para cualquier uso legítimo sin compensación
económica alguna.</p>
<p>Padre o Tutor:</p>
<p> Nombre completo: ________________________________________Número de Empleado:________________

<p>Imprime y llena esta forma.</p>";




        
     



$html .= "

<p style='text-align:center;'>FIRMA</p>
<p style='text-align:center;'>___________________________________________</p>

<p style='text-align:center;font-size:12px'>¡Te deseamos toda la suerte del mundo y disfruta la carrera!</p>
<p style='text-align:center;font-size:12px'>Atentamente</p>
<p style='text-align:center;font-size:12px'><b>Organización de la Carrera Sindicato Telcel 2017</b><p>
         ";

      //  $fName = "";

       // $fName = "";

        return $html;

    }


public function infoemp($car,$id){


     $info = \Yii::$app->db->createCommand("SELECT * FROM registros where carrera=$car and id_empleado=$id")->queryOne();

     return $info;
}


}
