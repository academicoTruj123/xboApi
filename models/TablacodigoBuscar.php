<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tablacodigo;

/**
 * TablacodigoBuscar represents the model behind the search form about `app\models\Tablacodigo`.
 */
class TablacodigoBuscar extends Tablacodigo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intIdTablaCodigo', 'intIdUsuarioReg', 'intIdUsuarioUltMod'], 'integer'],
            [['vchCodigo', 'vchTexto', 'vchDescripcion', 'dtiFechaReg', 'dtiFechaUltMod'], 'safe'],
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
        $query = Tablacodigo::find();

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
            'intIdTablaCodigo' => $this->intIdTablaCodigo,
            'bitActivo' => $this->bitActivo,
            'intIdUsuarioReg' => $this->intIdUsuarioReg,
            'dtiFechaReg' => $this->dtiFechaReg,
            'intIdUsuarioUltMod' => $this->intIdUsuarioUltMod,
            'dtiFechaUltMod' => $this->dtiFechaUltMod,
        ]);

        $query->andFilterWhere(['like', 'vchCodigo', $this->vchCodigo])
            ->andFilterWhere(['like', 'vchTexto', $this->vchTexto])
            ->andFilterWhere(['like', 'vchDescripcion', $this->vchDescripcion]);

        return $dataProvider;
    }
}
