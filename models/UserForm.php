<?php
namespace app\models;

use yii\base\Model;

/**
 * 添加修改用户的表单
 * @author dungang
 *
 */
class UserForm extends Model
{
    public $id;
    
    public $username;
    
    public $nick_name;
    
    public $password;
    
    public $email;
    
    public $status;
    
    public function rules()
    {
        return [
            [['username', 'password','email'], 'required'],
            [
                'status',
                'default',
                'value' => User::STATUS_ACTIVE
            ],
            [
                'status',
                'in',
                'range' => [
                    User::STATUS_ACTIVE,
                    User::STATUS_DELETED
                ]
            ]
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'nick_name' => '姓名',
            'status' => '状态',
            'email' => '邮箱',
            'password'=>'密碼',
        ];
    }
    
    /**
     * 加载用户模型的数据
     * @param User $model
     */
    public function loadUser($model) {
        $this->id = $model->id;
        $this->username = $model->username;
        $this->email = $model->email;
        $this->status = $model->status;
    }
    
    /**
     * 保存
     * @return boolean
     */
    public function save() {
        $user = new User();
        $user->id = $this->id;
        $user->username = $this->username;
        $user->nick_name = $this->nick_name;
        $user->generateAuthKey();
        $user->setPassword($this->password);
        $user->status = User::STATUS_ACTIVE;
        $user->email = $this->email;
        if( $user->save() ) {
            $this->id = $user->id;
            return true;
        } else {
            return false;
        }
    }
}

