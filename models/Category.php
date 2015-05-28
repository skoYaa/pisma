<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $parent_category
 * @property integer $account_id
 *
 * @property Account $account
 * @property CategoryPurchase[] $categoryPurchases
 * @property CategoryTemplate[] $categoryTemplates
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'parent_category', 'account_id'], 'required'],
            [['parent_category', 'account_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'parent_category' => 'Parent Category',
            'account_id' => 'Account ID',
        ];
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
    public function getCategoryPurchases()
    {
        return $this->hasMany(CategoryPurchase::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryTemplates()
    {
        return $this->hasMany(CategoryTemplate::className(), ['category_id' => 'id']);
    }
}
