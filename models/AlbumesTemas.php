<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albumes_temas".
 *
 * @property int $album_id
 * @property int $tema_id
 *
 * @property Albumes $album
 * @property Temas $tema
 */
class AlbumesTemas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albumes_temas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['album_id', 'tema_id'], 'required'],
            [['album_id', 'tema_id'], 'default', 'value' => null],
            [['album_id', 'tema_id'], 'integer'],
            [['album_id', 'tema_id'], 'unique', 'targetAttribute' => ['album_id', 'tema_id']],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Albumes::className(), 'targetAttribute' => ['album_id' => 'id']],
            [['tema_id'], 'exist', 'skipOnError' => true, 'targetClass' => Temas::className(), 'targetAttribute' => ['tema_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'album_id' => 'Album ID',
            'tema_id' => 'Tema ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Albumes::className(), ['id' => 'album_id'])->inverseOf('albumesTemas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
    {
        return $this->hasOne(Temas::className(), ['id' => 'tema_id'])->inverseOf('albumesTemas');
    }
}
