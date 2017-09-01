<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\InvEquiposEx;

/**
 * InvEquiposExSearch represents the model behind the search form about `app\modules\soporte\models\InvEquiposEx`.
 */
class InvEquiposExSearch extends InvEquiposEx
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'id_area', 'id_piso', 'clasif', 'created_by', 'updated_by', 'procedencia'], 'integer'],
            [['serie', 'procesador', 'ram', 'disco_duro', 'usuario', 'observaciones', 'monitor', 'monitor_serie', 'teclado', 'teclado_serie', 'mouse', 'mouse_serie', 'created_at', 'updated_at'], 'safe'],
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
        $query = InvEquiposEx::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
              'pagination' => [
                  'pageSize' => 20,
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

        $id_p = Yii::$app->user->identity->id_plantel;

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_tipo' => $this->id_tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado' => $this->estado,
            'id_plantel' => $id_p,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'clasif' => $this->clasif,
            'procedencia' => $this->procedencia,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'procesador', $this->procesador])
            ->andFilterWhere(['like', 'ram', $this->ram])
            ->andFilterWhere(['like', 'disco_duro', $this->disco_duro])
            ->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'monitor', $this->monitor])
            ->andFilterWhere(['like', 'monitor_serie', $this->monitor_serie])
            ->andFilterWhere(['like', 'teclado', $this->teclado])
            ->andFilterWhere(['like', 'teclado_serie', $this->teclado_serie])
            ->andFilterWhere(['like', 'mouse', $this->mouse])
            ->andFilterWhere(['like', 'mouse_serie', $this->mouse_serie]);

        return $dataProvider;
    }
}
