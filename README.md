# yii2-bootstrap-panel

Yii2 Bootstrap panel widget.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ composer require is7/yii2-bootstrap-panel "dev-master"
```

or add

```
"derekisbusy/yii2-bootstrap-panel": "dev-master"
```

to the ```require``` section of your `composer.json` file then run composer update.

##Options
 - **title**    title displayed in the head section of the panel.
 
 - **titleOptions**    the tag options in terms of name-value pairs.
 
 - **content**  content displayed in the body section of the panel.
 
 - **footer** content displayed in the footer section of the panel.
 
 - **context** context of the panel. Defaults to 'default'.
    * info
    * default
    * danger
    * primary
    * success
  
- **collapsible** whether the panel is collapsible. Defaults to false. 

- **collapsed** whether or not the panel is initially collapsed.  Defaults to false.

##Examples

###Basic Example
```php
use is7\bootstrap\Panel;

echo Panel::widget([    
    'title' => 'My Panel',
    'content' => '...',
    'footer' => 'footer content'
    ])
]);
```

###Extended example
```php
use is7\bootstrap\Panel;

echo Panel::begin([
    'title'=>'My Panel',
    'collapsible' => true,
    'context' => 'danger',    
    'footer'=>'footer content'
]);

// the body

Panel::end();
```





