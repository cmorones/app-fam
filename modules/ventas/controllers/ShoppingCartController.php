<?php

namespace app\modules\ventas\controllers;
use Yii;
use Yii\web\Session;
use app\modules\admin\models\Productos;
use app\modules\ventas\models\Ordenes;

class ShoppingCartController extends \yii\web\Controller
{
    public function actionIndex()
    {
       echo $id;
    }

     public function actionAdd($id)
    {
         $data = new Productos();
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
                                'cantidad'=> (int)$cart[$id]['cantidad']+1,

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

         public function actionAdd2($id, $quantity)
    {
        

        // $data = new Productos();
          //      $dataProduct = $data->getInfoProductBy($id);

                 	# code...
               if (isset(Yii::$app->session['cart'])) {
                 $cart = Yii::$app->session['cart'];

                        if (array_key_exists($id,$cart)) {

                        	if ($quantity) {
                        	

                                  $cart[$id] = [
                                'nombre'=> $cart[$id]['nombre'],
                                'precio'=> $cart[$id]['precio'],
                                'cantidad'=> $quantity,

		                        ];
		                    }else{
                    	unset($cart[$id]);
                        }
                    }
                }
                

             Yii::$app->session['cart'] = $cart;
            
            return $this->renderAjax('cart',['cart'=>$cart]);

     
    }

      public function actionDescuento($tipo)
    {
          
            
                 $cart = Yii::$app->session['cart'];
                  $model = new Ordenes();


        
            
            return $this->renderAjax('cart',['cart'=>$cart, 'tipo'=>$tipo]);

     
    }

    public function actionCart(){
    	$cart =  Yii::$app->session['cart'];
    	return $this->render('cart', ['cart'=>$cart]);
    }

}
