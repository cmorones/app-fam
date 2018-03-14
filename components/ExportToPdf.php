<?php

/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
 *****************************************************************************************/

/**
 * Class used for export data in PDF Formate.
 * 
 * @package EduSec.components 
 */

namespace app\components;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
//use app\models\Organization;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use mPDF;




	

class ExportToPdf extends Component
{



	public function exportData($title='Listado',$filename='Informe Pdf',$html=NULL)
	{

	$plant = Yii::$app->user->identity->id_plantel;
	$plantel = \app\modules\admin\models\CatPlanteles::find()->where(['id' => $plant])->one();
  	$domicilio=$plantel->domicilio1;
  	$domicilio2=$plantel->domicilio2;
  	$telefono=$plantel->telefono;
  	$email=$plantel->email;

  	if($plant == 23){
  		$area='Dirección de Informática y Telecomunicaciones';
  	}else{
  		$area=$plantel->nombre;
  	}
  	if($plant==23){
  		$nombre='JUD DE SOPORTE TECNICO';
  	}else{
  		$nombre='JUD DE APOYO TECNICO';
  	}
		$mpdf = new mPDF('utf-8', 'A4',0,'',10,10,15,16,4,9,'P');
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		//$org = Organization::find()->asArray()->one();
		//$src = Yii::$app->urlManager->createAbsoluteUrl('site/loadimage');
		$org_image=Html::img('images/logo.png',['alt'=>'No Image','width'=>220, 'height'=>70]); 
		$org_name=$org['org_name'];
		$org_imagef=Html::img('images/IEMS.jpg',['alt'=>'No Image','width'=>220, 'height'=>70]);
		$org_namef=$orgf['org_namef'];
		$org_add="Instituto de Eduación Media Superior";
		$org_p=" ";
		$img1 = Html::img(Yii::$app->request->baseUrl.'/images/unam.jpg', ['width'=>'150px;', 'height'=>'100px;']);
		$img2 = Html::img(Yii::$app->request->baseUrl.'/images/logo.jpg', ['width'=>'80px;', 'height'=>'100px;']) ;
		$mpdf->SetHTMLHeader('');
		$stylesheet = file_get_contents('css/pdf.css'); // external css
		$mpdf->WriteHTML($stylesheet,0);
		//$mpdf->WriteHTML('<watermarkimage src='.$src.' alpha="0.33" size="50,30"/>');
		$mpdf->showWatermarkImage = true;
		$arr = [
		  'odd' => [
		    
		   
		    'R' => [ 
		      'content' => '',
		      'font-size' => 11,
		      'font-style' => 'B',
		      'font-family' => 'serif',
		      'color'=>'#27292b'
		    ],
		    'line' => 1,
		  ],
		  'even' => []
		];
		$mpdf->SetFooter($arr);
		$mpdf->WriteHTML('<sethtmlpageheader name="main" page="ALL" value="on" show-this-page="1">');
	    $mpdf->WriteHTML($html);
		$mpdf->Output($filename.'.pdf',"I");


	}

		public function exportData2($title='Listado',$filename='Informe Pdf',$html=NULL)
	{

	$plant = Yii::$app->user->identity->id_plantel;
	$plantel = \app\modules\admin\models\CatPlanteles::find()->where(['id' => $plant])->one();
  	$domicilio=$plantel->domicilio1;
  	$domicilio2=$plantel->domicilio2;
  	$telefono=$plantel->telefono;
  	$email=$plantel->email;

  	if($plant == 23){
  		$area='Dirección de Informática y Telecomunicaciones';
  	}else{
  		$area=$plantel->nombre;
  	}
  	if($plant==23){
  		$nombre='JUD DE SOPORTE TECNICO';
  	}else{
  		$nombre='JUD DE APOYO TECNICO';
  	}
		$mpdf = new mPDF('utf-8', 'A4',0,'',10,10,15,16,4,9,'P');
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		//$org = Organization::find()->asArray()->one();
		//$src = Yii::$app->urlManager->createAbsoluteUrl('site/loadimage');
		$org_image=Html::img('images/logo.png',['alt'=>'No Image','width'=>220, 'height'=>70]); 
		$org_name=$org['org_name'];
		$org_imagef=Html::img('images/IEMS.jpg',['alt'=>'No Image','width'=>220, 'height'=>70]);
		$org_namef=$orgf['org_namef'];
		$org_add="Instituto de Eduación Media Superior";
		$org_p=" ";
		$img1 = Html::img(Yii::$app->request->baseUrl.'/images/unam.jpg', ['width'=>'150px;', 'height'=>'100px;']);
		$img2 = Html::img(Yii::$app->request->baseUrl.'/images/logo.jpg', ['width'=>'80px;', 'height'=>'100px;']) ;
		$mpdf->SetHTMLHeader('');
		$stylesheet = file_get_contents('css/pdf.css'); // external css
		$mpdf->WriteHTML($stylesheet,0);
		//$mpdf->WriteHTML('<watermarkimage src='.$src.' alpha="0.33" size="50,30"/>');
		$mpdf->showWatermarkImage = true;
		$arr = [
		  'odd' => [
		    
		   
		    'R' => [ 
		      'content' => '',
		      'font-size' => 9,
		     // 'font-style' => 'B',
		      'font-family' => 'serif, arial',
		      'color'=>'#ffffff'
		    ],
		    'line' => 2,
		  ],
		  'even' => []
		];
		$mpdf->SetFooter($arr);
		$mpdf->autoPageBreak = true;
		$mpdf->WriteHTML('<sethtmlpageheader name="main" page="ALL" value="on" show-this-page="1">');
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename.'.pdf',"I");


	}


}

?>
