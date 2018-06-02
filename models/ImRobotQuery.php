<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ImRobot]].
 *
 * @see ImRobot
 */
class ImRobotQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ImRobot[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ImRobot|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
