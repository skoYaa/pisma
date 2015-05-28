<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $pass
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $adress
 * @property string $city
 * @property string $country
 * @property integer $status
 * @property string $company_name
 * @property integer $administrator
 * @property integer $pdv_number
 *
 * @property Category[] $categories
 * @property Purchase[] $purchases
 * @property Template[] $templates
 */
class Account extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'pass', 'first_name', 'last_name', 'email', 'phone', 'adress', 'city', 'country'], 'required'],
            [['status', 'administrator', 'pdv_number'], 'integer'],
            [['user_name', 'pass', 'first_name', 'last_name', 'email', 'phone', 'adress', 'city', 'country', 'company_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'pass' => 'Pass',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'adress' => 'Adress',
            'city' => 'City',
            'country' => 'Country',
            'status' => 'Status',
            'company_name' => 'Company Name',
            'administrator' => 'Administrator',
            'pdv_number' => 'Pdv Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplates()
    {
        return $this->hasMany(Template::className(), ['account_id' => 'id']);
    }
    
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::find()->where(['user_name' => $username])->one();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->pass === $password;
    }
}
