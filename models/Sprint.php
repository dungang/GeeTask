<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gt_sprint".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property int $release_id 发布计划
 * @property int $sequence 顺序
 * @property string $title 标题
 * @property string $start_date 开始日期
 * @property string $end_date 结束日期
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 * @property int $is_archived 归档
 * @property int $is_del
 */
class Sprint extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gt_sprint';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'sequence', 'title', 'start_date', 'end_date'], 'required'],
            [['project_id', 'release_id', 'sequence', 'created_at', 'updated_at', 'is_archived', 'is_del'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['title'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => '项目',
            'release_id' => '发布计划',
            'sequence' => '顺序',
            'title' => '摘要',
            'start_date' => '开始日期',
            'end_date' => '结束日期',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'is_archived' => '归档',
            'is_del' => 'Is Del',
        ];
    }
   

    /**
     * {@inheritdoc}
     * @return SprintQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SprintQuery(get_called_class());
    }
    
    /**
     * 获取最大的sequence
     * @param integer $project_id
     * @return number
     */
    public static function getNewSequence($project_id){
        $sequence = self::find()->select('max(sequence) as sequence')->where(['project_id'=>$project_id,'is_del'=>0])->asArray()->one();
        if($sequence) {
            return $sequence['sequence']+1;
        }
        return 1;
    }
}
