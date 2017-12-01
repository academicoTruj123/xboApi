<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\usuariocliente;

/**
 * usuarioclienteBuscar represents the model behind the search form about `app\models\usuariocliente`.
 */
class usuarioclienteBuscar extends usuariocliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intIdUsucliente', 'intIdUsuario', 'intCodigoSexo', 'intIdUbigeo', 'intCodigoEstado', 'intIdUsuarioReg', 'intIdUsuarioUltMod'], 'integer'],
            [['vchNombres', 'vchApellidoPaterno', 'vchApellidoMaterno', 'dtmFechaNacimiento', 'vchDomicilioUbigeo', 'vchDomicilioDireccion', 'vchDomicilioReferencia', 'vchCelular', 'vchTelefonoFijo', 'dtiFechaAlta', 'dtiFechaBaja', 'dtiFechaReg', 'dtiFechaUltMod'], 'safe'],
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
        $query = usuariocliente::find();

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
            'intIdUsucliente' => $this->intIdUsucliente,
            'intIdUsuario' => $this->intIdUsuario,
            'intCodigoSexo' => $this->intCodigoSexo,
            'dtmFechaNacimiento' => $this->dtmFechaNacimiento,
            'intIdUbigeo' => $this->intIdUbigeo,
            'dtiFechaAlta' => $this->dtiFechaAlta,
            'dtiFechaBaja' => $this->dtiFechaBaja,
            'intCodigoEstado' => $this->intCodigoEstado,
            'bitActivo' => $this->bitActivo,
            'intIdUsuarioReg' => $this->intIdUsuarioReg,
            'dtiFechaReg' => $this->dtiFechaReg,
            'intIdUsuarioUltMod' => $this->intIdUsuarioUltMod,
            'dtiFechaUltMod' => $this->dtiFechaUltMod,
        ]);

        $query->andFilterWhere(['like', 'vchNombres', $this->vchNombres])
            ->andFilterWhere(['like', 'vchApellidoPaterno', $this->vchApellidoPaterno])
            ->andFilterWhere(['like', 'vchApellidoMaterno', $this->vchApellidoMaterno])
            ->andFilterWhere(['like', 'vchDomicilioUbigeo', $this->vchDomicilioUbigeo])
            ->andFilterWhere(['like', 'vchDomicilioDireccion', $this->vchDomicilioDireccion])
            ->andFilterWhere(['like', 'vchDomicilioReferencia', $this->vchDomicilioReferencia])
            ->andFilterWhere(['like', 'vchCelular', $this->vchCelular])
            ->andFilterWhere(['like', 'vchTelefonoFijo', $this->vchTelefonoFijo]);

        return $dataProvider;
    }
}
