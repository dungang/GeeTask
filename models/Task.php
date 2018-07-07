<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_task".
 *
 * @property int $id
 * @property int $user_story_id 用户故事
 * @property int $claimant_id 认领人
 * @property double $hours 工时
 * @property string $start_time 开始时间
 * @property string $end_time 结束时间
 * @property string $title 标题
 * @property string $remark 备注
 * @property string $status 状态
 * @property int $creator_id 创建者
 * @property int $updator_id 更新者
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class Task extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_story_id'], 'required'],
            [['user_story_id', 'claimant_id', 'creator_id', 'updator_id', 'created_at', 'updated_at'], 'integer'],
            [['hours'], 'number'],
            [['start_time', 'end_time'], 'safe'],
            [['remark', 'status'], 'string'],
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
            'user_story_id' => '用户故事',
            'claimant_id' => '认领人',
            'hours' => '工时',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'title' => '标题',
            'remark' => '备注',
            'status' => '状态',
            'creator_id' => '创建者',
            'updator_id' => '更新者',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskQuery(get_called_class());
    }
}
