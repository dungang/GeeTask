<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TaskPlan]].
 *
 * @see TaskPlan
 */
class TaskPlanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TaskPlan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TaskPlan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
