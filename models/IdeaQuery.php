<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Idea]].
 *
 * @see Idea
 */
class IdeaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Idea[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Idea|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
