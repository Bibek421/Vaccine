<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vaccine_type".
 *
 * @property int $id
 * @property int $fk_child
 * @property int $fk_vlist
 * @property string $date
 * @property int $dose
 */
class VaccineType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaccine_type';
    }

    /**
     * {@inheritdoc}
     */
    const VACCINATED=1;
    const NEXT_VACCINATION=2;
    public function rules()
    {
        return [
            [['fk_child', 'fk_vlist', 'date'], 'required'],
            [['fk_child', 'dose','fk_user','type'], 'integer'],
            [['date'], 'string', 'max' => 255],
            [['fk_vlist'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_child' => 'Name',
            'fk_vlist' => 'Vaccine',
            'date' => 'Date',
            'dose' => 'Dose',
        ];
    }

    public static function getType(){
        return [
            VaccineType::VACCINATED=>'Vaccinated',
            VaccineType::NEXT_VACCINATION=>'Next Vaccination',
        ];
    }
}
