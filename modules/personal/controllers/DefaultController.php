<?php

namespace app\modules\personal\controllers;

use yii\web\Controller;

/**
 * Default controller for the `personal` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

     

    public function actionListado($id,$partida)
    {
        $actCourseData = \app\modules\personal\models\CatEjercicio::find()->where(['id'=>21])->orderBy('id desc')->all();
        return $this->render('list', [
            'actCourseData' => $actCourseData,
            'id'=>$id,
            'partida'=>$partida,
                    ]);
    }

       public function actionListado183($id)
    {
        $actCourseData = \app\modules\personal\models\CatEjercicio::find()->where(['estado'=>1])->orderBy('id desc')->all();
        return $this->render('list183', [
            'actCourseData' => $actCourseData,
            'id'=>$id
                    ]);
    }

    public function actionPrograma181a()
    {
        return $this->render('programa181-1');
    }


     public function actionPrograma181b()
    {
        return $this->render('programa181-2');
    }


     public function actionPrograma181c()
    {
        return $this->render('programa181-3');
    }


     public function actionPrograma181d()
    {
        return $this->render('programa181-4');
    }

      public function actionSaldo181()
    {
        return $this->render('saldo181');
    }

     public function actionPrograma183a()
    {
        return $this->render('programa183-1');
    }


     public function actionPrograma183b()
    {
        return $this->render('programa183-2');
    }


     public function actionPrograma183c()
    {
        return $this->render('programa183-3');
    }


     public function actionPrograma183d()
    {
        return $this->render('programa183-4');
    }

      public function actionSaldo183()
    {
        return $this->render('saldo183');
    }
}
