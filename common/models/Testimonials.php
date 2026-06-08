<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "testimonials".
 *
 * @property int $id
 * @property string $message
 * @property string $author
 * @property string $designation
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Testimonials extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'testimonials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['message'], 'string'],
            [['status', 'CB', 'UB'], 'integer'],
            [['author', 'designation', 'message'], 'required'],
            [['DOC', 'DOU'], 'safe'],
            [['author', 'designation'], 'string', 'max' => 100],
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
            'message' => 'Message',
            'author' => 'Author',
            'designation' => 'Designation',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
