<?php

namespace app\models;


/**
 * This is the model class for table "bug_case".
 *
 * @property int $bug_id BUG
 * @property int $test_case_id 测试用例
 */
class BugCase extends \app\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bug_case';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bug_id', 'test_case_id'], 'required'],
            [['bug_id', 'test_case_id'], 'integer'],
            [['bug_id', 'test_case_id'], 'unique', 'targetAttribute' => ['bug_id', 'test_case_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bug_id' => 'BUG',
            'test_case_id' => '测试用例',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BugCaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BugCaseQuery(get_called_class());
    }
}
