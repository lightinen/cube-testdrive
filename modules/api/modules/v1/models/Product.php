<?php

namespace app\modules\api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property double $price
 *
 * @property ProductCategory[] $productCategories
 * @property Category[] $categories
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories(){
        return $this->hasMany(Category::className(),['id'=>'category_id'])->via('productCategories');
    }

    /**
     * Дополнение списка полей для отображения списка категорий при выборке
     * @return array
     */
    public function fields()
    {
        $fields = parent::fields();
        $fields['categories'] = function($model){
            /** @var Product $model */
            return $model->categories;
        };
        return $fields;
    }
}
