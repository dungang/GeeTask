<?php
namespace app\components;

use yii\helpers\Json;
use yii\db\Query;
use app\models\Idea;
use app\models\User;

class UserStoryWallLongPollHandler implements ILongPollHandler
{

    public function process()
    {
        $params = \Yii::$app->request->queryParams;
        
        if (isset($params['brain_storm_id'])) {
            $ideas = (new Query())->select('i.id,i.content,i.color,i.convert_type,,u.nick_name as author')
                ->from([
                'i' => Idea::tableName(),
                'u' => User::tableName()
            ])
                ->where('i.creator_id=u.id')
                ->andWhere([
                
                'i.brain_storm_id' => $params['brain_storm_id']
            ])
                ->andWhere([
                '>',
                'i.created_at',
                $params['timestamp']
            ])
                ->all();
            if ($ideas) {
                return Json::encode([
                    'timestamp' => time(),
                    'items' => $ideas
                ]);
            }
        }
        
        return false;
    }
}

