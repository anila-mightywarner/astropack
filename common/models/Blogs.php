<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blogs".
 *
 * @property int $id
 * @property string $image
 * @property string $author
 * @property string $date
 * @property string $title
 * @property string $small_description
 * @property string $detailed_description
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Blogs extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'blogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['date', 'DOC', 'DOU', 'other_meta_tags'], 'safe'],
            [['small_description', 'detailed_description'], 'string'],
            [['canonical_name', 'small_description', 'detailed_description', 'date', 'title', 'author', 'meta_title', 'meta_keyword', 'meta_description'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['image', 'author'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'author' => 'Author',
            'date' => 'Date',
            'title' => 'Title',
            'small_description' => 'Small Description',
            'detailed_description' => 'Detailed Description',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
