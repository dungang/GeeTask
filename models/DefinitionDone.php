<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_definition_done".
 *
 * @property int $id
 * @property int $definition_done_level_id
 * @property string $principle 准则
 * @property int $created_at
 * @property int $updated_at
 */
class DefinitionDone extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_definition_done';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['definition_done_level_id'], 'required'],
            [['definition_done_level_id', 'created_at', 'updated_at'], 'integer'],
            [['principle'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'definition_done_level_id' => 'Definition Done Level ID',
            'principle' => '准则',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return DefinitionDoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DefinitionDoneQuery(get_called_class());
    }
}
