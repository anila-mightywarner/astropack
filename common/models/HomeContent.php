<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "home_content".
 *
 * @property int $id
 * @property string $welcome_title
 * @property string $welcome_description1
 * @property string $welcome_description2
 * @property int $no_of_companies
 * @property int $no_of_people
 * @property int $year_of_experience
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class HomeContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'home_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['welcome_title', 'welcome_description1', 'welcome_description2', 'no_of_companies', 'no_of_people', 'year_of_experience'], 'required'],
            [['welcome_description1', 'welcome_description2'], 'string'],
            [['no_of_companies', 'no_of_people', 'year_of_experience', 'status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['welcome_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'welcome_title' => 'Welcome Title',
            'welcome_description1' => 'Welcome Description1',
            'welcome_description2' => 'Welcome Description2',
            'no_of_companies' => 'No Of Companies',
            'no_of_people' => 'No Of People',
            'year_of_experience' => 'Year Of Experience',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
