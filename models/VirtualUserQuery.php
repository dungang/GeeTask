<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VirtualUser]].
 *
 * @see VirtualUser
 */
class VirtualUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VirtualUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VirtualUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
