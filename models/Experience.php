<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property int $id
 * @property int $resumeId
 * @property int $mStart месяц начала работы
 * @property int $yStart год начала работы
 * @property int|null $mEnd месяц окончания работы
 * @property int|null $yEnd год окончания работы
 * @property int $now По настоящее время
 * @property string $organization Организация
 * @property string $position Должность
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resumeId', 'mStart', 'yStart', 'organization', 'position'], 'required'],
            [['resumeId', 'mStart', 'yStart', 'mEnd', 'yEnd', 'now'], 'integer'],
            [['organization', 'position'], 'string'],
            [['yStart', 'yEnd'],'number','min'=>1990, 'max'=>date('Y')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resumeId' => 'Resume ID',
            'mStart' => 'месяц начала работы',
            'yStart' => 'год начала работы',
            'mEnd' => 'месяц окончания работы',
            'yEnd' => 'год окончания работы',
            'now' => 'По настоящее время',
            'organization' => 'Организация',
            'position' => 'Должность',
        ];
    }
}
