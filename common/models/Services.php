<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $service_title
 * @property string $canonical_name
 * @property string $description
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $meta_description
 * @property string $image
 * @property string $baner_image
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Services extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['description', 'meta_keyword', 'meta_description'], 'string'],
            [['description', 'meta_keyword', 'meta_description', 'service_title', 'canonical_name', 'meta_title'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['service_title', 'canonical_name'], 'string', 'max' => 255],
            [['meta_title'], 'string', 'max' => 100],
            [['image', 'baner_image'], 'required', 'on' => 'create'],
            [['image', 'baner_image'], 'file', 'extensions' => 'jpg, png,jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'service_title' => 'Service Title',
            'canonical_name' => 'Canonical Name',
            'description' => 'Description',
            'meta_title' => 'Meta Title',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'image' => 'Image',
            'baner_image' => 'Baner Image',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
