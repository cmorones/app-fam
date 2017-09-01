<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Impresoras */

$this->title = 'Create Impresoras';
$this->params['breadcrumbs'][] = ['label' => 'Impresoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="impresoras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
