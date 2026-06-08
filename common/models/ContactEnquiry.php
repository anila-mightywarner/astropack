<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_enquiry".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $company
 * @property string $message
 * @property string $date
 */
class ContactEnquiry extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'contact_enquiry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['message'], 'string'],
            [['date'], 'safe'],
            [['name', 'email', 'company'], 'string', 'max' => 100],
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
            'company' => 'Company',
            'message' => 'Message',
            'date' => 'Date',
        ];
    }

}
