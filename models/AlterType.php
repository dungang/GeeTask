<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_alter_type".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $is_del
 */
class AlterType extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_alter_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_del'], 'integer'],
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
            'is_del' => 'Is Del',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AlterTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlterTypeQuery(get_called_class());
    }
}
