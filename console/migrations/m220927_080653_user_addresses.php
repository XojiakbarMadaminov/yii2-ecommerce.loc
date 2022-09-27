<?php

use yii\db\Migration;

/**
 * Class m220927_080653_user_addresses
 */
class m220927_080653_user_addresses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_addresses',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'address' => $this->string(255)->notNull(),
            'city' => $this->string()->notNull(),
            'state' => $this->string(255)->notNull(),
            'country' => $this->string(255)->notNull(),
            'zipcode' => $this->string(255)
        ]);

        $this->createIndex('idx-user_addresses-user_id','user_addresses','user_id');
        $this->addForeignKey('fk-user_addresses-user_id','user_addresses','user_id','user','id', 'CASCADE','CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m220927_080653_user_addresses cannot be reverted.\n";
//
//        return false;
        $this->dropForeignKey('fk-user_addresses-user_id','user_addresses');
        $this->dropIndex('idx-user_addresses-user_id','user_addresses');

        $this->dropTable('user_addresses');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220927_080653_user_addresses cannot be reverted.\n";

        return false;
    }
    */
}
