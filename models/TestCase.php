<?php
namespace app\models;

/**
 * 测试用例
 * @author dungang
 *
 */
class TestCase extends Requirement
{
    public function init(){
        $this->source_type = 'case'; //测试用例
    }
}

