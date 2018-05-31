<?php
namespace app\helpers;

use app\models\TaskPlan;
use app\models\Team;

class SendMailerHelper
{
    /**
     * 根据任务计划id发送邮件给团队所有的成员
     * @param int $plan_id
     * @param string $subject
     * @param string $content
     */
    public static function sendMailerToTeamByPlanId($plan_id,$subject,$content) {
        
        if($plan = TaskPlan::findOne(['id'=>$plan_id])){
            if($team = Team::findOne(['id'=>$plan->team_id])){
                if($users = $team->getChildren()->all()){
                    $recievers = [];
                    foreach($users as $user){
                        $recievers[$user->email]=$user->nick_name;
                    };
                    \Yii::$app->mailer->compose()
                        ->setFrom('noreply@ndabooking.com')
                        ->setTo($recievers)
                        ->setSubject($subject)
                        ->setHtmlBody($content)
                        ->send();
                }
            }
        }
        
        
    }
}

