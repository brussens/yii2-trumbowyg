<?php
/**
 * @link https://github.com/brussens/yii2-trumbowyg
 * @copyright Copyright © since 2018 Brusensky Dmitry. All rights reserved
 * @licence http://opensource.org/licenses/MIT MIT
 */

namespace brussens\yii2\extensions\trumbowyg;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\AssetBundle;
use yii\widgets\InputWidget;
use brussens\yii2\extensions\trumbowyg\assets\TrumbowygAsset;

/**
 * Trumbowyg plugin widget.
 *
 * @since 1.0.0
 * @author Brusensky Dmitry <brussens@nativeweb.ru>
 */
class TrumbowygWidget extends InputWidget
{
    const PLUGIN_ALLOWTAGSFROMPASTE = 'allowtagsfrompaste';
    const PLUGIN_BASE64 = 'base64';
    const PLUGIN_CLEANPASTE = 'cleanpaste';
    const PLUGIN_COLORS = 'colors';
    const PLUGIN_EMOJI = 'emoji';
    const PLUGIN_FONTFAMILY = 'fontfamily';
    const PLUGIN_FONTSIZE = 'fontsize';
    const PLUGIN_HIGHLIGHT = 'highlight';
    const PLUGIN_HISTORY = 'history';
    const PLUGIN_INSERTAUDIO = 'insertaudio';
    const PLUGIN_LINEHEIGHT = 'lineheight';
    const PLUGIN_MATHML = 'mathml';
    const PLUGIN_MENTION = 'mention';
    const PLUGIN_NOEMBED = 'noembed';
    const PLUGIN_PASTEEMBED = 'pasteembed';
    const PLUGIN_PASTEIMAGE = 'pasteimage';
    const PLUGIN_PREFORMATTED = 'preformatted';
    const PLUGIN_RESIZIMG = 'resizimg';
    const PLUGIN_RUBY = 'ruby';
    const PLUGIN_TABLE = 'table';
    const PLUGIN_TEMPLATE = 'template';
    const PLUGIN_UPLOAD = 'upload';

    /**
     * jQuery plugin options
     *
     * @see https://alex-d.github.io/Trumbowyg/documentation/#basic-options
     * @see https://alex-d.github.io/Trumbowyg/documentation/#advanced-options
     * @var array
     */
    public $clientOptions = [];
    /**
     * Plugins list for load
     *
     * @see https://alex-d.github.io/Trumbowyg/documentation/plugins/
     * @var array
     */
    public $plugins = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if(!isset($this->clientOptions['lang'])) {
            $this->clientOptions['lang'] = $this->getLanguageName();
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerAssets();

        if ($this->hasModel()) {
            return Html::activeTextarea($this->model, $this->attribute, $this->options);
        }
        return Html::textarea($this->name, $this->value, $this->options);
    }

    /**
     * Register assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        TrumbowygAsset::register($view);
        $this->registerLangAsset();
        $this->registerPluginsAssets();

        $options = Json::encode($this->clientOptions);
        $view->registerJs('jQuery("#' . $this->options['id'] . '").trumbowyg(' . $options . ');');
    }

    /**
     * Register plugins assets
     */
    protected function registerPluginsAssets()
    {
        $view = $this->getView();
        foreach ($this->plugins as $plugin) {
            if (is_array($plugin)) {
                if(isset($plugin['name'], $plugin['asset'])) {
                    /** @var AssetBundle $asset */
                    $asset = $plugin['asset'];
                    $asset::register($view);
                }
            } else {
                $this->registerCorePlugin(strtolower($plugin));
            }
        }
    }

    /**
     * Register core plugin asset
     *
     * @param $name
     */
    protected function registerCorePlugin($name)
    {
        $plugins = [
            self::PLUGIN_ALLOWTAGSFROMPASTE => 'AllowTagsFromPastePluginAsset',
            self::PLUGIN_BASE64 => 'Base64PluginAsset',
            self::PLUGIN_CLEANPASTE => 'CleanPastePluginAsset',
            self::PLUGIN_COLORS => 'ColorsPluginAsset',
            self::PLUGIN_EMOJI => 'EmojiPluginAsset',
            self::PLUGIN_FONTFAMILY => 'FontFamilyPluginAsset',
            self::PLUGIN_FONTSIZE => 'FontSizePluginAsset',
            self::PLUGIN_LINEHEIGHT => 'HighlightPluginAsset',
            self::PLUGIN_HISTORY => 'HistoryPluginAsset',
            self::PLUGIN_INSERTAUDIO => 'InsertAudioPluginAsset',
            self::PLUGIN_LINEHEIGHT => 'LineHeightPluginAsset',
            self::PLUGIN_MATHML => 'MathMLPluginAsset',
            self::PLUGIN_MENTION => 'MentionPluginAsset',
            self::PLUGIN_NOEMBED => 'NoEmbedPluginAsset',
            self::PLUGIN_PASTEEMBED => 'PasteEmbedPluginAsset',
            self::PLUGIN_PASTEIMAGE => 'PasteImagePluginAsset',
            self::PLUGIN_PREFORMATTED => 'PreFormattedPluginAsset',
            self::PLUGIN_RESIZIMG => 'ResizimgPluginAsset',
            self::PLUGIN_RUBY => 'RubyPluginAsset',
            self::PLUGIN_TABLE => 'TablePluginAsset',
            self::PLUGIN_TEMPLATE => 'TemplatePluginAsset',
            self::PLUGIN_UPLOAD => 'UploadPluginAsset'
        ];

        if(isset($plugins[$name])) {
            /** @var AssetBundle $asset */
            $asset = 'brussens\yii2\extensions\trumbowyg\assets\plugins\\' . $plugins[$name];
            $asset::register($this->getView());
        }
    }

    /**
     * Register translation asset
     */
    protected function registerLangAsset()
    {
        $languages = [
            'ar' => 'ArLangAsset',
            'bg' => 'BgLangAsset',
            'by' => 'ByLangAsset',
            'ca' => 'CaLangAsset',
            'cs' => 'CsLangAsset',
            'da' => 'DaLangAsset',
            'de' => 'DeLangAsset',
            'el' => 'ElLangAsset',
            'es' => 'EsLangAsset',
            'es_ar' => 'EsArLangAsset',
            'fa' => 'FaLangAsset',
            'fi' => 'FiLangAsset',
            'fr' => 'FrLangAsset',
            'he' => 'HeLangAsset',
            'hr' => 'HrLangAsset',
            'hu' => 'HuLangAsset',
            'id' => 'IdLangAsset',
            'it' => 'ItLangAsset',
            'ja' => 'JaLangAsset',
            'ko' => 'KoLangAsset',
            'lt' => 'LtLangAsset',
            'mn' => 'MnLangAsset',
            'my' => 'MyLangAsset',
            'nl' => 'NlLangAsset',
            'no_nb' => 'NoNbLangAsset',
            'ph' => 'PhLangAsset',
            'pl' => 'PlLangAsset',
            'pt' => 'PtLangAsset',
            'pt_br' => 'PtBrLangAsset',
            'ro' => 'RoLangAsset',
            'rs' => 'RsLangAsset',
            'rs_latin' => 'RsLatinLangAsset',
            'ru' => 'RuLangAsset',
            'sk' => 'SkLangAsset',
            'sq' => 'SqLangAsset',
            'sv' => 'SvLangAsset',
            'th' => 'ThLangAsset',
            'tr' => 'TrLangAsset',
            'ua' => 'UaLangAsset',
            'vi' => 'ViLangAsset',
            'zh_cn' => 'ZhCnLangAsset',
            'zh_tw' => 'ZhTwLangAsset',
        ];

        $language = $this->clientOptions['lang'];
        if(isset($languages[$language])) {
            /** @var AssetBundle $asset */
            $asset = 'brussens\yii2\extensions\trumbowyg\assets\langs\\' . $languages[$language];
            $asset::register($this->getView());
        }
    }

    /**
     * Normalize language code for jQuery plugin
     *
     * @see https://alex-d.github.io/Trumbowyg/documentation/#add-localization
     * @return string
     */
    protected function getLanguageName()
    {
        $language = strtolower(Yii::$app->language);
        $except = ['zh-cn','zh-tw','es-ar','no-nb','pt-br','rs-latin'];
        if(!in_array($language, $except) && preg_match('/[a-z]+\-[a-z0-9]+/', $language)) {
            $language = explode('-', $language)[0];
        }
        return $language;
    }
}