<?php
namespace app\models;

class Bug extends UserStory
{
    public function init() {
        $this->story_type = self::TYPE_BUG;
    }
}

