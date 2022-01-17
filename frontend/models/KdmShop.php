<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_shop".
 *
 * @property int $id
 * @property string $name
 * @property int $space_id
 * @property int $space_type_id
 * @property int $quadrant_id
 * @property int $block_id
 * @property int $floor_id
 * @property int $price
 * @property int $status
 * @property int $reserved
 */
class KdmShop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'space_id', 'space_type_id', 'quadrant_id', 'block_id', 'floor_id', 'price', 'status', 'reserved'], 'required'],
            [['space_id', 'space_type_id', 'quadrant_id', 'block_id', 'floor_id', 'price', 'status', 'reserved'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'space_id' => 'Space ID',
            'space_type_id' => 'Space Type ID',
            'quadrant_id' => 'Quadrant ID',
            'block_id' => 'Block ID',
            'floor_id' => 'Floor ID',
            'price' => 'Price',
            'status' => 'Status',
            'reserved' => 'Reserved',
        ];
    }
	
	public function getSpace(){

		return $this->hasOne(KdmSpaceName::className(), ['id' => 'space_id']);
	}
	
	public function getType(){

		return $this->hasOne(KdmSpaceType::className(), ['id' => 'space_type_id']);
	}
	
	public function getQuadrant(){

		return $this->hasOne(KdmQuadrant::className(), ['id' => 'quadrant_id']);
	}
	
	public function getBlock(){

		return $this->hasOne(KdmBlock::className(), ['id' => 'block_id']);
	}
	
	public function getFloor(){

		return $this->hasOne(KdmFloor::className(), ['id' => 'floor_id']);
	}
	
	public function getBooking(){
		return $this->hasOne(KdmSpaceBooking::className(), ['shop_id' => 'id']);
	}
	
	public function getExemption(){
		return $this->hasOne(KdmExemptedShops::className(), ['shop_id' => 'id']);
	}
}
