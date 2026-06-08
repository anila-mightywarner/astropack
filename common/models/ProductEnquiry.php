<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_enquiry".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $company
 * @property string $message
 * @property string $date
 */
class ProductEnquiry extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'product_enquiry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['message'], 'string'],
            [['date'], 'safe'],
            [['name', 'email', 'product'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'product' => 'Product Name',
            'message' => 'Message',
            'sent_from_url' => 'Sent From Url',
            'date' => 'Date',
        ];
    }

}
