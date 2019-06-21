<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AlbumesSearch represents the model behind the search form of `app\models\Albumes`.
 */
class AlbumesSearch extends Albumes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['titulo'], 'safe'],
            [['anyo'], 'number'],
            [['total'], 'safe'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['total']);
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Albumes::findWithTotal();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['total'] = [
            'asc' => ['total' => SORT_ASC],
            'desc' => ['total' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        return $dataProvider;
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'anyo' => $this->anyo,
        ]);

        $query->andFilterWhere(['ilike', 'titulo', $this->titulo]);

        if ($this->total !== '') {
            $res = mb_split(':', $this->total);

            if (count($res) == 2) {
                [$minutos, $segundos] = $res;
                $minutos = $minutos ?: '0';
                $segundos = $segundos ?: '0';
                if ($minutos > 60) {
                    $horas = (int) ($minutos / 60);
                    $minutos = $minutos % 60;
                    $intervalo = "PT${horas}H${minutos}M${segundos}S";
                } else {
                    $horas = 0;
                    $intervalo = "PT${minutos}M${segundos}S";
                }
                $query->andFilterHaving(['SUM(t.duracion)' => $intervalo]);
            } else {
                $query->where('1 = 0');
            }
        }
        return $dataProvider;
    }
}
