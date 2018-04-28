<?php
/**
 * Created by PhpStorm.
 * User: lightinen
 * Date: 28.04.2018
 * Time: 10:44
 */
namespace app\modules\api\modules\v1\controllers;

use app\modules\api\modules\v1\models\Category;
use yii\web\HttpException;

/**
 * Class CategoryController
 * Доступ к категориям
 * @package app\modules\api\modules\v1\controllers
 */
class CategoryController extends \yii\rest\Controller
{
    /**
     * Вывод списка категорий
     * @return \app\modules\api\modules\v1\models\Category[]|\app\modules\api\modules\v1\models\Product[]|array|\yii\db\ActiveRecord[]
     */
    public function actionIndex(){
        return Category::find()->all();
    }

    /**
     * Данные категории
     * @param $id
     * @return Category|null
     */
    public function actionView($id){
        return Category::findOne(['id'=>$id]);
    }

    /**
     * Создание категории
     * @return array
     */
    public function actionCreate(){
        $model = new Category();
        $model->setAttributes(\Yii::$app->request->post());
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
     * Удаление категории
     * @param $id
     * @return array
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id){
        $model = Category::findOne(['id'=>$id]);
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