<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IntegrationValue]].
 *
 * @see IntegrationValue
 */
class IntegrationValueQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IntegrationValue[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IntegrationValue|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
