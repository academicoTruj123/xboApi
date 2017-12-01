<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tablacodigo]].
 *
 * @see Tablacodigo
 */
class TablacodigoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tablacodigo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tablacodigo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
