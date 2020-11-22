<?php

use yii\db\Migration;

/**
 * Class m201122_210358_create_func
 */
class m201122_210358_create_func extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        //ALTER TABLE `experience`  ADD `functions` TEXT NULL COMMENT 'Обязанности, функции, достижения'  AFTER `position`;
        $this->addColumn('experience', 'functions', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201122_210358_create_func cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201122_210358_create_func cannot be reverted.\n";

        return false;
    }
    */
}
