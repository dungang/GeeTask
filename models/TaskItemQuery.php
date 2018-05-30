<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TaskItem]].
 *
 * @see TaskItem
 */
class TaskItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TaskItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TaskItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
