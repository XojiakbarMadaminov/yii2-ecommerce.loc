<?php

use yii\db\Migration;

/**
 * Class m220927_071547_products
 */
class m220927_071547_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products',[
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->string(5000),
            'image' => $this->string(2000),
            'price' => $this->decimal(10, 2)->notNull(),
            'status' => $this->tinyInteger(2)->notNull(),
            'created_at' => $this->dateTime(),
            'update_at' => $this->dateTime(),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11)
        ]);

        $this->createIndex('idx-products-created_by','products','created_by');
        $this->addForeignKey('fk-products-created_by','products','created_by','user','id','CASCADE','CASCADE');

        $this->createIndex('idx-products-updated_by','products','updated_by');
        $this->addForeignKey('idx-products-updated_by','products','updated_by','user','id','CASCADE','CASCADE');
    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m220927_071547_products cannot be reverted.\n";
//
//        return false;
        $this->dropForeignKey('fk-products-created_by','products');
        $this->dropIndex('idx-products-created_by','products');

        $this->dropForeignKey('idx-products-updated_by','products');
        $this->dropIndex('idx-products-updated_by','products');

        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220927_071547_products cannot be reverted.\n";

        return false;
    }
    */
}
