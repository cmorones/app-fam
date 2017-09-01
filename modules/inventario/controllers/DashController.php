<?php

namespace app\modules\inventario\controllers;

use yii\web\Controller;
//use app\modules\inventario\models;


/**
 * Default controller for the `inventario` module
 */
class DashController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionResumen()
      {
        $periodos = \app\modules\inventario\models\CatPeriodos::find()->all();
        return $this->render('resumen', [
            'periodos' => $periodos,
                    ]);
    }

  

}
