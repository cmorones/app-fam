<?php

namespace app\modules\inventario\controllers;

use yii\web\Controller;
//use app\modules\inventario\models;


/**
 * Default controller for the `inventario` module
 */
class InvController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionAdd()
    {
        return $this->render('_add');
    }

   
  

}