<?php

namespace app\modules\ventas\controllers;

use yii\web\Controller;
use app\modules\ventas\models\InvProductos;

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
        
       $data = InvProductos::find()->where(['>', 'existencia', 0])->all();


        return $this->render('index', [
        	'data' => $data,
        	]);
    }
}
