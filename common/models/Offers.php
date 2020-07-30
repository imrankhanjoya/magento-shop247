<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $offerid
 * @property int $mrp
 * @property int $sale_price
 * @property float $buying_price
 * @property int $status
 * @property int $expire_at
 * @property int $created_at
 * @property int $updated_at
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'image', 'offerid', 'mrp', 'sale_price', 'buying_price', 'expire_at', 'created_at', 'updated_at'], 'required'],
            [['mrp', 'sale_price', 'status', 'expire_at', 'created_at', 'updated_at'], 'integer'],
            [['buying_price'], 'number'],
            [['title', 'image'], 'string', 'max' => 255],
            [['offerid'], 'string', 'max' => 32],
            [['offerid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'offerid' => 'Offerid',
            'mrp' => 'Mrp',
            'sale_price' => 'Sale Price',
            'buying_price' => 'Buying Price',
            'status' => 'Status',
            'expire_at' => 'Expire At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
