<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

class BaseModel extends ActiveRecord
{
    public function behaviors() {
        return [
            TimestampBehavior::className()
        ];
    }
    
    public static function allIdToName($key='id',$val='name'){
        $models = self::find()->all();
        if(is_array($models)) {
            return ArrayHelper::map($models, $key,$val);
        }
        return $models;
    }
}

