<br>
<br>
<br>
<br>
<br>

<?php

$cabms = \Yii::$app->db2->createCommand('SELECT * FROM cabms;')->queryAll();

/*

print_r($cabms);
I180000064
*/
foreach ($cabms as $value) {
	# code...

	echo $value['clave_cabms'];
	echo '-';
	echo $value['descripcion'];
	echo '<bR>';
}

?>

Listado de CABMS
