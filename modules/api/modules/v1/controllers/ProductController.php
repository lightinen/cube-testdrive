<?php
/**
 * Created by PhpStorm.
 * User: lightinen
 * Date: 28.04.2018
 * Time: 11:26
 */

namespace app\modules\api\modules\v1\controllers;


use app\modules\api\modules\v1\models\Product;
use yii\rest\Controller;

/**
 * Операции с товарами
 * Class ProductController
 * @package app\modules\api\modules\v1\controllers
 */
class ProductController extends Controller
{
    /**
     * Список товаров
     * @param null $category_id
     * @param integer $page
     * @return Product[]|array|\yii\db\ActiveRecord[]
     */
    public function actionIndex($category_id = null,$page = 1){
        $model = Product::find();
        if($category_id != null) $model->joinWith('productCategories')->where(['category_id'=>$category_id]);
        $model->limit(3)->offset(3*($page-1));
        return $model->all();
    }

    /**
     * Подробная информация о товаре
     * @param $id
     * @param null $category_id
     * @return Product|array|null|\yii\db\ActiveRecord
     */
    public function actionView($id,$category_id = null){
        $model = Product::find()->where(['product.id'=>$id])->joinWith('categories');
        if($category_id != null) $model->andWhere(['category.id'=>$id]);
        return $model->one();
    }
}