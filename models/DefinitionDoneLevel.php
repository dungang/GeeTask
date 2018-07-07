<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_definition_done_level".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class DefinitionDoneLevel extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_definition_done_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
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
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return DefinitionDoneLevelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DefinitionDoneLevelQuery(get_called_class());
    }
}
