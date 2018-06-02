<?php

namespace app\models;

/**
 * This is the model class for table "im_robot".
 *
 * @property int $id
 * @property string $name 机器人名称
 * @property string $im_name 即时通讯名称
 * @property string $webhook 通知地址
 * @property string $code_full_class 代码类
 */
class ImRobot extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'im_robot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'im_name'], 'string', 'max' => 64],
            [['webhook'], 'string', 'max' => 255],
            [['code_full_class'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '机器人名称',
            'im_name' => '即时通讯名称',
            'webhook' => '通知地址',
            'code_full_class' => '代码类',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ImRobotQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImRobotQuery(get_called_class());
    }
}
