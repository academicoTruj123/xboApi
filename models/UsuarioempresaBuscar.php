<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarioempresa;

/**
 * UsuarioempresaBuscar represents the model behind the search form about `app\models\Usuarioempresa`.
 */
class UsuarioempresaBuscar extends Usuarioempresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intIdUsuempresa', 'intIdUsuario', 'intIdUbigeo', 'intCodigoEstado', 'intIdUsuarioReg', 'intIdUsuarioUltMod'], 'integer'],
            [['vchRazonSocial', 'vchRuc', 'vchContacto', 'vchContactoCorreo', 'vchNombreComercial', 'dtmFechaCreacion', 'vchDomicilioUbigeo', 'vchDomicilioDireccion', 'vchCelular', 'vchTelefonoFijo', 'dtiFechaAlta', 'dtiFechaBaja', 'dtiFechaReg', 'dtiFechaUltMod'], 'safe'],
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
        $query = Usuarioempresa::find();

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
            'intIdUsuempresa' => $this->intIdUsuempresa,
            'intIdUsuario' => $this->intIdUsuario,
            'dtmFechaCreacion' => $this->dtmFechaCreacion,
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

        $query->andFilterWhere(['like', 'vchRazonSocial', $this->vchRazonSocial])
            ->andFilterWhere(['like', 'vchRuc', $this->vchRuc])
            ->andFilterWhere(['like', 'vchContacto', $this->vchContacto])
            ->andFilterWhere(['like', 'vchContactoCorreo', $this->vchContactoCorreo])
            ->andFilterWhere(['like', 'vchNombreComercial', $this->vchNombreComercial])
            ->andFilterWhere(['like', 'vchDomicilioUbigeo', $this->vchDomicilioUbigeo])
            ->andFilterWhere(['like', 'vchDomicilioDireccion', $this->vchDomicilioDireccion])
            ->andFilterWhere(['like', 'vchCelular', $this->vchCelular])
            ->andFilterWhere(['like', 'vchTelefonoFijo', $this->vchTelefonoFijo]);

        return $dataProvider;
    }
}
