<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vaccine".
 *
 * @property int $id
 * @property string $f_name
 * @property string $m_name
 * @property string $dob
 * @property string $birth_certifiicate_no
 * @property string $citizenship_no
 * @property int $province
 * @property int $district
 * @property int $municipal
 * @property int $ward
 * @property string $image
 * @property string $created_date
 * @property int $status
 */


 //Active=>1,Inactive=>0(Status)
class Vaccine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaccine';
    }

    /**
     * {@inheritdoc}
     */
    public $image_child;
    public $fk_vaccine;
    public function rules()
    {
        return [
            [['c_name','c_gender', 'c_weight','fk_vaccine','card_no','f_name', 'm_name', 'dob', 'citizenship_no','p_contact', 'province', 'district', 'municipal', 'ward','status','card_issued_place','card_issued_date'], 'required'],
            [['id',  'ward', 'status','fk_vaccine'], 'integer'],
            [['c_name','c_gender', 'c_weight','card_no','f_name', 'm_name', 'dob','province', 'district', 'municipal', 'birth_certifiicate_no', 'citizenship_no','p_email','p_contact','created_date','card_issued_place','card_issued_date','user_type' ], 'string', 'max' => 255],
            [['image','image_child'],'file','extensions'=>'jpg,png,jpeg,gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'c_name' => 'Child Name',
            'c_gender' => 'Child Gender',
            'dob' => 'Date of Birth',
            'birth_certifiicate_no' => 'Birth Certifiicate No',
            'c_weight'=> 'Child Weight',
            'fk_vaccine' => 'Vaccine Name',
            'card_no' => 'Card Number',
            'f_name' => 'Father Name',
            'm_name' => 'Mother Name', 
            'citizenship_no' => 'Citizenship No Father/Mother',
            'p_email'=> 'Parent Email',
            'p_contact' => 'Parent Contact',
            'province' => 'Province',
            'district' => 'District',
            'municipal' => 'Municipal',
            'ward' => 'Ward',
            'image' => 'Child Photo',
            'created_date' => 'Register Date',
            'status' => 'Status',
            'card_issued_place' => 'Card Issued Place',
            'card_issued_date' => 'Card Issued Date',
            'user_type' => 'User Type',
        ];
    }

}
