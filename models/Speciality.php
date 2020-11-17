<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speciality".
 *
 * @property int $id
 * @property string $speciality
 */
class Speciality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'speciality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['speciality'], 'required'],
            [['speciality'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'speciality' => 'Speciality',
        ];
    }
}
