<?php

namespace app\modules\almacen\controllers;
use Yii;
use Yii\web\Session;
use app\modules\almacen\models\AlArticulos;
//use app\modules\almacen\models\ConsSalidas;

class ShoppingCartController extends \yii\web\Controller
{
    public function actionIndex()
    {
       echo $id;
    }

     public function actionAdd($id,$cantidad)
    {
         $data = new AlArticulos();
                $dataProduct = $data->getInfoProductBy($id);
                if (!isset(Yii::$app->session['al_cart'])) {
                        $cart[$id] = [
                                'nombre'=> $dataProduct['descripcion'],
                               // 'precio'=> $dataProduct['precio'],
                                'cantidad'=> $cantidad,

                        ];
                }else{

                        $cart = Yii::$app->session['al_cart'];
                        if (array_key_exists($id,$cart)) {
                                  $cart[$id] = [
                                'nombre'=> $dataProduct['descripcion'],
                               // 'precio'=> $dataProduct['precio'],
                                'cantidad'=> (int)$cart[$id]['cantidad']+$cantidad,

                        ];
                        }else{

                                 $cart[$id] = [
                                'nombre'=> $dataProduct['descripcion'],
                               // 'precio'=> $dataProduct['precio'],
                                'cantidad'=> $cantidad,

                        ];

                        }
                }

             Yii::$app->session['al_cart'] = $cart;

     
    }

         public function actionAdd2($id, $quantity)
    {
        

        // $data = new Productos();
          //      $dataProduct = $data->getInfoProductBy($id);

                 	# code...
               if (isset(Yii::$app->session['al_cart'])) {
                 $cart = Yii::$app->session['al_cart'];

                        if (array_key_exists($id,$cart)) {

                        	if ($quantity) {
                        	

                                  $cart[$id] = [
                                'nombre'=> $cart[$id]['nombre'],
                              //  'precio'=> $cart[$id]['precio'],
                                'cantidad'=> $quantity,

		                        ];
		                    }else{
                    	unset($cart[$id]);
                        }
                    }
                }
                

             Yii::$app->session['al_cart'] = $cart;
            
            return $this->renderAjax('cart',['cart'=>$cart]);

     
    }

          public function actionAddent($id, $quantity, $idp)
    {
        

        // $data = new Productos();
          //      $dataProduct = $data->getInfoProductBy($id);

                  # code...
               if (isset(Yii::$app->session['al_ent'])) {
                 $cart = Yii::$app->session['al_ent'];

                        if (array_key_exists($id,$cart)) {

                          if ($quantity) {
                          

                                  $cart[$id] = [
                                'nombre'=> $cart[$id]['nombre'],
                              //  'precio'=> $cart[$id]['precio'],
                                'cantidad'=> $quantity,

                            ];
                        }else{
                      unset($cart[$id]);
                        }
                    }
                }
                

             Yii::$app->session['al_ent'] = $cart;
            
            return $this->render('ent',['cart'=>$cart, 'idp'=>$idp]);

     
    }

    

    public function actionCart($idp){
    	$cart =  Yii::$app->session['al_cart'];
    	return $this->render('cart', ['cart'=>$cart,'idp'=>$idp]);
    }

    public function actionCart2(){
        $cart =  Yii::$app->session['al_cart'];
        return $this->render('cart2', ['cart'=>$cart]);
    }

    public function actionEntrada($idp){
        $cart =  Yii::$app->session['al_ent'];
        return $this->render('ent', ['cart'=>$cart,'idp'=>$idp]);
    }


}
