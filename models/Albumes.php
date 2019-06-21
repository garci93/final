<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albumes".
 *
 * @property int $id
 * @property string $titulo
 * @property string $anyo
 *
 * @property AlbumesTemas[] $albumesTemas
 * @property Temas[] $temas
 */
class Albumes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albumes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'anyo'], 'required'],
            [['anyo'], 'number'],
            [['titulo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'anyo' => 'Anyo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumesTemas()
    {
        return $this->hasMany(AlbumesTemas::className(), ['album_id' => 'id'])->inverseOf('album');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemas()
    {
        return $this->hasMany(Temas::className(), ['id' => 'tema_id'])->viaTable('albumes_temas', ['album_id' => 'id']);
    }
}
