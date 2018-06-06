<?php

namespace app\models;


/**
 * This is the model class for table "statistical_target".
 *
 * @property int $id
 * @property string $code 目标代号
 * @property string $name 目标名称
 * @property string $intro 介绍
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class StatisticalTarget extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistical_target';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['intro'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['code'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 64],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => '目标代号',
            'name' => '目标名称',
            'intro' => '介绍',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return StatisticalTargetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatisticalTargetQuery(get_called_class());
    }
}
