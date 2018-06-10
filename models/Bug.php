<?php
namespace app\models;

class Bug extends Requirement
{
    public function init() {
        $this->source_type = 'bug';
    }
}

