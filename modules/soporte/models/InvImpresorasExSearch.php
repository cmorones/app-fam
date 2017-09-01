<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\InvImpresorasEx;

/**
 * InvImpresorasExSearch represents the model behind the search form about `app\modules\soporte\models\InvImpresorasEx`.
 */
class InvImpresorasExSearch extends InvImpresorasEx
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'procedencia', 'id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'id_area', 'id_piso', 'antiguedad', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'observaciones', 'created_at', 'updated_at'], 'safe'],
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
        $query = InvImpresorasEx::find();

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

          $id_p = Yii::$app->user->identity->id_plantel;


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'procedencia' => $this->procedencia,
            'id_tipo' => $this->id_tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado' => $this->estado,
            'id_plantel' =>  $id_p,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'antiguedad' => $this->antiguedad,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
