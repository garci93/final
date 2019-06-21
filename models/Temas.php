<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temas".
 *
 * @property int $id
 * @property string $titulo
 * @property string $duracion
 * @property string $ruta
 *
 * @property AlbumesTemas[] $albumesTemas
 * @property Albumes[] $albums
 * @property ArtistasTemas[] $artistasTemas
 * @property Artistas[] $artistas
 */
class Temas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'temas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['duracion'], 'string'],
            [['titulo', 'ruta'], 'string', 'max' => 255],
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
            'duracion' => 'Duracion',
            'ruta' => 'Ruta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumesTemas()
    {
        return $this->hasMany(AlbumesTemas::className(), ['tema_id' => 'id'])->inverseOf('tema');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Albumes::className(), ['id' => 'album_id'])->viaTable('albumes_temas', ['tema_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtistasTemas()
    {
        return $this->hasMany(ArtistasTemas::className(), ['tema_id' => 'id'])->inverseOf('tema');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtistas()
    {
        return $this->hasMany(Artistas::className(), ['id' => 'artista_id'])->viaTable('artistas_temas', ['tema_id' => 'id']);
    }
}
