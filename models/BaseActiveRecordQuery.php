<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveQuery;

/**
 * Description of BaseActiveRecordQuery
 *
 * @author Carbon
 */
class BaseActiveRecordQuery extends ActiveQuery {
	
    public function active()
    {
        $this->andWhere(['status'=>  BaseActiveRecord::STATUS_ACTIVE]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	
	public function ordered() {
		$this->addOrderBy(['order'=>SORT_ASC]);
		
		return $this;
	}
}
