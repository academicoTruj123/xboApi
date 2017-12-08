<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tablaprueba".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 */
class Tablaprueba extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tablaprueba';
        // este que no vale
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }
}
