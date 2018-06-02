<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KnowledgeCategory]].
 *
 * @see KnowledgeCategory
 */
class KnowledgeCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return KnowledgeCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return KnowledgeCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
