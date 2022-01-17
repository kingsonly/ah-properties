<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class CsvForm extends Model{
    public $file;
   
    public function rules(){
        return [
            [['file'],'required'],
            [['file'],'file','maxSize'=>1024 * 1024 * 5],
        ];
    }
   
    public function attributeLabels(){
        return [
            'file'=>'Select File',
        ];
    }
}