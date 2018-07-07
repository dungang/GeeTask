<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserStoryFollow]].
 *
 * @see UserStoryFollow
 */
class UserStoryFollowQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserStoryFollow[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserStoryFollow|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
