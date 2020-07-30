<?php

use yii\db\Migration;

/**
 * Class m200607_183615_ration
 */
class m200607_183615_ration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200607_183615_ration cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('offers', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(300)->notNull(),
            'image' => $this->string()->notNull(),
            'offerid' => $this->string(32)->notNull()->unique(),
            'mrp' => $this->integer()->notNull(),
            'sale_price' => $this->integer()->notNull(),
            'buying_price' => $this->float()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'expire_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createTable('profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'name' => $this->string()->notNull(),
            'dob' => $this->string()->notNull(),
            'gender' => $this->string()->notNull(),
            'sharetoken' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'address1' => $this->string()->notNull(),
            'address2' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'pin' => $this->string()->notNull(),
            'last' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer(11)->notNull(),
            'category_id' => $this->integer(11)->notNull(),
            'title' => $this->string()->notNull(),
            'sku' => $this->string(32)->notNull()->unique(),
            'product_code' => $this->string(32)->notNull()->unique(),
            'mrp' => $this->integer()->notNull(),
            'sale_price' => $this->integer()->notNull(),
            'buying_price' => $this->float()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'expire_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);


        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'parent' => $this->integer(11)->notNull(),
            'title' => $this->string()->notNull()->unique(),
            'description' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createTable('product_category', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11)->notNull(),
            'product_id' => $this->integer(11)->notNull(),
        ], $tableOptions);
        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'description' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createTable('brand_category', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer(11)->notNull(),
            'product_id' => $this->integer(11)->notNull(),
        ], $tableOptions);
        $this->createTable('product_attribute', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'entity' => $this->string(32)->notNull(),
            'value' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m200607_183615_ration cannot be reverted.\n";
        // $this->dropTable('product_attribute');
        // $this->dropTable('brand_category');
        // $this->dropTable('brand');
        // $this->dropTable('product_category');
        // $this->dropTable('category');
        // $this->dropTable('products');
        return false;
    }
}
