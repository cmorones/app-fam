<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets_b;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@bower/moltran';
    public $css = [
        'assets/css/bootstrap.min.css',
        'assets/css/core.css',
        'assets/css/icons.css',
        'assets/css/components.css',
        'assets/css/pages.css',
        'assets/css/menu.css',
        'assets/css/responsive.css',
        /*'css/AdminLTE.css',
        'css/font-awesome-4.3.0/css/font-awesome.min.css',
        'css/ionicons-2.0.1/css/ionicons.min.css',
        'css/bootstrap-multiselect.css',
        'css/EdusecCustome.css',*/
    ];
    public $js = [
       // 'assets/js/jquery.min.js',
        'assets/js/bootstrap.min.js',
        'assets/js/detect.js',
        'assets/js/fastclick.js',
        'assets/js/jquery.blockUI.js',
        'ssets/js/waves.js',
        'assets/js/wow.min.js',
        'assets/js/jquery.nicescroll.js',
        'assets/js/jquery.scrollTo.min.js',
        'assets/js/jquery.app.js',
        'assets/plugins/moment/moment.js',
        'assets/plugins/waypoints/lib/jquery.waypoints.js',
        'assets/plugins/counterup/jquery.counterup.min.js',
        'assets/plugins/sweetalert/dist/sweetalert.min.js',
        'assets/plugins/flot-chart/jquery.flot.js',
        'assets/plugins/flot-chart/jquery.flot.time.js',
        'assets/plugins/flot-chart/jquery.flot.tooltip.min.js',
        'assets/plugins/flot-chart/jquery.flot.resize.js',
        'assets/plugins/flot-chart/jquery.flot.pie.js',
        'assets/plugins/flot-chart/jquery.flot.selection.js',
        'assets/plugins/flot-chart/jquery.flot.stack.js',
        'assets/plugins/flot-chart/jquery.flot.crosshair.js',
        'assets/pages/jquery.todo.js',
        'ssets/pages/jquery.chat.js',
        'assets/pages/jquery.dashboard.js',
       /* 'js/AdminLTE/app.js',
        //'//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        'js/plugins/slimScroll/jquery.slimscroll.min.js',
        'js/bootstrap-multiselect.js',
        'js/custom-delete-confirm.js',
        'js/bootbox.js',
        'js/bootstrap.file-input.js',
        'js/bootstrapx-clickover.js',
        'js/main.js',*/
    ];
    public $jsOptions = [
            'position' => \yii\web\View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
