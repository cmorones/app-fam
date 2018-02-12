<?php

namespace app\modules\ventas\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ventas\models\InvProductos;
use  yii\web\Session;

/**
 * InvProductosSearch represents the model behind the search form about `app\modules\ventas\models\InvProductos`.
 */
class InvProductosSearch extends InvProductos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_producto', 'id_ubicacion', 'existencia', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
    public function search($params)
    {
        $query = InvProductos::find();

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
            'id_producto' => $this->id_producto,
            'id_ubicacion' => $this->id_ubicacion,
            'existencia' => $this->existencia,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

         $session = Yii::$app->session;
    $session->set('exportData', $dataProvider);

        return $dataProvider;
    }


      public static function getExportData() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Ordenes--List', 
            'title'=>'Listado de Ordenes',
            'exportFile'=>'@app/modules/ventas/views/inv-productos/InvProductosExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }
}
