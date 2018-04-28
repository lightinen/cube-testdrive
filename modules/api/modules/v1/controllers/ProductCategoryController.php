<?php
/**
 * Created by PhpStorm.
 * User: lightinen
 * Date: 28.04.2018
 * Time: 12:15
 */

namespace app\modules\api\modules\v1\controllers;


use app\modules\api\modules\v1\models\ProductCategory;
use yii\rest\Controller;
use yii\web\HttpException;

/**
 * Операции для связки категорий и товаров
 * Class ProductCategoryController
 * @package app\modules\api\modules\v1\controllers
 */
class ProductCategoryController extends Controller
{
    /**
     * Добавление товара в категорию
     * @param $category_id
     * @param $product_id
     * @return array
     */
    public function actionCreate($category_id,$product_id){
        $model = new ProductCategory();
        $model->category_id = $category_id;
        $model->product_id = $product_id;
        if($model->validate()){
            $model->save();
            return [
                'success' => true,
                'data' => $model
            ];
        }else{
            return [
                'success'=> false,
                'data' => $model->errors
            ];
        }
    }

    /**
     * Удаление связки категории и товара
     * @param $category_id
     * @param $product_id
     * @return array
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($category_id,$product_id){
        $model = ProductCategory::findOne(['category_id'=>$category_id,'product_id'=>$product_id]);
        if($model){
            $model->delete();
            return [
                'success' => true,
                'data' => $model
            ];
        }else{
            throw new HttpException(404);
        }
    }
}