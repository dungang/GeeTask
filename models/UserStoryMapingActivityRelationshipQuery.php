<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserStoryMapingActivityRelationship]].
 *
 * @see UserStoryMapingActivityRelationship
 */
class UserStoryMapingActivityRelationshipQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserStoryMapingActivityRelationship[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserStoryMapingActivityRelationship|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
