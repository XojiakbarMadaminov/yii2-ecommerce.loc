<?php

use yii\db\Migration;

/**
 * Class m220927_085230_cart_items
 */
class m220927_085230_cart_items extends Migration
{
    /**
     * {@inheritdoc}
     */
        public function safeUp()
    {
        $this->createTable('cart_items', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'quantity' => $this->integer(2)->notNull(),
            'created_by' => $this->integer(11)
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-cart_items-product_id',
            'cart_items',
            'product_id'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            'fk-cart_items-product_id',
            'cart_items',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );


        // creates index for column `created_by`
        $this->createIndex(
            'idx-cart_items-created_by',
            'cart_items',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            'fk-cart_items-created_by',
            'cart_items',
            'created_by',
            'user',
            'id',
            'CASCADE'
        );
    }

        /**
         * {@inheritd
         */
        public function safeDown()
    {
        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            'fk-cart_items-product_id',
            'cart_items'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-cart_items-product_id',
            'cart_items'
        );
//
//        // drops foreign key for table `{{%orders}}`
//        $this->dropForeignKey(
//            'fk-cart_items-order_id',
//            'cart_items'
//        );
//
//        // drops index for column `order_id`
//        $this->dropIndex(
//            'idx-cart_items-order_id',
//            'cart_items'
//        );

        $this->dropTable('cart_items');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220927_085228_order_items cannot be reverted.\n";

        return false;
    }
    */
}
