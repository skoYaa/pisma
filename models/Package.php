<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_amount
 * @property integer $package_price
 *
 * @property Purchase[] $purchases
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_amount', 'package_price'], 'required'],
            [['category_amount', 'package_price'], 'integer'],
            [['name'], 'string', 'max' => 50]
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
            'category_amount' => 'Category Amount',
            'package_price' => 'Package Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::className(), ['package_id' => 'id']);
    }
}
