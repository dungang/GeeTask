<?php

namespace app\models;


/**
 * This is the model class for table "integration".
 *
 * @property int $id
 * @property int $reciever_id 接受用户
 * @property int $creator_id 创建用户
 * @property int $rule_id 规则
 * @property string $target 目标对象
 * @property int $target_id 目标对象id
 * @property int $expirence_scope 分值
 * @property int $contribution_scope
 * @property string $route 路由
 * @property string $name 名称
 * @property string $remark 备注
 * @property int $repeat_times 可用次数
 * @property int $rest_times  剩下次数
 * @property int $created_at
 */
class Integration extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'integration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reciever_id', 'creator_id', 'rule_id', 'route', 'name', 'target', 'target_id'], 'required'],
            [['reciever_id', 'creator_id', 'rule_id', 'expirence_scope', 'contribution_scope', 'target_id', 'created_at'], 'integer'],
            [['route', 'name'], 'string', 'max' => 64],
            [['target'], 'string', 'max' => 32],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reciever_id' => '接受用户',
            'creator_id' => '创建用户',
            'rule_id' => '规则',
            'expirence_scope' => '经验值',
            'contribution_scope' => '贡献值',
            'route' => '路由',
            'name' => '名称',
            'target' => '目标对象',
            'target_id' => '目标对象id',
            'repeat_times' => '可重复次数',
            'rest_times' => '剩余次数',
            'remark' => '备注',
            'created_at' => '添加时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return IntegrationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IntegrationQuery(get_called_class());
    }
    
    /**
     * 添加积分
     * @param number $reciever_id 接受积分的用户id
     * @param string $target 目标对象
     * @param int $target_id 对象Id
     * @param string $remark 备注信息
     */
    public static function addScope($reciever_id,$target,$target_id,$remark='') {
        $creator_id = \Yii::$app->user->id;
        $route = '/'.\Yii::$app->requestedRoute;
        $rule = IntegrationRule::findOne(['route'=>$route]);
        if($rule !== null ) {
            //是否可以添加积分
            $integration = Integration::find()->where([
                'reciever_id'=>$reciever_id,
                'creator_id'=>$creator_id,
                'rule_id'=>$rule->id,
                'target'=>$target,
                'target_id'=>$target_id,
            ])->orderBy('created_at desc')->one();
            
            //如果可以添加积分，使用最新的规则的积分数据
            $attributes=[
                'reciever_id'=>$reciever_id,
                'creator_id'=>$creator_id,
                'rule_id'=>$rule->id,
                'target'=>$target,
                'target_id'=>$target_id,
                'expirence_scope'=>$rule->experience_value,
                'contribution_scope'=>$rule->contribution_value,
                'route'=>$route,
                'name'=>$rule->name,
                'repeat_times'=>$rule->repeat_times,
                'remark'=>$remark,
            ];
            
            if($integration == null) {
                $attributes['rest_times'] = $rule->repeat_times - 1;
            } else if ($integration->rest_times>0) {
                $attributes['rest_times'] -=1;
            }
            
            if(isset($attributes['rest_times'])) {
                //添加积分记录
                $newIntegration = new Integration($attributes);
                $newIntegration->save(false);
                
                //更新积分总额
                \Yii::$app->db->createCommand(
                    "UPDATE `user` SET
                        expirence_scope = expirence_scope + :expirence_scope ,
                        contribution_scope = contribution_scope + :contribution_scope
                    WHERE id=:id",[
                        ':expirence_scope'=>$rule->experience_value,
                        ':contribution_scope'=>$rule->contribution_value,
                        ':id'=>$reciever_id,
                    ])->execute();
                
            }
        }
        
    }
}
