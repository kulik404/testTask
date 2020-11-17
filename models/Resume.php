<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property string $foto Фото
 * @property string $last_name Фамилия
 * @property string $first_name Имя
 * @property string $middle_name Отчество
 * @property int $sex Пол
 * @property int $townId Город
 * @property string $email Электронная почта
 * @property int $phone Телефон
 * @property int $specialityId Специализация
 * @property int $salary Зарплата
 * @property int $fEmp Полная занятость
 * @property int $pEmp Частичная занятость
 * @property int $tEmp Проектная/Временная работа
 * @property int $vEmp Волонтёрство
 * @property int $iEmp Стажировка
 * @property int $fSchedule Полный день
 * @property int $sSchedule Сменный график
 * @property int $flexSchedule Гибкий график
 * @property int $remSchedule Удалённая работа
 * @property int $rSchedule Вахтовый метод
 * @property int $exp Опыт работы
 * @property string $about О себе
 */
class resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['foto', 'last_name', 'first_name', 'middle_name', 'bdate', 'sex', 'townId', 'email', 'phone', 'specialityId', 'salary', 'about'], 'required'],
           //['bdate', 'date', 'format' => 'php:Y-m-d'],
            [['sex', 'townId', 'phone', 'specialityId', 'salary', 'fEmp', 'pEmp', 'tEmp', 'vEmp', 'iEmp', 'fSchedule', 'sSchedule', 'flexSchedule', 'remSchedule', 'rSchedule', 'exp'], 'integer'],
            [['about'], 'string'],
            [['foto', 'last_name', 'first_name', 'middle_name'], 'string', 'max' => 255],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'foto' => 'Фото',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'bdate' => 'Дата рождения',
            'sex' => 'Пол',
            'townId' => 'Город',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'specialityId' => 'Специализация',
            'salary' => 'Зарплата',
            'fEmp' => 'Полная занятость',
            'pEmp' => 'Частичная занятость',
            'tEmp' => 'Проектная/Временная работа',
            'vEmp' => 'Волонтёрство',
            'iEmp' => 'Стажировка',
            'fSchedule' => 'Полный день',
            'sSchedule' => 'Сменный график',
            'flexSchedule' => 'Гибкий график',
            'remSchedule' => 'Удалённая работа',
            'rSchedule' => 'Вахтовый метод',
            'exp' => 'Опыт работы',
            'about' => 'О себе',
        ];
    }
}
