<?php

namespace app\modules\ventas\controllers;

use yii\web\Controller;
use app\modules\admin\models\Productos;

/**
 * Default controller for the `ventas` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        
       $data = Productos::find()->where(['status'=>1])->orderBy('id')->all();


        return $this->render('index', [
        	'data' => $data,
        	]);
    }
}
