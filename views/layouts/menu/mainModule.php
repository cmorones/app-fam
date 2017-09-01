<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>
   <?php
	/*$isStudent = $isEmployee = NULL;

	if(!Yii::$app->user->isGuest){
	      $isStudent = Yii::$app->session->get('stu_id');
	      $isEmployee = Yii::$app->session->get('emp_id');
	}
	if(isset($isStudent))
	{
		$stuMaster = app\modules\student\models\StuMaster::find()->andWhere(['stu_master_id' => $isStudent])->one();
		if(!empty($stuMaster))
		      $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
		else
		      throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
		$Photo = $stuInfo->getStuPhoto($stuInfo->stu_photo);
	}
	else if(isset($isEmployee))
	{
		$empMaster = app\modules\employee\models\EmpMaster::find()->andWhere(['emp_master_id' => $isEmployee])->one();
		if(!empty($empMaster))
		      $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);
		else
		      throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
		$Photo = $empInfo->getEmpPhoto($empInfo->emp_photo);
	}
	else {
		$Photo = Yii::getAlias('@web'). '/data/emp_images/no-photo.png';
	}*/
   ?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

     <?php

    // echo $tipo = Yii::$app->user->identity->perfil; 

     if(Yii::$app->user->identity->perfil==1){
     	
		echo $this->render(
	    'menu_admin.php'
	 );
     }elseif (Yii::$app->user->identity->perfil==2) {
     	echo $this->render(
	    'menu_docente.php'
	 );
     }elseif (Yii::$app->user->identity->perfil==3) {
     	echo $this->render(
	    'menu_lab.php'
	 );
     }

   
     ?>

    
	<!-- sidebar-menu. -- End -->

    </section>

</aside>
