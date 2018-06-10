<?php
namespace app\models;



/**
 * This is the model class for table "integration_value".
 *
 * @property int $id
 * @property int $rule_id 规则
 * @property string $job_position 岗位
 * @property int $experience_value 经验值
 * @property int $contribution_value 贡献值
 * @property int $repeat_times 可重复次数
 */
class IntegrationValue extends \app\models\BaseModel
{

    /**
     *
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'integration_value';
    }

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'rule_id',
                    'job_position'
                ],
                'required'
            ],
            [
                [
                    'rule_id',
                    'experience_value',
                    'contribution_value',
                    'repeat_times'
                ],
                'integer'
            ],
            [
                [
                    'job_position'
                ],
                'string',
                'max' => 64
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rule_id' => '规则',
            'job_position' => '岗位',
            'experience_value' => '经验值',
            'contribution_value' => '贡献值',
            'repeat_times' => '可重复次数'
        ];
    }

    /**
     *
     * {@inheritdoc}
     * @return IntegrationValueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IntegrationValueQuery(get_called_class());
    }

    /**
     * 
     * @param number $rule_id
     * @return \app\models\IntegrationValue[]|array
     */
    public static function findAllByRule($rule_id=null)
    {
        return self::find()->select("v.*,p.id as job_position")
            ->from([
            'p' => JobPosition::tableName()
        ])
            ->leftJoin([
            'v' => self::tableName()
            ], ['and','p.id = v.job_position','v.rule_id'=>$rule_id])
            ->indexBy(function($model)use($rule_id){
                $model['rule_id'] = $rule_id;
                
                return $model['job_position'];
            })
            ->all();
    }
}
