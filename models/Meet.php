<?php

namespace app\models;


/**
 * This is the model class for table "meet".
 *
 * @property int $id
 * @property string $title 议题
 * @property string $actors 参会人
 * @property string $content 会议结论
 * @property int $user_id 记录人
 * @property string $meet_date 日期 
 * @property int $created_at 添加时间
 * @property int $updated_at 更新时间
 */
class Meet extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'actors', 'content', 'meet_date',], 'required'],
            [['actors', 'content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '议题',
            'actors' => '参会人',
            'content' => '会议结论',
            'user_id' => '记录人',
            'meet_date'=>'日期',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MeetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MeetQuery(get_called_class());
    }
}
