<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%kdm_staff}}".
 *
 * @property int $id
 * @property int $staff_user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $telephone
 * @property string $gender
 * @property string $dob
 * @property string $marital_status
 * @property string $educational_qualification
 * @property string $position
 *
 * @property User $staffUser
 */
class KdmStaff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%kdm_staff}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_user_id', 'firstname', 'lastname', 'middlename', 'telephone', 'gender', 'dob', 'marital_status', 'educational_qualification', 'position'], 'required'],
            [['staff_user_id'], 'integer'],
            [['firstname', 'lastname', 'middlename', 'telephone', 'gender', 'dob', 'marital_status', 'educational_qualification', 'position'], 'string', 'max' => 255],
            [['staff_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['staff_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staff_user_id' => 'Staff User ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'middlename' => 'Middlename',
            'telephone' => 'Telephone',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'marital_status' => 'Marital Status',
            'educational_qualification' => 'Educational Qualification',
            'position' => 'Position',
        ];
    }

    /**
     * Gets query for [[StaffUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffUser()
    {
        return $this->hasOne(User::className(), ['id' => 'staff_user_id']);
    }
	
	public function getFullname()
    {
        return $this->lastname.' '.$this->firstname;
    }
}
