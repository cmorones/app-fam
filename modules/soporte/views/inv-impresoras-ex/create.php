<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\InvImpresorasEx */

$this->title = 'Create Inv Impresoras Ex';
$this->params['breadcrumbs'][] = ['label' => 'Inv Impresoras Exes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inv-impresoras-ex-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
