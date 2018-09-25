<?php
/**
 * @link https://github.com/brussens/yii2-trumbowyg
 * @copyright Copyright © since 2018 Brusensky Dmitry. All rights reserved
 * @licence http://opensource.org/licenses/MIT MIT
 */

namespace brussens\yii2\extensions\trumbowyg\assets;

use yii\web\AssetBundle;

/**
 * Abstract plugin Asset Bundle
 *
 * @since 1.0.0
 * @author Brusensky Dmitry <brussens@nativeweb.ru>
 */
abstract class PluginAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/trumbowyg/dist';
    /**
     * @var array
     */
    public $depends = [
        'brussens\yii2\extensions\trumbowyg\assets\TrumbowygAsset'
    ];
}