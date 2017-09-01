<?php

namespace app\modules\soporte\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\soporte\models\InvEquipos;
use  yii\web\Session;
/**
 * InvEquiposSearch represents the model behind the search form about `app\modules\soporte\models\InvEquipos`.
 */
class InvEquiposSearch extends InvEquipos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'progresivo', 'id_tipo', 'marca', 'modelo', 'estado', 'id_plantel', 'id_area', 'id_piso', 'clasif', 'created_by', 'updated_by'], 'integer'],
            [['serie', 'procesador', 'ram', 'disco_duro', 'observaciones', 'created_at', 'updated_at'], 'safe'],
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
        $query = InvEquipos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                  'pageSize' => 20,
             ],
             'sort' => [
                 'defaultOrder' => [
               'progresivo' => SORT_ASC,
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
            'progresivo' => $this->progresivo,
            'id_tipo' => $this->id_tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado' => $this->estado,
            'id_plantel' => $id_p,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'clasif' => $this->clasif,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'procesador', $this->procesador])
            ->andFilterWhere(['like', 'ram', $this->ram])
            ->andFilterWhere(['like', 'disco_duro', $this->disco_duro])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

   // unset($_SESSION['exportData']);
    //$_SESSION['exportData'] = $dataProvider;
   // Yii::$app->session->set('exportData',$dataProvider);
    //unset(Yii::$app()->session['exportData']);
   //Yii::$app()->session['exportData'] = $dataProvider;
  

        return $dataProvider;
    }

     public function search2($params)
    {
        $query = InvEquipos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
                  'pageSize' => 1000,
             ],
             'sort' => [
         'defaultOrder' => [
               'progresivo' => SORT_ASC,
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

      //  $id_p = Yii::$app->user->identity->id_plantel;
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'progresivo' => $this->progresivo,
            'id_tipo' => $this->id_tipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado' => $this->estado,
            'id_plantel' => $this->id_plantel,
            'id_area' => $this->id_area,
            'id_piso' => $this->id_piso,
            'clasif' => $this->clasif,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'procesador', $this->procesador])
            ->andFilterWhere(['like', 'ram', $this->ram])
            ->andFilterWhere(['like', 'disco_duro', $this->disco_duro])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

   // unset($_SESSION['exportData']);
    //$_SESSION['exportData'] = $dataProvider;
   // Yii::$app->session->set('exportData',$dataProvider);
    //unset(Yii::$app()->session['exportData']);
   //Yii::$app()->session['exportData'] = $dataProvider;
   $session = Yii::$app->session;
    $session->set('exportData', $dataProvider);



        return $dataProvider;
    }





  
    public static function getExportData() 
    {
        $session = Yii::$app->session;
        $data = [
            'data'=>$session->get('exportData'),
            'fileName'=>'Equipos--List', 
            'title'=>'Listado de Equipos',
            'exportFile'=>'@app/modules/soporte/views/inv-equipos/InvEquiposExportPdfExcel',
        ];
        //print_r($data);exit;

    return $data;
    }
}
