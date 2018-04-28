<?php

namespace app\modules\api;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->modules = [
            'v1' => 'app\modules\api\modules\v1\Module'
        ];
        // custom initialization code goes here
    }
}
