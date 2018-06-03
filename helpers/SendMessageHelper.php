<?php
namespace app\helpers;

use app\models\TaskPlan;
use app\models\Team;
use app\models\ImRobot;

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
                    if (count($recievers) > 0) {
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
                if (($users = $team->getChildren()->all()) !== null) {
                    
                    $recievers = [];
                    foreach ($users as $user) {
                        if (! empty($user->mobile))
                            $recievers[] = $user->mobile;
                    }
                    if (!empty($team->im_robot_id)) {
                        $robot = ImRobot::findOne([
                            'id' => $team->im_robot_id
                        ]);
                        if (count($recievers) > 0) {
                            /*@var $robotObj \app\components\Robot */
                            $robotObj = \Yii::createObject([
                                'class'=>$robot->code_full_class,
                                'webhook'=>$robot->webhook,
                            ]);
                            $msg=[];
                            $msg[] = "> **团队**: " . $team->name;
                            $msg[] = "> **计划**: " . $plan->name;
                            $content = implode("\n\n", $msg) . "\n\n" . $content;
                            $robotObj->sendMessage($title, $content, $recievers);
                            
                        }
                    }
                }
            }
        }
    }
}

