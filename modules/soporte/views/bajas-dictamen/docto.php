<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\soporte\models\BajasDictamen */

$this->title = 'SUBIR DICTAMEN CON LAS FIRMAS CORRESPONDIENTES';
$this->params['breadcrumbs'][] = ['label' => 'Bajas Dictamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<br>
<br>
<div class="bajas-dictamen-create">


<div ALIGN=center><h1><?= Html::encode($this->title) ?></h1></div>


    <?= $this->render('_docto', [
        'model' => $model,
        'idb' => $idb,
        'model2' => $model2,
    ]) ?>

</div>
