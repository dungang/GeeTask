<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DbName]].
 *
 * @see DbName
 */
class DbNameQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DbName[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DbName|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
