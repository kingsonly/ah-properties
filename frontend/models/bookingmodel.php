<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class BookingModel extends Model
{
    public $space;
    public $type;
    public $quadrant;
    public $block;
    public $floor;
    public $shop;
    public $payment_term;
    public $payment_term_greater;
	
    


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           
            [['space','type','quadrant','block','floor','shop','payment_term'], 'required'],
            [['payment_term_greater'], 'safe'],
            
        ];
    }


    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
}

