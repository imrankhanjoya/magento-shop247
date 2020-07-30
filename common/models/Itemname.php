<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "itemname".
 *
 * @property int $id
 * @property int $orderid
 * @property string $name
 * @property int $quantity
 * @property int $price
 * @property int $amount
 * @property string $created
 */
class Itemname extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itemname';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderid', 'name', 'quantity', 'price', 'amount'], 'required'],
            [['orderid', 'quantity', 'price', 'amount'], 'integer'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderid' => 'Orderid',
            'name' => 'Name',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'amount' => 'Amount',
            'created' => 'Created',
        ];
    }
}
