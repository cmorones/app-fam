<?php

namespace app\modules\ventas\controllers;

use app\modules\ventas\models\BajasDictamen;
use yii\web\Controller;
use Yii;
use app\modules\ventas\models\InvBajas;




class InfPdfController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index',
			[
				'id'=>$id,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }

    

    public function actionIndex2()
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index2',
			[
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }
    

    public function actionIndex4($idb)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index4',
			[
			'idb' => $idb,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }

    public function actionIndex5($idb)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index5',
			[
			'idb' => $idb,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }

    public function actionIndex6()
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index6',
			[

				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }

    public function actionIndex3($idb)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/index4',
			[
			'idb' => $idb,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }
    public function actionRpt()
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/rpt',
			[
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }


    public function actionBaterias($idp)
    {
        //return $this->renderPartial('index');

        $html = $this->renderPartial('/inf-pdf/baterias',
			[
				'idp'=>$idp,
				/*'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,*/
			]);

       // $html = "Hola Mundo";
        $fName = "Cesar Morones_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Informe',$fName,$html);
    }



}
