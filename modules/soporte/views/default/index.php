

<br>
<br>
<br>
<div class="col-xs-4" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
 <h3>Inventario de Equipos</h3>
   <table class="table table-striped table-bordered">
   <tr>
       <th>Plantel</th>
       <th>Funcionan</th>
       <th>No funcionan</th>
       <th>Total</th>
    </tr>
<?php

    foreach ($planteles as $key => $value) {
      ?>
      <tr>
        <td><?= $value->nombre ?></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value->id])->andWhere(['estado'=>1])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value->id])->andWhere(['estado'=>2])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value->id])->count(); ?></td>
      </tr>
<?php
            }
    ?>

     <tr>
        <td align="right"><strong>Gran Total</strong></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['estado'=>2])->count(); ?></td>
        <td><strong><?= app\modules\soporte\models\InvEquipos::find()->count(); ?></strong></td>  
      </tr>

   </table>
     </div>
   </div>
  </div>
</div>
<div class="col-xs-4" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
 <h3>Inventario de Impresoras</h3>
   <table class="table table-striped table-bordered">
   <tr>
       <th>Plantel</th>
       <th>Funcionan</th>
       <th>No funcionan</th>
       <th>Total</th>
    </tr>
<?php

    foreach ($planteles as $key => $value) {
      ?>
      <tr>
        <td><?= $value->nombre ?></td>
        <td><?= app\modules\soporte\models\InvImpresoras::find()->where(['id_plantel'=>$value->id])->andWhere(['estado'=>1])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvImpresoras::find()->where(['id_plantel'=>$value->id])->andWhere(['estado'=>2])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvImpresoras::find()->where(['id_plantel'=>$value->id])->count(); ?></td>
      </tr>
<?php
            }
    ?>

     <tr>
        <td align="right"><strong>Gran Total</strong></td>
        <td><?= app\modules\soporte\models\InvImpresoras::find()->where(['estado'=>1])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvImpresoras::find()->where(['estado'=>2])->count(); ?></td>
        <td><strong><?= app\modules\soporte\models\InvImpresoras::find()->count(); ?></strong></td>  
      </tr>

   </table>
     </div>
   </div>
  </div>
</div>

<div class="col-xs-4" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
 <h3>Inventario de Equipos Telecom</h3>
   <table class="table table-striped table-bordered">
   <tr>
       <th>Plantel</th>
       <th>Funcionan</th>
       <th>No funcionan</th>
       <th>Total</th>
    </tr>
<?php

    foreach ($planteles as $key => $value) {
      ?>
      <tr>
        <td><?= $value->nombre ?></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value->id])->andWhere(['estado'=>1])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value->id])->andWhere(['estado'=>2])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['id_plantel'=>$value->id])->count(); ?></td>
      </tr>
<?php
            }
    ?>

     <tr>
        <td align="right"><strong>Gran Total</strong></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['estado'=>1])->count(); ?></td>
        <td><?= app\modules\soporte\models\InvEquipos::find()->where(['estado'=>2])->count(); ?></td>
        <td><strong><?= app\modules\soporte\models\InvEquipos::find()->count(); ?></strong></td>  
      </tr>

   </table>
     </div>
   </div>
  </div>
</div>

<!--<div class="col-xs-4" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
 <h3>Grafico de Equipos </h3>
 </div>
   </div>
  </div>
</div>

<div class="col-xs-4" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
 <h3>Grafico de Impresoras </h3>
 </div>
   </div>
  </div>
</div>

<div class="col-xs-4" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
 <h3>Grafico de Telecom </h3>
 </div>
   </div>
  </div>
</div>-->