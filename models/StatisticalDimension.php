<?php

namespace app\models;


/**
 * This is the model class for table "statistical_dimension".
 *
 * @property int $id
 * @property int $year 年
 * @property int $quarter 季
 * @property int $month 月
 * @property int $week 周
 * @property int $day 日
 */
class StatisticalDimension extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistical_dimension';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'quarter', 'month', 'week', 'day'], 'integer'],
            [['year', 'quarter', 'month', 'week', 'day'], 'unique', 'targetAttribute' => ['year', 'quarter', 'month', 'week', 'day']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => '年',
            'quarter' => '季',
            'month' => '月',
            'week' => '周',
            'day' => '日',
        ];
    }

    /**
     * {@inheritdoc}
     * @return StatisticalDimensionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatisticalDimensionQuery(get_called_class());
    }
}
