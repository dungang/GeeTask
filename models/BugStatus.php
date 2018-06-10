<?php
namespace app\models;

/**
 * BUG状态
 *
 * @author dungang
 *        
 */
class BugStatus extends TaskStatus
{

    public function init()
    {
        $this->status_type = 'bug';
    }

    public static function allIdToName($key = 'id', $val = 'name')
    {
        return parent::allIdToName($key, $val, [
            'status_type' => 'bug'
        ], 'sort');
    }
}