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
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css',
        'css/main.css',
        'css/all.min.css',
        '//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css',
        'css/toastr.css',
    ];
    public $js = [
		//'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
		'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js',
		'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js',
		'//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js',
		'js/toastr.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
