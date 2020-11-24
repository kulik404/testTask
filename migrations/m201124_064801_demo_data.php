<?php

use yii\db\Migration;

/**
 * Class m201124_064801_demo_data
 * вставка демо данных
 */
class m201124_064801_demo_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            INSERT INTO `resume` (`id`, `foto`, `last_name`, `first_name`, `middle_name`, `bdate`, `sex`, `townId`, `email`, `phone`, `specialityId`, `salary`, `fEmp`, `pEmp`, `tEmp`, `vEmp`, `iEmp`, `fSchedule`, `sSchedule`, `flexSchedule`, `remSchedule`, `rSchedule`, `exp`, `about`, `count`, `cDate`, `uDate`) VALUES
                (9, 'images/profile-foto.jpg', 'Кулик', 'Алексей', 'Викторович', '1985-09-12', 1, 1, 'kulikalexey@mail.ru', '79103277403', 5, 3000000, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, 'asdfgh', 4, '2020-11-21 12:33:49', '2020-11-22 13:56:09'),
                (5, 'images/profile-foto.jpg', 'иванов', 'иван', 'иваныч', '1985-10-06', 1, 0, 'mail@mail.ru', '7234564787766', 2, 4321, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 'werety', 11, '2020-11-21 10:42:57', '2020-11-21 10:42:57'),
                (6, 'images/profile-foto.jpg', 'иванов', 'иван', 'иваныч', '1338-10-06', 1, 0, 'mail@mail.ru', '79998887766', 1, 87654, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 'ewrtyhgfede', 1, '2020-11-21 10:42:57', '2020-11-21 10:42:57'),
                (7, 'images/profile-foto.jpg', 'dfgh', 'wertwertew', 'wertwertewrt', '2028-10-06', 1, 2, 'mail@mail.ru', '79998887766', 3, 765432, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 'jiuhgfcdxsa', 4, '2020-11-21 10:42:57', '2020-11-21 10:42:57'),
                (8, 'images/profile-foto.jpg', 'ewtrwet', 'erwter', 'wertrertew', '1888-03-20', 1, 4, 'mail@mail.ru', '79998887766', 4, 4444, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 'sadfvfdsfvsa', 3, '2020-11-21 10:42:57', '2020-11-21 10:42:57');
                ALTER TABLE `resume` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
        ");

        $this->execute("
            INSERT INTO `speciality` (`id`, `speciality`) VALUES
                (1, 'Администратор баз данных'),
                (2, 'Аналитик'),
                (3, 'Арт-директор'),
                (4, 'Инженер'),
                (5, 'Компьютерная безопасность'),
                (6, 'Контент'),
                (7, 'Маркетинг'),
                (8, 'Мультимедиа'),
                (9, 'Оптимизация сайта (SEO)'),
                (10, 'Передача данных и доступ в интернет'),
                (11, 'Программирование, Разработка'),
                (12, 'Продажи'),
                (13, 'Продюсер'),
                (14, 'Развитие бизнеса'),
                (15, 'Системный администратор'),
                (16, 'Системы управления предприятием (ERP)'),
                (17, 'Сотовые, Беспроводные технологии'),
                (18, 'Стартапы'),
                (19, 'Телекоммуникации'),
                (20, 'Тестирование'),
                (21, 'Технический писатель'),
                (22, 'Управление проектами'),
                (23, 'Электронная коммерция'),
                (24, 'CRM системы'),
                (25, 'Web инженер'),
                (26, 'Web мастер');
                ALTER TABLE `speciality` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
        ");


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201124_064801_demo_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201124_064801_demo_data cannot be reverted.\n";

        return false;
    }
    */
}
