<?php
/**
 * @link http://www.yiiframework.com/hola
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets_b;
use yii\web\AssetBundle;

class EduSecUserProfile extends AssetBundle
{
    public $basePath = '@webroot';
    public $sourcePath = '@bower/iems-lte';
    public $css = [
		'css/EduSecUserProfile.css',
    ];
    public $js = [
		'js/responsive-tabs.js',
		'js/EduSecUserProfile.js',
		'js/jquery.cookie.js',
        'js/main.js',
    ];
    public $jsOptions = [
    		'position' => \yii\web\View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	'yii\bootstrap\BootstrapPluginAsset'
    ];
}
