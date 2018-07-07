<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use app\behaviors\OperatorBehavior;

class BaseModel extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            OperatorBehavior::className(),
        ];
    }

    public static function allIdToName($key = 'id', $val = 'name',$where=null,$orderBy=null)
    {
        $models = self::find()->select("$key,$val")->where($where)->orderBy($orderBy)->asArray()->all();
        if (is_array($models)) {
            return ArrayHelper::map($models, $key, $val);
        }
        return $models;
    }
    
    /**
     * 获取去除namespace的类名
     * @return mixed
     */
    public static function getClassShortName(){
        return array_pop(explode("\\",get_called_class()));
    }
}

