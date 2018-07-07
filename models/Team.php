<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * This is the model class for table "gt_team".
 *
 * @property int $project_id 项目
 * @property int $user_id 成员
 * @property string $role 角色
 */
class Team extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id'], 'required'],
            [['project_id', 'user_id'], 'integer'],
            [['role'], 'string'],
            [['project_id', 'user_id'], 'unique', 'targetAttribute' => ['project_id', 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_id' => '项目',
            'user_id' => '成员',
            'role' => '角色',
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
    
    public static function allIdToName($key = 'id', $val = 'nick_name')
    {
        $models = (new Query())->from(['u'=>User::tableName()])->leftJoin(['t'=>self::tableName()],'user_id=u.id')->where('user_id=u.id or u.is_admin=1')->all();
        //$models = self::find()->select("$key,$val")->leftJoin(['u'=>User::tableName()],'user_id=u.id or u.is_admin=1')->where($where)->orderBy($orderBy)->asArray()->all();
        if (is_array($models)) {
            return ArrayHelper::map($models, $key, $val);
        }
        return $models;
    }
}
