<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "specifications".
 *
 * @property int $id
 * @property int $product_id
 * @property string $specification
 * @property string $description
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Specifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'specifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'status', 'CB', 'UB'], 'integer'],
            [['specification', 'description'], 'required'],
            [['description'], 'string'],
            [['DOC', 'DOU'], 'safe'],
            [['specification'], 'string', 'max' => 255],
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
            'specification' => 'Specification',
            'description' => 'Description',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
