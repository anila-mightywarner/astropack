<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_address".
 *
 * @property int $id
 * @property string $title
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class ContactAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'address'], 'required'],
            [['address'], 'string'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU','map_link'], 'safe'],
            [['title', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 100],
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
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
