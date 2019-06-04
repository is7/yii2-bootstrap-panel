<?php
namespace is7\bootstrap;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * \is7\bootstrap\Panel.
 *
 * @author Dmitry Zhukov <dmitry@zhukovs.ru>
 * @since 2.0
 */
class Panel extends \yii\base\Widget
{
    public $title;
    public $titleOptions = [];
    public $content;
    public $footer;
    public $context = 'default';
    public $collapsible = false;
    public $collapsed = false;

    public function init(){
        parent::init();

        PanelAsset::register($this->view);

        if ($this->collapsible) {
            $this->titleOptions = ArrayHelper::merge($this->titleOptions, [
                'data-toggle' => 'collapse',
                'href' => '#'.$this->getId()
            ]);
            $this->title = Html::tag('a', $this->title, $this->titleOptions);
        }
        else {
            $this->title = Html::tag('span', $this->title, $this->titleOptions);
        }
        $this->title = Html::tag('div', $this->title, ['class' => 'panel-title']);

        echo Html::beginTag('div', ['class'=>'panel panel-'.$this->context]);
        echo Html::tag('div', $this->title, ['class'=>'panel-heading']);

        if ($this->collapsible) {
            echo Html::beginTag('div', ['id' => $this->getId(), 'class' => 'panel-collapse '.( $this->collapsed ? 'collapse' : 'in')]);
        }

        echo Html::beginTag('div', ['class'=>'panel-body']);
    }

    public function run(){
        echo $this->content;
        echo Html::endTag('div');
        if($this->footer) {
            echo Html::tag('div', $this->footer, ['class' => 'panel-footer']);
        }
        if ($this->collapsible) {
            echo Html::endTag('div');
        }
        echo Html::endTag('div');
    }

    public static function begin($config = array()) {
        parent::begin($config);
    }

    public static function end() {
        parent::end();
    }
}