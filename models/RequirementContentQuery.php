<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RequirementContent]].
 *
 * @see RequirementContent
 */
class RequirementContentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RequirementContent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RequirementContent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
