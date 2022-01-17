<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css',
        'css/main.css',
        'css/all.min.css',
        '//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css',
        'css/toastr.css',
		'asset/css/style.css',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
		'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap'
    ];
    public $js = [
		//'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
		'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js',
		'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js',
		'//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js',
		'js/toastr.js',
		"asset/js/popper.min.js",
		"asset/js/plugins.js",
		'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js',
		"asset/js/custom.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
