<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_purchase".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $purchase_id
 *
 * @property Category $category
 * @property Purchase $purchase
 */
class CategoryPurchase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_purchase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'purchase_id'], 'required'],
            [['category_id', 'purchase_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'purchase_id' => 'Purchase ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchase()
    {
        return $this->hasOne(Purchase::className(), ['id' => 'purchase_id']);
    }
}
