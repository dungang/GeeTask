<?php

namespace app\models;


/**
 * This is the model class for table "project_version".
 *
 * @property int $id
 * @property int $project_id 项目
 * @property string $name 名称
 */
class RequirementVersion extends ProjectVersion
{

    public function init(){
        $this->is_release = 0; //是项目版本类型的版本号
    }
}
