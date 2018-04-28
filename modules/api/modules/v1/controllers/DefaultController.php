<?php

namespace app\modules\api\modules\v1\controllers;

use yii\rest\Controller;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{
    /**
     * обработчик ошибок
     * @return array
     */
    public function actionApiError(){
        return [
            'success'=>false,
            'data' => [
                \Yii::$app->errorHandler->exception
            ]
        ];
    }
}
