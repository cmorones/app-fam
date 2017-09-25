<?php

namespace app\components;

use Yii;
use yii\base\Component;
Yii\web\Session;
use app\modules\admin\models\Productos;


class Cart extends Component
{         
        public function addCart($id)
        {
                $data = new Product();
                $dataProduct = $data->getInfoProductBy($id);
                if (!isset(Yii::$app->session['cart'])) {
                        $cart[$id] = [
                                'nombre'=> $dataProduct['nombre'],
                                'precio'=> $dataProduct['precio'],
                                'cantidad'=> 1,

                        ];
                }else{

                        $cart = Yii::$app->session['cart'];
                        if (array_key_exists($id,$cart)) {
                                  $cart[$id] = [
                                'nombre'=> $dataProduct['nombre'],
                                'precio'=> $dataProduct['precio'],
                                'cantidad'=> (int) $cart[$id]['cantidad']+1,

                        ];
                        }else{

                                 $cart[$id] = [
                                'nombre'=> $dataProduct['nombre'],
                                'precio'=> $dataProduct['precio'],
                                'cantidad'=> 1,

                        ];

                        }
                }

                Yii::$app->session['cart'] = $cart;
        }

       
}
?>
