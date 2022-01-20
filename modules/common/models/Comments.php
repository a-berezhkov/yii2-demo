<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string|null $body
 * @property int|null $book_id
 * @property int $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $p_id
 * @property int $is_publish
 *
 * @property BookHasComment[] $bookHasComments
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by'], 'required'],
            [['id', 'book_id', 'created_by', 'updated_by', 'p_id', 'is_publish'], 'integer'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body' => 'Body',
            'book_id' => 'Book ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'p_id' => 'P ID',
            'is_publish' => 'Is Publish',
        ];
    }

    /**
     * Gets query for [[BookHasComments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookHasComments()
    {
        return $this->hasMany(BookHasComment::className(), ['comment_id' => 'id']);
    }
}
