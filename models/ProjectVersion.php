<?php

namespace app\models;


/**
 * This is the model class for table "project_version".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property int $is_release 是否是发布版本
 * @property string $name 名称
 * @property int $created_at 添加时间
 */
class ProjectVersion extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_version';
    }
    
    public function init() {
        $this->is_release = 1; //是项目发布的版本
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'name'], 'required'],
            [['project_id', 'is_release', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 32],
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
            'is_release' => '是否是发布版本',
            'name' => '名称',
            'created_at' => '添加时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProjectVersionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectVersionQuery(get_called_class());
    }
    
    /**
     * 获取项目版本
     * @param number $project_id
     * @param number|null $limit
     * @return \app\models\ProjectVersion[]
     */
    public static function findAllProjectVerions($project_id,$limit = null ) {
        return self::findByCondition(['project_id'=>$project_id,'is_release'=>0])->limit($limit)->all();
    }
    /**
     * 获取项目发布版本号
     * @param number $project_id
     * @param number|null $limit
     * @return \app\models\ProjectVersion[]
     */
    public static function findAllReleaseVerions($project_id,$limit=null) {
        return self::findByCondition(['project_id'=>$project_id,'is_release'=>1])->limit($limit)->all();
    }
   
}
