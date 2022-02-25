<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vaccines".
 *
 * @property int $id
 * @property string $v_name
 * @property string $status
 */
class Vaccines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaccines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['v_name', 'status'], 'required'],
            [['v_name', 'status','dose'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'v_name' => 'Vaccine Name',
            'dose'=>' No of Dose',
            'status' => 'Status',
        ];
    }
}
