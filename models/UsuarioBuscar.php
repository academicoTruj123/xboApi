<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioBuscar represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioBuscar extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intIdUsuario', 'intCodigoEstado', 'intTipoLogin', 'intCodigoRol'], 'integer'],
            [['vchCorreo', 'vchClave', 'vchAuthKey', 'vchCodVerificacion', 'dtiFechaAlta', 'dtiFechaBaja', 'dtiFechaReg', 'dtiFechaUltMod'], 'safe'],
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
        $query = Usuario::find();

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
            'intIdUsuario' => $this->intIdUsuario,
            'intCodigoEstado' => $this->intCodigoEstado,
            'dtiFechaAlta' => $this->dtiFechaAlta,
            'dtiFechaBaja' => $this->dtiFechaBaja,
            'bitActivo' => $this->bitActivo,
            'dtiFechaReg' => $this->dtiFechaReg,
            'dtiFechaUltMod' => $this->dtiFechaUltMod,
            'intTipoLogin' => $this->intTipoLogin,
            'intCodigoRol' => $this->intCodigoRol,
        ]);

        $query->andFilterWhere(['like', 'vchCorreo', $this->vchCorreo])
            ->andFilterWhere(['like', 'vchClave', $this->vchClave])
            ->andFilterWhere(['like', 'vchAuthKey', $this->vchAuthKey])
            ->andFilterWhere(['like', 'vchCodVerificacion', $this->vchCodVerificacion]);

        return $dataProvider;
    }
}
