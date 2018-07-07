<?php
namespace app\models;

/**
 * 探针
 * @author dungang
 *
 */
class Spike extends UserStory
{
    public function init(){
        $this->story_type = self::TYPE_SPIKE;
    }
}

