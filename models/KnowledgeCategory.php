<?php

namespace app\models;


/**
 * This is the model class for table "knowledge_category".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $sort 排序
 */
class KnowledgeCategory extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'knowledge_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'sort' => '排序',
        ];
    }

    /**
     * {@inheritdoc}
     * @return KnowledgeCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KnowledgeCategoryQuery(get_called_class());
    }
}
