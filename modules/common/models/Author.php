<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $fname
 * @property string $mname
 * @property string $lname
 *
 * @property BookHasAuthor[] $bookHasAuthors
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname', 'mname', 'lname'], 'required'],
            [['fname', 'mname', 'lname'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[BookHasAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookHasAuthors()
    {
        return $this->hasMany(BookHasAuthor::className(), ['author_id' => 'id']);
    }
}
