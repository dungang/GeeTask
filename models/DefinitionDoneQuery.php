<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DefinitionDone]].
 *
 * @see DefinitionDone
 */
class DefinitionDoneQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DefinitionDone[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DefinitionDone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
