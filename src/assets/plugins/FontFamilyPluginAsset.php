<?php
/**
 * @link https://github.com/brussens/yii2-trumbowyg
 * @copyright Copyright © since 2018 Brusensky Dmitry. All rights reserved
 * @licence http://opensource.org/licenses/MIT MIT
 */

namespace brussens\yii2\extensions\trumbowyg\assets\plugins;

use brussens\yii2\extensions\trumbowyg\assets\PluginAsset;

/**
 * FontFamily plugin Asset Bundle
 *
 * @since 1.0.0
 * @author Brusensky Dmitry <brussens@nativeweb.ru>
 */
class FontFamilyPluginAsset extends PluginAsset
{
    /**
     * @var array
     */
    public $js = [
        'plugins/fontfamily/trumbowyg.fontfamily' . (YII_ENV_DEV ? '.min' : '') . '.js',
    ];
}