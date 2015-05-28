<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "template".
 *
 * @property integer $id
 * @property string $text
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $active
 * @property integer $account_id
 *
 * @property CategoryTemplate[] $categoryTemplates
 * @property Account $account
 * @property TemplateTag[] $templateTags
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'name', 'description', 'active', 'account_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['active', 'account_id'], 'integer'],
            [['text'], 'string', 'max' => 1000],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'active' => 'Active',
            'account_id' => 'Account ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryTemplates()
    {
        return $this->hasMany(CategoryTemplate::className(), ['template_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::className(), ['id' => 'account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplateTags()
    {
        return $this->hasMany(TemplateTag::className(), ['template_id' => 'id']);
    }
    
    public function behaviors() {
        return [
            [
                'class'=>  TimestampBehavior::className(),
                'createdAtAttribute'=>'created_at',
                'updatedAtAttribute'=>'updated_at',
                'value'=>new Expression('NOW()'),
            ],
        ];
    }
}
