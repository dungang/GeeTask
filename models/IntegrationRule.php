<?php

namespace app\models;


/**
 * This is the model class for table "integration_rule".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $method
 * @property string $route 路由
 * @property string $intro 介绍
 * @property int $created_at 添加时间
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
            [['name', 'method', 'route'], 'required'],
            [['method', 'intro'], 'string'],
            [[ 'created_at'], 'integer'],
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
            'intro' => '介绍',
            'created_at' => '添加时间',
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
