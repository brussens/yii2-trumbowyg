<?php
/**
 * @link https://github.com/brussens/yii2-trumbowyg
 * @copyright Copyright © since 2018 Brusensky Dmitry. All rights reserved
 * @licence http://opensource.org/licenses/MIT MIT
 */

namespace brussens\yii2\extensions\trumbowyg\assets;

use yii\web\AssetBundle;

/**
 * Class TrumbowygAsset
 *
 * @since 1.0.0
 * @author Brusensky Dmitry <brussens@nativeweb.ru>
 */
class TrumbowygAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/trumbowyg/dist';
    /**
     * @var array
     */
    public $css = [
        'ui/trumbowyg' . (YII_ENV_DEV ? '' : '.min') . '.css'
    ];
    /**
     * @var array
     */
    public $js = [
        'trumbowyg' . (YII_ENV_DEV ? '.min' : '') . '.js',
    ];
    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}