<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\InvBajas;

/**
 * InvBajasSearch represents the model behind the search form about `app\modules\soporte\models\InvBajas`.
 */
class InvBajasSearch extends InvBajas
{
    /**
     * @inheritdoc
     */

    public $valida_almacen;
    public function rules()
    {
        return [
            [['id', 'progresivo', 'id_tipo', 'marca', 'modelo', 'estado_baja', 'tipo_baja', 'id_periodo', 'id_plantel', 'id_area', 'id_piso', 'bloq', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'fecha_baja', 'observaciones', 'dictamen', 'certificado', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params,$id_p)
    {
        $query = InvBajas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $id_plantel = Yii::$app->user->identity->id_plantel;

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'progresivo' => $this->progresivo,
            'id_tipo' => $this->id_tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado_baja' => $this->estado_baja,
            'tipo_baja' => $this->tipo_baja,
            'id_periodo' => $id_p,
             'id_plantel' => $id_plantel,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'fecha_baja' => $this->fecha_baja,
            'bloq' => $this->bloq,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'dictamen', $this->dictamen])
            ->andFilterWhere(['like', 'certificado', $this->certificado]);

        return $dataProvider;
    }

        
    public function search2($params,$id_p)
    {
        $query = InvBajas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

      
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'progresivo' => $this->progresivo,
            'id_tipo' => $this->id_tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado_baja' => $this->estado_baja,
            'tipo_baja' => $this->tipo_baja,
            'id_periodo' => $id_p,
             'id_plantel' => $this->id_plantel,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'fecha_baja' => $this->fecha_baja,
            'bloq' => $this->bloq,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'dictamen', $this->dictamen])
            ->andFilterWhere(['like', 'certificado', $this->certificado]);

      $query->orderBy('progresivo');

        return $dataProvider;
    }

    public function search3($params)
    {
        $query = InvBajas::find();


        // add conditions that should always apply here

$dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                  'pageSize' => 1500,
             ],
             'sort' => [
         'defaultOrder' => [
               'id' => SORT_ASC,
               //'title' => SORT_ASC, 
          ]
          ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //$confirm = InvBajas::find()->where(['bloq' => 0])->all();

      
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'progresivo' => $this->progresivo,
            'id_tipo' => $this->id_tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado_baja' => $this->estado_baja,
            'tipo_baja' => $this->tipo_baja,
             'id_plantel' => $this->id_plantel,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'fecha_baja' => $this->fecha_baja,
            'bloq' => 0,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'dictamen', $this->dictamen])
            ->andFilterWhere(['like', 'certificado', $this->certificado]);

   $session = Yii::$app->session;
    $session->set('exportData', $dataProvider);

        return $dataProvider;
    }

     public static function getExportData() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Listado de Bajas', 
            'title'=>'Listado de Bajas',
            'exportFile'=>'@app/modules/soporte/views/inv-bajas/InvBajasExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }

      public function valida()
    {
        


/*if ($this->id_tipo==4) {
  $clabe_cabs = '5151000138';
}

//echo ":";
//echo $clabe_cabs;
//echo "<br>";
$sql = "SELECT 
  bienes_muebles.clave_cabms, 
  bienes_muebles.progresivo, 
  bienes_muebles.marca, 
  bienes_muebles.modelo, 
  bienes_muebles.serie,
  bienes_muebles.clave_cabms,
  bienes_muebles.id_situacion_bien, 
  resguardos.id_bien_mueble, 
  personal.nombre_empleado, 
  personal.apellidos_empleado, 
  personal.rfc,
  bienes_muebles.fecha_alta,
  situacion_bienes.descripcion 
FROM 
  public.bienes_muebles, 
  public.resguardos, 
  public.personal,
  public.situacion_bienes
WHERE
  bienes_muebles.clave_cabms = '".$clabe_cabs."' and 
  bienes_muebles.progresivo = '$this->progresivo' and
  bienes_muebles.id_situacion_bien = situacion_bienes.id_situacion_bien and  
  resguardos.id_bien_mueble = bienes_muebles.id_bien_mueble AND
  personal.id_empleado = resguardos.id_personal";


$clase ="";
$inventario = \Yii::$app->db2->createCommand($sql)->queryOne();

if ($inventario['progresivo']==$value->progresivo) {
  $img = Html::img('@web/images/checked.png');
}else {
  $img = Html::img('@web/images/unchecked.png');
}

}*/


//$this->valida_almacen =1;//$img;
        return 1;
    }



}
