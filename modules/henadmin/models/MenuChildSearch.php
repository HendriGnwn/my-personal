<?php

namespace app\modules\henadmin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MenuChild;

/**
 * MenuChildSearch represents the model behind the search form about `app\models\MenuChild`.
 */
class MenuChildSearch extends MenuChild
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'menu_id', 'order', 'status', 'created_by', 'updated_by'], 'integer'],
            [['name', 'url', 'created_at', 'updated_at'], 'safe'],
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
        $query = MenuChild::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'menu_id' => $this->menu_id,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url]);

        $query->addOrderBy(['created_at'=>SORT_DESC]);

        return $dataProvider;
    }
}