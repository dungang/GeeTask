<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SprintStoryRelationship]].
 *
 * @see SprintStoryRelationship
 */
class SprintStoryRelationshipQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SprintStoryRelationship[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SprintStoryRelationship|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
