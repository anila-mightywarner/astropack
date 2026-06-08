<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $title
 * @property string $sub_title
 * @property string $about_company
 * @property string $our_vision
 * @property string $our_mission
 * @property string $image
 * @property string $our_dealership_companies
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class About extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['about_company', 'our_vision', 'our_mission', 'our_dealership_companies', 'section2'], 'string'],
            [['about_company', 'our_vision', 'our_mission', 'our_dealership_companies', 'title', 'description2'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['title', 'sub_title'], 'string', 'max' => 100],
            [['image'], 'file', 'extensions' => 'jpg, png,jpeg'],
            [['video'], 'file', 'extensions' => 'mp4, 3gp, ogg, avi'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'sub_title' => 'Sub Title',
            'about_company' => 'Description 1',
            'description2' => 'Description 2',
            'our_vision' => 'Our Vision',
            'our_mission' => 'Our Mission',
            'image' => 'Image',
            'our_dealership_companies' => 'Our Dealership Companies',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

}
