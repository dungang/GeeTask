<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IntegrationRule]].
 *
 * @see IntegrationRule
 */
class IntegrationRuleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IntegrationRule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IntegrationRule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
