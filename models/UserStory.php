<?php

namespace app\models;


/**
 * This is the model class for table "gt_user_story".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property int $virtual_user_id 虚拟用户
 * @property string $story 故事
 * @property string $biz_value 为实现
 * @property string $remark 备注
 * @property int $points 故事点数
 * @property int $priority 优先级
 * @property string $category 分类
 * @property string $status 状态
 * @property string $story_type 类型
 * @property string $play 演示
 * @property int $feature_id 功能
 * @property int $release_id 发布计划
 * @property int $sprint_id 迭代
 * @property int $creator_id 创建者
 * @property int $updator_id 更新者
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 * @property int $in_mapping 在用户地图
 * @property int $is_del
 */
class UserStory extends \app\models\BaseModel
{
    const TYPE_STORY = 'Story';
    const TYPE_BUG = 'Bug';
    const TYPE_SPIKE = 'Spike';
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_user_story';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'virtual_user_id', 'story'], 'required'],
            [['project_id', 'virtual_user_id', 'points', 'priority', 'feature_id', 'release_id', 'sprint_id', 'creator_id', 'updator_id', 'created_at', 'updated_at', 'in_mapping', 'is_del'], 'integer'],
            [['category', 'status', 'story_type', 'play'], 'string'],
            [['story', 'remark'], 'string', 'max' => 255],
            [['biz_value'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => '项目',
            'virtual_user_id' => '作为用户',
            'story' => '我需要',
            'biz_value' => '为实现',
            'remark' => '备注',
            'points' => '故事点数',
            'priority' => '优先级',
            'category' => '分类',
            'status' => '状态',
            'story_type' => '类型',
            'play' => '演示',
            'feature_id' => '功能',
            'release_id' => '发布计划',
            'sprint_id' => '迭代',
            'creator_id' => '创建者',
            'updator_id' => '更新者',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'in_mapping' => '在用户地图',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserStoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserStoryQuery(get_called_class());
    }
    
    public static function findAllBySprint($sprint_id){
        return self::find()->where(['sprint_id'=>$sprint_id,'is_del'=>0])->indexBy('id')->all();
    }
}
