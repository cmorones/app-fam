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
        
       $data = InvProductos::find()->joinWith('datos')->where(['>', 'existencia', 0])->orderBy(['productos.nombre' => SORT_ASC])->all();
     //  $data2 = InvProductos::find()->->with('productos')->where(['>', 'existencia', 0])->andWhere(['productos.id_categoria'=>1])->all();

          $data2 =  InvProductos::find()
            ->joinWith('datos')
            ->onCondition(['>', 'existencia', 0])
            ->where(['=', 'productos.id_categoria', 1])
            ->orderBy(['productos.nombre' => SORT_ASC])
            ->all();

     $data3 =  InvProductos::find()
            ->joinWith('datos')
            ->onCondition(['>', 'existencia', 0])
            ->where(['=', 'productos.id_categoria', 2])
            ->orderBy(['productos.nombre' => SORT_ASC])
            ->all();

    $data4 =  InvProductos::find()
            ->joinWith('datos')
            ->onCondition(['>', 'existencia', 0])
            ->where(['=', 'productos.id_categoria', 4])
            ->orderBy(['productos.nombre' => SORT_ASC])
            ->all();


        return $this->render('index', [
           	'data' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
        	]);
    }
}
