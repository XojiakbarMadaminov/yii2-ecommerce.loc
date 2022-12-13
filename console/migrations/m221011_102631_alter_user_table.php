<?php

use yii\db\Migration;

/**
 * Class m221011_102631_alter_user_table
 */
class m221011_102631_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','firstname','string');
        $this->addColumn('user','lastname','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m221011_102631_alter_user_table cannot be reverted.\n";
//
//        return false;
        $this->dropColumn('user','firstname');
        $this->dropColumn('user','lastname');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221011_102631_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
