<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $user_id
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $pin
 * @property string $last
 * @property int $created_at
 * @property int $updated_at
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'address1', 'address2', 'city', 'pin', 'last', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['address1', 'address2', 'city', 'pin', 'last'], 'string', 'max' => 255],
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
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'pin' => 'Pin',
            'last' => 'Last',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
