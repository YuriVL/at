<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

/**
 * Setting url aliases
 */
Yii::setAlias('@frontendUrl', 'http://autotur.loc');
Yii::setAlias('@backendUrl', 'http://admin.autotur.loc');
