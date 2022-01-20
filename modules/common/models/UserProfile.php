<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property string|null $fname
 * @property string|null $mname
 * @property string|null $lname
 * @property int $phone
 * @property string|null $sex
 *
 * @property User $id0
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phone'], 'required'],
            [['id', 'phone'], 'integer'],
            [['sex'], 'string'],
            [['fname', 'mname', 'lname'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Fname',
            'mname' => 'Mname',
            'lname' => 'Lname',
            'phone' => 'Phone',
            'sex' => 'Sex',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
