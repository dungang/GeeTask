<?php

namespace app\models;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $project_id 项目 
 * @property int $im_robot_id IM机器人
 * @property int $created_at
 */
class Team extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['project_id', 'im_robot_id', 'created_at'], 'integer'],
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
            'project_id' => '项目',
            'im_robot_id' => 'IM机器人',
            'created_at' => '添加日期',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TeamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeamQuery(get_called_class());
    }
    
    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(User::className(), [
            'id' => 'user_id'
        ])->viaTable(TeamUser::tableName(), [
            'team_id' => 'id'
        ]);
    }
    
    
    
}
