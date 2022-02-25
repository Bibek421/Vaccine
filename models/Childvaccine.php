<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "childvaccine".
 *
 * @property int $id
 * @property string $Chid Name
 * @property string $Father Name
 * @property string $Mother Name
 * @property string $Date of Birth
 * @property string $Gender
 * @property string $Citizenship Number
 * @property string $Province
 * @property string $District
 * @property string $Municipality
 * @property string $Ward No
 */
class Childvaccine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'childvaccine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chidname', 'fathername', 'mothername', 'date_of_birth', 'gender', 'citizenship_no', 'province', 'district', 'municipality', 'ward_no'], 'required'],
            [['id', 'ward_no'], 'integer'],
            [['chidname', 'fathername', 'mothername', 'date_of_birth', 'gender', 'citizenship_no', 'province', 'district', 'municipality'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Chid Name' => 'Chid Name',
            'Father Name' => 'Father Name',
            'Mother Name' => 'Mother Name',
            'Date of Birth' => 'Date Of Birth',
            'Gender' => 'Gender',
            'Citizenship Number' => 'Citizenship Number',
            'Province' => 'Province',
            'District' => 'District',
            'Municipality' => 'Municipality',
            'Ward No' => 'Ward No',
        ];
    }
}
