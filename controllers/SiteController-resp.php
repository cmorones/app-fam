<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use yii\web\Session;
use yii\web\View;
use yii\helpers\Html;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
  public $rememberMe = true;
  public $email;

  public $successUrl = ''; //bikin variabel successUrl
  private $_user = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index','logout','registro'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
                'successUrl' => $this->successUrl

            ],
        ];
    }

     public function successCallback($client)
    {
        
        $attributes = $client->getUserAttributes();

        //echo json_encode($attributes);
       // die();
        // user login or signup comes here
        $this->email = $attributes['emails'][0]['value'];

        
        $user = \Yii::$app->db ->createCommand("SELECT * FROM users WHERE mail='$this->email'")
        ->queryOne();

       //echo json_encode($user);
      // die();


    if(!empty($user)){
        
        Yii::$app->user->login($this->getUser(),$this->rememberMe ? 3600*24*30 : 0);

         //print_r($attributes);
         return $this->render('index');
       
    }
    else{
        //Simpen disession attribute user dari Google
        $session = Yii::$app->session;
     
        $session['attributes']=$attributes;
        $session->destroy();

    //    $client->removeState();

        // redirect ke form signup, dengan mengset nilai variabell global successUrl
        $this->successUrl = \yii\helpers\Url::to(['site/login']);
    } 



    }

     public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByMail($this->email);
        }

        return $this->_user;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex2()
    {
        if (\Yii::$app->user->isGuest){
        return $this->redirect(['site/login']);
        
        }else {
        return $this->render('index');
        }
    }

    public function actionIndex()
    {
  
  // $this->layout = 'homePage';
    if (\Yii::$app->user->isGuest)
        return $this->redirect(['site/login']);
        else {
            
       // $isStudent = Yii::$app->session->get('stu_id');
       // $isEmployee = Yii::$app->session->get('emp_id');
       // $holidayData = \app\models\NationalHolidays::find()->andWhere(['is_status'=>0])->asArray()->all();
      /*  if(isset($isStudent)) {
            $payFees = Yii::$app->db->createCommand("SELECT SUM(fees_pay_tran_amount) FROM fees_payment_transaction WHERE fees_pay_tran_stu_id=:stuId AND is_status=:status")
                ->bindValues([
                        ':stuId' => Yii::$app->session->get('stu_id'),
                        ':status' => 0,
                    ])
                ->queryScalar();
            $currentFeesData = \app\modules\fees\models\FeesPaymentTransaction::getUnpaidTotal($isStudent);
                return $this->render('stu-dashboard', ['holidayData'=>$holidayData, 'currentFeesData'=>$currentFeesData, 'payFees'=>$payFees]);
        }*/
       // else if(isset($isEmployee))
            return $this->render('index');
        //else
        //    return $this->render('user-dashboard', ['holidayData'=>$holidayData]);
    }
    }


     public function actionEquipos()
    {
  
  // $this->layout = 'homePage';
    if (\Yii::$app->user->isGuest)
        return $this->redirect(['site/login']);
        else {
            
       // $isStudent = Yii::$app->session->get('stu_id');
       // $isEmployee = Yii::$app->session->get('emp_id');
       // $holidayData = \app\models\NationalHolidays::find()->andWhere(['is_status'=>0])->asArray()->all();
      /*  if(isset($isStudent)) {
            $payFees = Yii::$app->db->createCommand("SELECT SUM(fees_pay_tran_amount) FROM fees_payment_transaction WHERE fees_pay_tran_stu_id=:stuId AND is_status=:status")
                ->bindValues([
                        ':stuId' => Yii::$app->session->get('stu_id'),
                        ':status' => 0,
                    ])
                ->queryScalar();
            $currentFeesData = \app\modules\fees\models\FeesPaymentTransaction::getUnpaidTotal($isStudent);
                return $this->render('stu-dashboard', ['holidayData'=>$holidayData, 'currentFeesData'=>$currentFeesData, 'payFees'=>$payFees]);
        }*/
       // else if(isset($isEmployee))
            return $this->render('info_equipos');
        //else
        //    return $this->render('user-dashboard', ['holidayData'=>$holidayData]);
    }
    }

    public function actionRegistro()
    {
  
  // $this->layout = 'homePage';
    if (\Yii::$app->user->isGuest)
        return $this->redirect(['site/login']);
        else {
            

            return $this->render('info_reg');
  }
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
       
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login2', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
       $session = Yii::$app->session;
       $session->destroy();


        Yii::$app->user->logout();


//$script = "google=window.open('https://accounts.google.com/Logout?hl=es');
  //  setTimeout('google.close();window.location=index.php;',2500);";    

/*$script = "function test() {console.log('a meesage logged in console.'); alert('Hello Worl');}";  
  $this->registerJs($script, View::POS_END, 'my-options');*/

        


        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
