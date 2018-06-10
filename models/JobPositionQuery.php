<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[JobPosition]].
 *
 * @see JobPosition
 */
class JobPositionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return JobPosition[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return JobPosition|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
