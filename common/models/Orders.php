<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property int $order_id
 * @property string $phone
 * @property string $name
 * @property string $address
 * @property string $pin
 * @property string $lat
 * @property string $lan
 * @property string $status
 * @property int $careated
 * @property string $payment_status
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'order_id', 'phone', 'name', 'address', 'pin', 'lat', 'lan', 'status', 'careated', 'payment_status'], 'required'],
            [['user_id', 'order_id', 'careated'], 'integer'],
            [['phone', 'name', 'lat', 'lan'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 300],
            [['pin', 'status', 'payment_status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'phone' => 'Phone',
            'name' => 'Name',
            'address' => 'Address',
            'pin' => 'Pin',
            'lat' => 'Lat',
            'lan' => 'Lan',
            'status' => 'Status',
            'careated' => 'Careated',
            'payment_status' => 'Payment Status',
        ];
    }

    public function getOrderId()
    {
        $val = Orders::find()->orderby(['order_id' => SORT_DESC])->one();
        if (empty($val)) {
            return 1001;
        } else {
            if ($val->order_id < 1000) {
                $val->order_id = 1000;
            }
            return $val->order_id + 1;
        }
    }
}
