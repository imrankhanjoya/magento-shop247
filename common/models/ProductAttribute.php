<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attribute".
 *
 * @property int $id
 * @property int $product_id
 * @property string $entity
 * @property string $value
 * @property int $created_at
 * @property int $updated_at
 */
class ProductAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'entity', 'value', 'created_at', 'updated_at'], 'required'],
            [['product_id', 'created_at', 'updated_at'], 'integer'],
            [['entity'], 'string', 'max' => 32],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'entity' => 'Entity',
            'value' => 'Value',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
