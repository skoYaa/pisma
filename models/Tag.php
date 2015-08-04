<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Tag;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $name
 *
 * @property TemplateTag[] $templateTags
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplateTags()
    {
        return $this->hasMany(TemplateTag::className(), ['tag_id' => 'id']);
    }
    
    
    
    public static function get_status_name() {   //kupi sve iz tabele pod kolonom ime
        $cat=  Tag::find()->all();
        $catt= \yii\helpers\ArrayHelper::map($cat, 'name', 'name');
        return $catt;
    }


    public function getTags($string )
    {
        $modelic = TemplateTag::find()->where(['template_id' => $string]) ->all();
        $ids = ArrayHelper::getColumn($modelic, 'tag_id');
        return $models = Tag::find()->where(['in','id',$ids])->all();
   
    }
    public function getItemsTag($string)
    {
        $modelic = TemplateTag::find()->where(['template_id' => $string]) ->all();
        $ids = ArrayHelper::getColumn($modelic, 'tag_id');
        //var_dump($ids);
        return $models = Tag::find()->where(['in','id',$ids])->all();

        
    }
     public function getTagbyid($string)
    {
        return $models = Tag::find()->where(['id'=>$string])->one();

        
    }
}
