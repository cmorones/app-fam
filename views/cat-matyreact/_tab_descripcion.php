<?php use yii\helpers\Html; ?>

<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> Descripción del Materia y/o reactivo

	</h2>
  </div><!-- /.col -->
</div>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		 <table class="table table-striped">
             <tr>
                <th>Clave</th>
                <td><?=$model->clave?></td>
            </tr>

            <tr>
                <th>Nombre</th>
                <td><?=$model->nombre?></td>
            </tr>

             <tr>
                <th>Categoria</th>
                <td><?=$model->nombre?></td>
            </tr>

              <tr>
                <th>Tipo</th>
                <td><?=$model->nombre?></td>
            </tr>

               <tr>
                <th>Tipo des</th>
                <td><?=$model->nombre?></td>
            </tr>


         
           
        </table>
	</div>



	

</div> <!---Main Row Div--->