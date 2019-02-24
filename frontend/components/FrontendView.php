<?php

namespace frontend\components;

use Yii;
use yii\helpers\ArrayHelper;
use rmrevin\yii\minify\components\{CSS, JS};
use rmrevin\yii\minify\View;

class FrontendView extends View
{
    /**
     * @inheritdoc
     */
    public function endBody()
    {
        $this->trigger(self::EVENT_END_BODY);

        echo self::PH_BODY_END;

        if(true === $this->enableMinify) {
            $this->prodMode();
        } else {
            $this->devMode();
        }
    }

    private function devMode()
    {
        foreach (array_keys($this->assetBundles) as $bundle) {
            $this->registerAssetFiles($bundle);
        }
    }

    private function prodMode()
    {
        $cache = Yii::$app->cache;
        $key = 'minify-js-css';
        $data = $cache->get($key);

        if(empty($data['js']) || empty($data['css'])){
            foreach (array_keys($this->assetBundles) as $bundle) {
                $this->registerAssetFiles($bundle);
            }

            if (true === $this->enableMinify) {
                (new CSS($this))->export();
                (new JS($this))->export();
            }
            if(!empty($this->jsFiles) && !empty($this->cssFiles)){
                Yii::$app->cache->set($key, [
                    'js' => $this->jsFiles,
                    'css' => $this->cssFiles
                ], 86400);
            }
        } else {
            $this->jsFiles = ArrayHelper::getValue($data, 'js');
            $this->cssFiles = ArrayHelper::getValue($data, 'css');
        }
    }
}