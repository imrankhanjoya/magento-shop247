<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand_category".
 *
 * @property int $id
 * @property int $brand_id
 * @property int $product_id
 */
class BrandCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'product_id'], 'required'],
            [['brand_id', 'product_id'], 'integer'],
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
            'product_id' => 'Product ID',
        ];
    }
}
