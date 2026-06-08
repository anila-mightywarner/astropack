<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $brand_name
 * @property string $image
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Brands extends \yii\db\ActiveRecord {
    
    public $banner_images;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['status', 'CB', 'UB'], 'integer'],
            [['brand_name','canonical_name','description', 'meta_title', 'meta_description', 'meta_keyword', 'other_meta_tags'], 'required'],
            [['DOC', 'DOU'], 'safe'],
            [['brand_name'], 'string', 'max' => 100],
            [['image'], 'required', 'on' => 'create'],
            [['image'], 'file', 'extensions' => 'jpg, png,jpeg'],
            [['banner_images'], 'file', 'extensions' => 'jpg, gif, png,jpeg', 'maxFiles' => 100, 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'brand_name' => 'Brand Name',
            'image' => 'Image',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
