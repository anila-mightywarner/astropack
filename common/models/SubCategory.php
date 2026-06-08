<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sub_category".
 *
 * @property int $id
 * @property int $category
 * @property string $sub_category
 * @property string $canonical_name
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class SubCategory extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'sub_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['category', 'status', 'CB', 'UB'], 'integer'],
            [['category', 'sub_category', 'canonical_name', 'description', 'meta_title', 'meta_description', 'meta_keyword','other_meta_tags'], 'required'],
            [['DOC', 'DOU'], 'safe'],
            [['sub_category'], 'string', 'max' => 200],
            [['canonical_name'], 'string', 'max' => 255],
            [['image'], 'required', 'on' => 'create'],
            [['image'], 'file', 'extensions' => 'jpg, png,jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'sub_category' => 'Sub Category',
            'canonical_name' => 'Canonical Name',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
