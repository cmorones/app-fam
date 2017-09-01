<?php

namespace app\modules\telefonia\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\telefonia\models\InvTelefonia;
use app\modules\soporte\models\EstadoEquipo;

/**
 * TelefoniaSearch represents the model behind the search form about `app\modules\telefonia\models\InvTelefonia`.
 */
class TelefoniaSearch extends InvTelefonia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'progresivo', 'marca', 'modelo', 'num_ext', 'id_usuario', 'estado', 'id_plantel', 'id_area', 'id_piso'], 'integer'],
            [['responsable', 'nodo'], 'string'],
            [['serie'], 'safe'],
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
        $query = InvTelefonia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                  'pageSize' => 1000,
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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'progresivo' => $this->progresivo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'num_ext' => $this->num_ext,
            'id_usuario' => $this->id_usuario,
            'estado' => $this->estado,
            'id_plantel' => $this->id_plantel,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'responsable' => $this->responsable,
            'nodo' => $this->nodo,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie]);
         
        return $dataProvider;
    }

    public function search2($params)
    {
        $query = InvTelefonia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                  'pageSize' => 1000,
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


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'progresivo' => $this->progresivo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'num_ext' => $this->num_ext,
            'id_usuario' => $this->id_usuario,
            'estado' => $this->estado,
            'id_plantel' => $this->id_plantel,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'responsable' => $this->responsable,
            'nodo' => $this->nodo,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie]);

   $session = Yii::$app->session;
    $session->set('exportData', $dataProvider);

        return $dataProvider;
    }

    public function search3($params)
    {
        $query = InvTelefonia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                  'pageSize' => 1000,
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

        $id_plantel = Yii::$app->user->identity->id_plantel;
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'progresivo' => $this->progresivo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'num_ext' => $this->num_ext,
            'id_usuario' => $this->id_usuario,
            'estado' => $this->estado,
            'id_plantel' => $id_plantel,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'responsable' => $this->responsable,
            'nodo' => $this->nodo,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie]);

   $session = Yii::$app->session;
    $session->set('exportData', $dataProvider);

        return $dataProvider;
    }

        public static function getExportData() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Telefonos--List', 
            'title'=>'Listado de Desechos',
            'exportFile'=>'@app/modules/telefonia/views/telefonia/InvTelefoniaExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }

    public static function getExportData4() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Telefonos--List', 
            'title'=>'Listado de Telefonos',
            'exportFile'=>'@app/modules/telefonia/views/telefonia/InvTelefoniaInternosExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }

    public static function getExportData3() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Telefonos--List', 
            'title'=>'Listado de Telefonos',
            'exportFile'=>'@app/modules/telefonia/views/telefonia/InvTelefonExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }
}
