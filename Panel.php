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
    public $id;
    public $panelOptions;
    public $title;
    public $titleOptions = [];
    public $content;
    public $footer;
    public $context = 'default';
    public $collapsible = false;
    public $collapsed = false;
    public $minimizable = false;

    public $buttons = [];

    private $_minimizeButton = [
        'options' => [
            'class' => 'btn btn-default panel-minimize',
            'title' => 'Minimize'
        ],
        'icon' => 'minus'
    ];

    public function init()
    {
        parent::init();

        PanelAsset::register($this->view);

        if (!$this->id) {
            $this->id = $this->getId();
        }

        if (!isset($this->panelOptions['id'])) {
            $this->panelOptions['id'] = $this->id;
        }

        if ($this->collapsible) {
            $this->titleOptions = ArrayHelper::merge($this->titleOptions, [
                'data-toggle' => 'collapse',
                'href' => '#'.$this->id.'-collapse'
            ]);
            $this->title = Html::tag('a', $this->title, $this->titleOptions);
        }
        else {
            $this->title = Html::tag('span', $this->title, $this->titleOptions);
        }

        if ($this->minimizable) {
            $this->buttons[] = $this->_minimizeButton;
            $this->registerMinimizeButton();
        }
        if (!empty($this->buttons)) {
            $this->title .= $this->htmlButtons();
        }

        $this->title = Html::tag('div', $this->title, ['class' => 'panel-title']);
    }

    public function run()
    {
        Html::addCssClass($this->panelOptions, ['panel', 'panel-'.$this->context]);
        echo Html::beginTag('div', $this->panelOptions);
        echo Html::tag('div', $this->title, ['class'=>'panel-heading']);

        if ($this->collapsible) {
            echo Html::beginTag('div', ['id' => $this->id.'-collapse', 'class' => 'panel-collapse '.( $this->collapsed ? 'collapse' : 'in')]);
        }

        echo Html::beginTag('div', ['class'=>'panel-body']);
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

    private function htmlButton(array $button)
    {
        if (!isset($button['options']) || !is_array($button['options'])) {
            $button['options'] = [];
        }
        if (!isset($button['icon']) || !is_string($button['icon'])) {
            $button['icon'] = 'minus';
        }

        Html::addCssClass($button['options'], 'btn');

        if (isset($button['icon']) && substr($button['icon'], 0, 1) !== '<') {
            $button['icon'] = Html::tag('i','', ['class' => 'glyphicon glyphicon-'.$button['icon']]);
        }

        return Html::tag('a', $button['icon'], $button['options']);
    }

    private function htmlButtons()
    {
        if (empty($this->buttons)) {
            return '';
        }

        $content = '';
        foreach ($this->buttons as $button) {
            $content .= $this->htmlButton($button);
        }
        return Html::tag('div', $content, ['class' => 'pull-right panel-buttons']);
    }

    private function registerMinimizeButton()
    {
        $view = $this->getView();
        $view->registerJs("$(document).on('click', '#{$this->id} .panel-minimize', panelToggleMinimize)");
    }

}