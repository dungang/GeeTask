<?php

namespace app\models;


use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "task_status".
 *
 * @property string $code 编码
 * @property string $name 名称
 * @property int $sort 排序
 */
class TaskStatus extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['sort'], 'integer'],
            [['code', 'name'], 'string', 'max' => 32],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => '编码',
            'name' => '名称',
            'sort' => '排序',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TaskStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskStatusQuery(get_called_class());
    }
    
    public static function allIdToName($key='code',$val='name'){
        $models = self::find()->orderBy('sort')->all();
        if(is_array($models)) {
            return ArrayHelper::map($models, $key,$val);
        }
        return $models;
    }
}
