<?php

namespace app\models;


/**
 * This is the model class for table "knowledge".
 *
 * @property int $id
 * @property int $category_id  分类
 * @property int $user_id 作者
 * @property string $title 标题
 * @property string $tags 标签
 * @property string $content 内容
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class Knowledge extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'knowledge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['tags', 'content'], 'string'],
            [['title'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => '分类',
            'user_id' => '作者',
            'title' => '标题',
            'tags' => '标签',
            'content' => '内容',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return KnowledgeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KnowledgeQuery(get_called_class());
    }
}
