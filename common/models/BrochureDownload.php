<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brochure_download".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $date
 */
class BrochureDownload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brochure_download';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['message'], 'string'],
            [['date'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 25],
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
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
            'date' => 'Date',
        ];
    }
}
