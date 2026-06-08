<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_features".
 *
 * @property int $id
 * @property int $product_id
 * @property string $feature
 * @property string $description
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class KeyFeatures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'key_features';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'status', 'CB', 'UB'], 'integer'],
            [['feature', 'description'], 'required'],
            [['description'], 'string'],
            [['DOC', 'DOU'], 'safe'],
            [['feature'], 'string', 'max' => 255],
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
            'feature' => 'Feature',
            'description' => 'Description',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
