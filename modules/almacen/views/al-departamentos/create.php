<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\almacen\models\AlDepartamentos */


?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Agregar Departamentos</h3>
                            </div>




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
