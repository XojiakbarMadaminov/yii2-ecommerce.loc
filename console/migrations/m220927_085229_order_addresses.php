<?php

use yii\db\Migration;

/**
 * Class m220927_085229_order_addresses
 */
class m220927_085229_order_addresses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_addresses', [
            'order_id' => $this->integer()->notNull(),
            'address' => $this->string(255)->notNull(),
            'city' => $this->string(255)->notNull(),
            'state' => $this->string(255)->notNull(),
            'country' => $this->string(255)->notNull(),
            'zipcode' => $this->string(255),
        ]);

        $this->addPrimaryKey('PK_order_addresses', 'order_addresses', 'order_id');

        // creates index for column `order_id`
        $this->createIndex(
            'idx-order_addresses-order_id',
            'order_addresses',
            'order_id'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            'fk-order_addresses-order_id',
            'order_addresses',
            'order_id',
            'orders',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%order}}`
        $this->dropForeignKey(
            'fk-order_addresses-order_id',
            'order_addresses'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-order_addresses-order_id',
            'order_addresses'
        );

        $this->dropTable('order_addresses');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220927_085228_order_addresses cannot be reverted.\n";

        return false;
    }
    */
}
