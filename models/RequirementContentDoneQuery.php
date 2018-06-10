<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RequirementContentDone]].
 *
 * @see RequirementContentDone
 */
class RequirementContentDoneQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RequirementContentDone[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RequirementContentDone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
