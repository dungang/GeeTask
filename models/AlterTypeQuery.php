<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AlterType]].
 *
 * @see AlterType
 */
class AlterTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AlterType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AlterType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
