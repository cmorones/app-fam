<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\personal\models\Regpersonal */

$this->title = 'Create Regpersonal';
$this->params['breadcrumbs'][] = ['label' => 'Regpersonals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regpersonal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
