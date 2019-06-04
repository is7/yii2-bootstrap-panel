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
    ];
}