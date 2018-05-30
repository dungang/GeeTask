<?php
namespace app\models;

/**
 * 系统权限
 * @author dungang
 *
 */
class AuthPermission extends AuthItem
{
    public function init(){
        $this->type = parent::TYPE_PERMISSION;
    }
}

