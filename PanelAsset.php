<?php
namespace is7\bootstrap;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Panel files.
 *
 * @author Dmitry Zhukov <dmitry@zhukovs.ru>
 * @since 2.0
 */
class PanelAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];

    /**
     * @inheritdoc
     */
    public $sourcePath = __DIR__.'/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/is7-yii2-bootstrap-panel.css'
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'js/is7-yii2-bootstrap-panel.js'
    ];
}