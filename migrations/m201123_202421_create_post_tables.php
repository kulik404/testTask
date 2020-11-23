<?php

use yii\db\Migration;

/**
 * Class m201123_202421_create_post_tables
 * 
 * Cоздание таблиц
 * Структура таблицы `resume`
 * Структура таблицы `speciality`
 */
class m201123_202421_create_post_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute(
            CREATE TABLE `resume` (
              `id` int(11) NOT NULL,
              `foto` varchar(255) NOT NULL COMMENT 'Фото',
              `last_name` varchar(255) NOT NULL COMMENT 'Фамилия',
              `first_name` varchar(255) NOT NULL COMMENT 'Имя',
              `middle_name` varchar(255) NOT NULL COMMENT 'Отчество',
              `bdate` date NOT NULL COMMENT 'Дата рождения',
              `sex` int(1) NOT NULL COMMENT 'Пол',
              `townId` int(11) NOT NULL COMMENT 'Город',
              `email` varchar(255) NOT NULL COMMENT 'Электронная почта',
              `phone` decimal(14,0) NOT NULL COMMENT 'Телефон',
              `specialityId` int(11) NOT NULL COMMENT 'Специализация',
              `salary` int(11) NOT NULL COMMENT 'Зарплата',
              `fEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Полная занятость',
              `pEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Частичная занятость',
              `tEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Проектная/Временная работа',
              `vEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Волонтёрство',
              `iEmp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Стажировка',
              `fSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Полный день',
              `sSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Сменный график',
              `flexSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Гибкий график',
              `remSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Удалённая работа',
              `rSchedule` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Вахтовый метод',
              `exp` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Опыт работы',
              `about` text NOT NULL DEFAULT '' COMMENT 'О себе',
              `count` int(11) NOT NULL DEFAULT 0 COMMENT 'Счетчик просмотров',
              `cDate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Дата создание',
              `uDate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Дата создание'
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
            ALTER TABLE `resume` ADD PRIMARY KEY (`id`);
        );

        $this->execute(
            CREATE TABLE `speciality` (
              `id` int(11) NOT NULL,
              `speciality` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        );





    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201123_202421_create_post_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201123_202421_create_post_tables cannot be reverted.\n";

        return false;
    }
    */
}
