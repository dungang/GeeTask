<?php

namespace app\models;


/**
 * This is the model class for table "target_statistics".
 *
 * @property int $id
 * @property int $user_id
 * @property int $target_id
 * @property int $dimension_id
 * @property string $scope
 */
class TargetStatistics extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'target_statistics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'target_id', 'dimension_id'], 'required'],
            [['user_id', 'target_id', 'dimension_id', 'scope'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'target_id' => 'Target ID',
            'dimension_id' => 'Dimension ID',
            'scope' => 'Scope',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TargetStatisticsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TargetStatisticsQuery(get_called_class());
    }
}
