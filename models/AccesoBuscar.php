<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Acceso;

/**
 * AccesoBuscar represents the model behind the search form about `app\models\Acceso`.
 */
class AccesoBuscar extends Acceso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intIdAcceso', 'intIdUsuario'], 'integer'],
            [['vchToken', 'dtiFechaInicio', 'dtiFechaFin'], 'safe'],
            [['bitActivo'], 'boolean'],
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
        $query = Acceso::find();

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
            'intIdAcceso' => $this->intIdAcceso,
            'intIdUsuario' => $this->intIdUsuario,
            'bitActivo' => $this->bitActivo,
            'dtiFechaInicio' => $this->dtiFechaInicio,
            'dtiFechaFin' => $this->dtiFechaFin,
        ]);

        $query->andFilterWhere(['like', 'vchToken', $this->vchToken]);

        return $dataProvider;
    }
}
