<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StatisticalDimension]].
 *
 * @see StatisticalDimension
 */
class StatisticalDimensionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StatisticalDimension[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StatisticalDimension|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
