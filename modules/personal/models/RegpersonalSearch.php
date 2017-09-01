<?php

namespace app\modules\personal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\personal\models\Regpersonal;

/**
 * RegpersonalSearch represents the model behind the search form about `app\modules\personal\models\Regpersonal`.
 */
class RegpersonalSearch extends Regpersonal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'partida', 'subprograma', 'id_periodo', 'estado', 'created_by', 'updated_by'], 'integer'],
            [['contrato', 'proveedor', 'fecha_reg', 'created_at', 'updated_at'], 'safe'],
            [['importe'], 'number'],
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
    public function search($params,$id,$idp,$partida)
    {
        $query = Regpersonal::find()->where(['id_periodo'=>$id])->andWhere(['subprograma'=>$idp])->andWhere(['partida'=>$partida]);

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
            'partida' => $this->partida,
            'subprograma' => $this->subprograma,
            'importe' => $this->importe,
            'id_periodo' => $this->id_periodo,
            'fecha_reg' => $this->fecha_reg,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere([
            'like', 'contrato', $this->contrato,
            'like', 'proveedor', $this->proveedor,
            ]);


        return $dataProvider;
    }
}
