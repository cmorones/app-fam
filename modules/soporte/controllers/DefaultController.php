<?php
namespace app\modules\soporte\controllers;
use app\modules\soporte\models\InvEquipos;
use app\modules\admin\models\CatPlanteles;



use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Default controller for the `soporte` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

       public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
               // 'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index', 'informePdf'],
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
    public function actionIndex()
    {
        

       // $cuentaPlanteles = CatModelo::find()->where(['id'=>$id])->count();
        //$planteles = CatPlanteles::find()->where(['id'=>$id])->all();
        $planteles = CatPlanteles::find()->all();

       /* if ($cuentaModelos > 0) {
            
        }else{
            echo "<option>-</option>";
        }*/


        return $this->render('index', [
            'planteles' => $planteles,
            ]);
    }

    public function actionInformePdf()
    {
        /*$nationality = $empAdd = [];

        $empMaster = EmpMaster::findOne($eid);
        $empDocs = EmpDocs::find()->where(['emp_docs_emp_master_id'=>$eid])->join('join','document_category dc', 'dc.doc_category_id = emp_docs_category_id AND dc.is_status <> 2')->all();
        $empInfo = EmpInfo::find()->where(['emp_info_emp_master_id'=>$eid])->one();

        if($empMaster->emp_master_nationality_id !== null)
            $nationality = Nationality::findOne($empMaster->emp_master_nationality_id)->nationality_name;

        if($empMaster->emp_master_emp_address_id !== null)
            $empAdd = EmpAddress::findOne($empMaster->emp_master_emp_address_id);*/

        $html = $this->renderPartial('/default/informepdf',
            [
                /*'empDocs'=>$empDocs,
                'empMaster'=>$empMaster,
                'empInfo'=>$empInfo,
                'nationality'=>$nationality,
                'empAdd'=>$empAdd,*/
            ]);
    /*  $fName = $empInfo->emp_first_name."_".$empInfo->emp_last_name."_".date('Ymd_His');
        return Yii::$app->pdf->exportData(Yii::t('emp','Employee Profile'),$fName,$html); */
    }

     public function actionCat()
    {
        return $this->render('cat');
    }
}
