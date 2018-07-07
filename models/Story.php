<?php
namespace app\models;

class Story extends UserStory
{
    public function init(){
        $this->story_type = self::TYPE_STORY;
    }
}

