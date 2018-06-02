<?php
namespace app\helpers;

use app\models\TaskPlan;
use app\models\Team;
use app\components\DingTalkRobot;

class SendMessageHelper
{

    /**
     * 根据任务计划id发送邮件给团队所有的成员
     *
     * @param int $plan_id
     * @param string $subject
     * @param string $content
     */
    public static function sendMailerToTeamByPlanId($plan_id, $subject, $content)
    {
        if ($plan = TaskPlan::findOne([
            'id' => $plan_id
        ])) {
            if ($team = Team::findOne([
                'id' => $plan->team_id
            ])) {
                if ($users = $team->getChildren()->all()) {
                    $recievers = [];
                    foreach ($users as $user) {
                        $recievers[$user->email] = $user->nick_name;
                    }
                    if(count($recievers)>0) {
                        \Yii::$app->mailer->compose()
                        ->setFrom([
                            '项目进度表扬通知' => 'noreply@ndabooking.com'
                        ])
                        ->setTo($recievers)
                        ->setSubject($subject)
                        ->setHtmlBody($content)
                        ->send();
                    }
                }
            }
        }
    }
    
    /**
     * 根据任务计划id发送邮件给团队所有的成员
     *
     * @param int $plan_id
     * @param string $content
     */
    public static function sendDingMsgToTeamByPlanId($plan_id, $title, $content)
    {
        if ($plan = TaskPlan::findOne([
            'id' => $plan_id
        ])) {
            if ($team = Team::findOne([
                'id' => $plan->team_id
            ])) {
                if ($team->dingtalk_webhook && $users = $team->getChildren()->all()) {
                    $recievers = [];
                    foreach ($users as $user) {
                        if(!empty($user->mobile))$recievers[] = $user->mobile;
                    }
                    if(count($recievers)>0) {
                        new DingTalkRobot([
                            'webook'=>$team->dingtalk_webhook,
                            'msg_type'=>'markdown',
                            'title'=>$title,
                            'msg'=>$content,
                            'atMobiles'=>$recievers,
                        ]);
                    }
                }
            }
        }
    }
}

