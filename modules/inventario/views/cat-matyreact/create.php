<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\inventario\models\CatMatyreact */

$this->title = 'Create Cat Matyreact';
$this->params['breadcrumbs'][] = ['label' => 'Cat Matyreacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-matyreact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
