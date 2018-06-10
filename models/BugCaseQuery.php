<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BugCase]].
 *
 * @see BugCase
 */
class BugCaseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BugCase[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BugCase|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
