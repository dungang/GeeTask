<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property int $team_id 团队
 * @property int $im_robot_id 消息机器人
 * @property string $name 名称
 * @property string $intro 介绍
 * @property int $created_at 添加时间
 * @property string $updated_at 更新时间
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_id', 'im_robot_id'], 'required'],
            [['team_id', 'im_robot_id', 'created_at'], 'integer'],
            [['intro'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['updated_at'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_id' => '团队',
            'im_robot_id' => '消息机器人',
            'name' => '名称',
            'intro' => '介绍',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }
}
