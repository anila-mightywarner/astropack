<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_events".
 *
 * @property int $id
 * @property string $title
 * @property string $canonical_name
 * @property string $image
 * @property string $content
 * @property string $date
 * @property string $baner_image
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $meta_description
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class NewsEvents extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'news_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['content', 'meta_keyword', 'meta_description'], 'string'],
            [['date', 'content', 'meta_keyword', 'meta_description', 'title', 'canonical_name', 'meta_title'], 'required'],
            [['date', 'DOC', 'DOU', 'other_meta_tags'], 'safe'],
            [['status', 'CB', 'UB'], 'integer'],
            [['title', 'canonical_name', 'meta_title'], 'string', 'max' => 255],
            [['image'], 'required', 'on' => 'create'],
            [['image', 'baner_image'], 'file', 'extensions' => 'jpg, png,jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'canonical_name' => 'Canonical Name',
            'image' => 'Image',
            'content' => 'Content',
            'date' => 'Date',
            'baner_image' => 'Baner Image',
            'meta_title' => 'Meta Title',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
