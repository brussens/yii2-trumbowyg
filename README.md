# Trumbowyg extension for YiiFramework 2.x.x

[![Latest Stable Version](https://poser.pugx.org/brussens/yii2-trumbowyg/v/stable)](https://packagist.org/packages/brussens/yii2-trumbowyg)
[![Total Downloads](https://poser.pugx.org/brussens/yii2-trumbowyg/downloads)](https://packagist.org/packages/brussens/yii2-trumbowyg)
[![License](https://poser.pugx.org/brussens/yii2-trumbowyg/license)](https://packagist.org/packages/brussens/yii2-trumbowyg)

## Install
Either run
```
php composer.phar require --prefer-dist brussens/yii2-trumbowyg "*"
```

or add

```
"brussens/yii2-trumbowyg": "*"
```

to the require section of your `composer.json` file.

## Basic usage:
```php
use brussens\yii2\extensions\trumbowyg\TrumbowygWidget;

echo $form->field($form, 'content')->widget(TrumbowygWidget::className());
```

## Advanced usage
```php
use brussens\yii2\extensions\trumbowyg\TrumbowygWidget;

echo $form->field($form, 'content')->widget(TrumbowygWidget::className(), [
    'clientOptions' => [
        'btns' => [
            ['viewHTML'],
            ['undo', 'redo'],
            ['table'],
            ['formatting'],
            ['strong', 'em', 'del'],
            ['link'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['removeformat'],
            ['fullscreen'],
            ['upload'],
        ]
    ],
    'plugins' => [
        TrumbowygWidget::PLUGIN_UPLOAD,
        TrumbowygWidget::PLUGIN_TABLE,
        TrumbowygWidget::PLUGIN_HISTORY
    ]
]);
```
