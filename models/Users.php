<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authkey
 * @property string $email
 * @property string $address
 * @property int $contact_no
 * @property string $province
 * @property string $district
 * @property string $municipal
 * @property int $ward_no
 * @property string $user_type
 * @property string $status
 * @property int $created_date
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password','email', 'address', 'contact_no', 'province', 'district', 'municipal', 'ward_no', 'user_type', 'status', 'created_date'], 'required'],
            [['status', 'ward_no'], 'integer'],
            [['username', 'password','contact_no', 'created_date', 'email', 'address', 'province', 'district', 'municipal', 'user_type', 'authkey'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'email' => 'Email',
            'address' => 'Address',
            'contact_no' => 'Contact No',
            'province' => 'Province',
            'district' => 'District',
            'municipal' => 'Municipal',
            'ward_no' => 'Ward No',
            'user_type' => 'User Type',
            'status' => 'Status',
            'created_date' => 'Created Date',
     
       ];
    }


    Public static function findIdentity($id){
        return self::findOne ($id);  
    
    }

    public static function findIdentityByAccessToken($token, $type=null){
        return self::findOne(['accessToken'=>$token]);
    }
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
    public function getId(){
        return $this->id;
    }
    public function getAuthKey(){
        return $this->authkey;
    }
    public function validateAuthKey($authkey){
        return $this->authkey === $authkey;
    }
    public function validatePassword($password){
        if($password==$this->password){
            return true;
        }
    }
}

