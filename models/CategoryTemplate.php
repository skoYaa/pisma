<?php

namespace app\models;

use Yii;
use app\models\Category;

/**
 * This is the model class for table "category_template".
 *
 * @property integer $id
 * @property integer $template_id
 * @property integer $category_id
 *
 * @property Template $template
 * @property Category $category
 */
class CategoryTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['template_id', 'category_id'], 'required'],
            [['template_id', 'category_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'template_id' => 'Template ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(Template::className(), ['id' => 'template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
     public function getCategoryfromTemplate($string)
    {
  
        $models = CategoryTemplate::find()->where(['template_id' => $string])->one();
        $models1= new Category();
        $models1 = Category::find()->where(['id' => $models->category_id])->one();
    return $models1->name;
    }
 
}
