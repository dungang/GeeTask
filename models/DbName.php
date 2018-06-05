<?php

namespace app\models;


/**
 * This is the model class for table "db_name".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property string $name 名称
 * @property string $intro 说明
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class DbName extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'db_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id'], 'required'],
            [['project_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['intro'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => '项目',
            'name' => '名称',
            'intro' => '说明',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return DbNameQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DbNameQuery(get_called_class());
    }
}
