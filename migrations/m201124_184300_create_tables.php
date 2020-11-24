<?php

use yii\db\Migration;

/**
 * Class m201124_184300_create_tables
 * 
 * Cоздание таблиц
 * Структура таблицы `resume`
 * Структура таблицы `speciality`
 * Структура таблицы `experience`
 */
class m201124_184300_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      
      $this->createTable('resume', [ 
        'id' => $this->primaryKey(), 
        'foto' => $this->string()->notNull()->comment('Фото'),
        'last_name' => $this->string()->notNull()->comment('Фамилия'),  
        'first_name' => $this->string()->notNull()->comment('Имя'),  
        'middle_name' => $this->string()->notNull()->comment('Отчество'),  
        'bdate' => $this->date()->notNull()->comment('Дата рождения'),  
        'sex' => $this->boolean()->notNull()->comment('Пол'),  
        'townId' => $this->integer()->notNull()->comment('Город'),  
        'email' => $this->string()->notNull()->comment('Электронная почта'),  
        'phone' => $this->decimal(14)->notNull()->comment('Телефон'),  
        'specialityId' => $this->integer()->notNull()->comment('Специализация'),  
        'salary' => $this->integer()->notNull()->comment('Зарплата'),
        'fEmp' => $this->boolean()->notNull()->comment('Полная занятость')->defaultValue(0),  
        'pEmp' => $this->boolean()->notNull()->comment('Частичная занятость')->defaultValue(0),  
        'tEmp' => $this->boolean()->notNull()->comment('Проектная/Временная работа')->defaultValue(0),  
        'vEmp' => $this->boolean()->notNull()->comment('Волонтёрство')->defaultValue(0),  
        'iEmp' => $this->boolean()->notNull()->comment('Стажировка')->defaultValue(0),  
        'fSchedule' => $this->boolean()->notNull()->comment('Полный день')->defaultValue(0),  
        'sSchedule' => $this->boolean()->notNull()->comment('Сменный график')->defaultValue(0),  
        'flexSchedule' => $this->boolean()->notNull()->comment('Гибкий график')->defaultValue(0),  
        'remSchedule' => $this->boolean()->notNull()->comment('Удалённая работа')->defaultValue(0),  
        'rSchedule' => $this->boolean()->notNull()->comment('Вахтовый метод')->defaultValue(0),  
        'exp' => $this->boolean()->notNull()->comment('Опыт работы')->defaultValue(0),  
        'about' => $this->text()->comment('О себе')->defaultValue(''),  
        'count' => $this->integer()->notNull()->comment('Счетчик просмотров')->defaultValue(0),  
        'cDate' => $this->timestamp()->notNull()->comment('Дата создания')->defaultExpression('CURRENT_TIMESTAMP'),  
        'uDate' => $this->timestamp()->notNull()->comment('Дата обновления')->defaultExpression('CURRENT_TIMESTAMP'),  
      ]);   

      $this->createTable('speciality', [ 
        'id' => $this->primaryKey(), 
        'speciality' => $this->string()->notNull()->comment('Фото'),
      ]);

      $this->createTable('experience', [ 
        'id' => $this->primaryKey(), 
        'resumeId' => $this->integer()->notNull(),
        'mStart' => $this->integer()->notNull()->comment('месяц начала работы'),
        'yStart' => $this->integer()->notNull()->comment('год начала работы'),
        'mEnd' => $this->integer()->comment('месяц окончания работы'),
        'yEnd' => $this->integer()->comment('год окончания работы'),
        'now' => $this->boolean()->notNull()->comment('По настоящее время')->defaultValue(0),
        'organization' => $this->text()->notNull()->comment('Организация'),
        'functions' => $this->text()->notNull()->comment('Обязанности, функции, достижения'),
      ]);

      // creates index for column `resumeId`
        $this->createIndex(
            'idx-experience-resumeId',
            'experience',
            'resumeId'
        );

        // add foreign key for table `resume`
        $this->addForeignKey(
            'fk-experience-resumeId',
            'experience',
            'resumeId',
            'resume',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `resume`
        $this->dropForeignKey(
            'fk-experience-resumeId',
            'experience'
        );

        // drops index for column `aresumeId`
        $this->dropIndex(
            'idx-experience-resumeId',
            'experience'
        );
        
        $this->dropTable('experience');
        $this->dropTable('speciality');
        $this->dropTable('resume');
    }

    
}
