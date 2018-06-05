<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DbChange]].
 *
 * @see DbChange
 */
class DbChangeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DbChange[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DbChange|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
