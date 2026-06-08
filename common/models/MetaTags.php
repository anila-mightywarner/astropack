<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meta_tags".
 *
 * @property int $id
 * @property string $page_name
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property string $page_url
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class MetaTags extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'meta_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['meta_description', 'meta_keyword'], 'string'],
            [['meta_description', 'meta_keyword', 'page_name', 'meta_title'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['page_name', 'meta_title'], 'string', 'max' => 100],
            [['page_url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'page_name' => 'Page Name',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'page_url' => 'Page Url',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
