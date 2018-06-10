<?php

namespace app\models;


/**
 * This is the model class for table "job_position".
 *
 * @property string $id 代号
 * @property string $name 名称
 * @property string $intro 介绍
 * @property int $sort 排序
 */
class JobPosition extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['sort'], 'integer'],
            [['id'], 'string', 'max' => 64],
            [['name'], 'string', 'max' => 128],
            [['intro'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '代号',
            'name' => '名称',
            'intro' => '介绍',
            'sort' => '排序',
        ];
    }

    /**
     * {@inheritdoc}
     * @return JobPositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JobPositionQuery(get_called_class());
    }
}
