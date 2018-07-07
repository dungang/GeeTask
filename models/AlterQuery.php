<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Alter]].
 *
 * @see Alter
 */
class AlterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Alter[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Alter|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
