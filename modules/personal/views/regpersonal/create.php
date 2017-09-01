<?php

use yii\helpers\Html;


?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-border panel-primary">

 <div class="panel-heading">
                                <h3>Agregar en la partida <?=$partida?> programa 0<?=$idp?></h3>
  </div>

   
    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id,
        'idp'=>$idp,
        'partida'=>$partida
    ]) ?>

</div>
</div>
</div>
