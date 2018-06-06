<?php

namespace app\models;


/**
 * This is the model class for table "integration_rule".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $method
 * @property string $route 路由
 * @property int $experience_value 经验值
 * @property int $contribution_value 贡献值
 * @property string $intro 介绍
 * @property int $created_at 添加时间
 * @property int $repeat_times 重复次数
 */
class IntegrationRule extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'integration_rule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'method', 'route','experience_value', 'contribution_value'], 'required'],
            [['method', 'intro'], 'string'],
            [['experience_value', 'contribution_value', 'created_at', 'repeat_times'], 'integer'],
            [['name', 'route'], 'string', 'max' => 64],
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
            'method' => 'Method',
            'route' => '路由',
            'experience_value' => '经验值',
            'contribution_value' => '贡献值',
            'intro' => '介绍',
            'created_at' => '添加时间',
            'repeat_times' => '重复次数',
        ];
    }

    /**
     * {@inheritdoc}
     * @return IntegrationRuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IntegrationRuleQuery(get_called_class());
    }
}
