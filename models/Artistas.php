<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artistas".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property ArtistasTemas[] $artistasTemas
 * @property Temas[] $temas
 */
class Artistas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artistas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtistasTemas()
    {
        return $this->hasMany(ArtistasTemas::className(), ['artista_id' => 'id'])->inverseOf('artista');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemas()
    {
        return $this->hasMany(Temas::className(), ['id' => 'tema_id'])->viaTable('artistas_temas', ['artista_id' => 'id']);
    }
}
