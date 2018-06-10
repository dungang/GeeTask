<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProjectVersion]].
 *
 * @see ProjectVersion
 */
class ProjectVersionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProjectVersion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProjectVersion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
