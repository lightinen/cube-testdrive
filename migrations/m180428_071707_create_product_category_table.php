<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_category`.
 * Has foreign keys to the tables:
 *
 * - `category`
 * - `product`
 */
class m180428_071707_create_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_category', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-product_category-category_id',
            'product_category',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product_category-category_id',
            'product_category',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_category-product_id',
            'product_category',
            'product_id'
        );

        // add foreign key for table `product`
        $this->addForeignKey(
            'fk-product_category-product_id',
            'product_category',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-product_category-category_id',
            'product_category'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-product_category-category_id',
            'product_category'
        );

        // drops foreign key for table `product`
        $this->dropForeignKey(
            'fk-product_category-product_id',
            'product_category'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_category-product_id',
            'product_category'
        );

        $this->dropTable('product_category');
    }
}
