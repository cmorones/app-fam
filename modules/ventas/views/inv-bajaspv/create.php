<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ventas\models\InvBajaspv */

?>
<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Bajas de Inventario</h3>
                            </div>
                            <div class="panel-body">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
