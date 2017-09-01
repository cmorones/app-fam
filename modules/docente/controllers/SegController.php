<?php

namespace app\modules\docente\controllers;


use Yii;
use app\modules\dashboard\models\Events;
use app\modules\dashboard\models\EventsSearch;
use yii\web\Controller;

/**
 * Default controller for the `docente` module
 */
class SegController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->all();
        return $this->render('index', [
            'actCourseData' => $actCourseData,
                    ]);
    }

     public function actionCart()
    {
        $actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->all();
        return $this->render('cart', [
            'actCourseData' => $actCourseData,
                    ]);
    }

      public function actionAdd()
    {
      //  $actCourseData = \app\modules\dashboard\models\Events::find()->where(['is_status'=>0])->all();
        return $this->render('_add', [
          //  'actCourseData' => $actCourseData,
                    ]);
    }


}