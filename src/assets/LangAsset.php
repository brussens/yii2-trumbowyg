<?php
/**
 * @link https://github.com/brussens/yii2-trumbowyg
 * @copyright Copyright © since 2018 Brusensky Dmitry. All rights reserved
 * @licence http://opensource.org/licenses/MIT MIT
 */

namespace brussens\yii2\extensions\trumbowyg\assets;

use yii\web\AssetBundle;

/**
 * Abstract locale translation Asset Bundle
 *
 * @since 1.0.0
 * @author Brusensky Dmitry <brussens@nativeweb.ru>
 */
abstract class LangAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/trumbowyg/dist';
    /**
     * @inheritdoc
     */
    public $depends = [
        'brussens\yii2\extensions\trumbowyg\assets\TrumbowygAsset'
    ];
}