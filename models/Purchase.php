<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase".
 *
 * @property integer $id
 * @property integer $account_id
 * @property integer $payment_method_id
 * @property integer $package_id
 * @property string $purchase_date
 * @property integer $paid
 * @property string $paid_date
 * @property string $start_date
 * @property string $end_date
 * @property integer $purchase_price
 *
 * @property CategoryPurchase[] $categoryPurchases
 * @property Account $account
 * @property PaymentMethod $paymentMethod
 * @property Package $package
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id', 'payment_method_id', 'package_id', 'purchase_date', 'paid', 'paid_date', 'start_date', 'end_date', 'purchase_price'], 'required'],
            [['account_id', 'payment_method_id', 'package_id', 'paid', 'purchase_price'], 'integer'],
            [['purchase_date', 'paid_date', 'start_date', 'end_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_id' => 'Account ID',
            'payment_method_id' => 'Payment Method ID',
            'package_id' => 'Package ID',
            'purchase_date' => 'Purchase Date',
            'paid' => 'Paid',
            'paid_date' => 'Paid Date',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'purchase_price' => 'Purchase Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryPurchases()
    {
        return $this->hasMany(CategoryPurchase::className(), ['purchase_id' => 'id']);
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
    public function getPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::className(), ['id' => 'payment_method_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Package::className(), ['id' => 'package_id']);
    }
}
