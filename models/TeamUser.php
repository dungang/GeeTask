<?php

namespace app\models;

/**
 * This is the model class for table "team_user".
 *
 * @property int $team_id 团队
 * @property int $user_id 成员
 */
class TeamUser extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_id', 'user_id'], 'required'],
            [['team_id', 'user_id'], 'integer'],
            [['team_id', 'user_id'], 'unique', 'targetAttribute' => ['team_id', 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'team_id' => '团队',
            'user_id' => '成员',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TeamUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeamUserQuery(get_called_class());
    }
}
