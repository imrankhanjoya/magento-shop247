<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $brand_id
 * @property int $category_id
 * @property string $title
 * @property string $sku
 * @property string $product_code
 * @property int $mrp
 * @property int $sale_price
 * @property float $buying_price
 * @property int $status
 * @property int $created_at
 * @property int $rank
 * @property int $updated_at
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'category_id', 'title', 'sku', 'product_code', 'mrp', 'sale_price', 'buying_price', 'created_at', 'updated_at'], 'required'],
            [['brand_id', 'rank', 'category_id', 'mrp', 'sale_price', 'status', 'created_at', 'updated_at'], 'integer'],
            [['buying_price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['sku', 'product_code'], 'string', 'max' => 32],
            [['sku'], 'unique'],
            [['product_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'sku' => 'Sku',
            'product_code' => 'Product Code',
            'mrp' => 'Mrp',
            'sale_price' => 'Sale Price',
            'buying_price' => 'Buying Price',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
