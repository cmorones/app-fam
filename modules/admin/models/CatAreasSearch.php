<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\CatAreas;

/**
 * CatAreasSearch represents the model behind the search form about `app\modules\admin\models\CatAreas`.
 */
class CatAreasSearch extends CatAreas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_area', 'id_plantel', 'id_dep', 'nivel', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'created_at', 'updated_at'], 'safe'],
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
        $query = CatAreas::find();

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
            'id_area' => $this->id_area,
            'id_plantel' => $this->id_plantel,
            'id_dep' => $this->id_dep,
            'nivel' => $this->nivel,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
