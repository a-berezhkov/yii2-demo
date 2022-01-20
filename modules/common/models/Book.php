<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string|null $isbn
 * @property float|null $price
 * @property string|null $img
 * @property string|null $book_desc
 * @property string $created_at
 * @property string $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $category_id
 * @property int|null $izdat_id
 *
 * @property BookHasAuthor[] $bookHasAuthors
 * @property BookHasComment[] $bookHasComments
 * @property BookHasGenre[] $bookHasGenres
 * @property Category $category
 * @property Izdat $izdat
 * @property ShopHasBooks[] $shopHasBooks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['name', 'book_desc'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'category_id', 'izdat_id'], 'integer'],
            [['isbn', 'img'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['izdat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Izdat::className(), 'targetAttribute' => ['izdat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'isbn' => 'Isbn',
            'price' => 'Price',
            'img' => 'Img',
            'book_desc' => 'Book Desc',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'category_id' => 'Category ID',
            'izdat_id' => 'Izdat ID',
        ];
    }

    /**
     * Gets query for [[BookHasAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookHasAuthors()
    {
        return $this->hasMany(BookHasAuthor::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[BookHasComments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookHasComments()
    {
        return $this->hasMany(BookHasComment::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[BookHasGenres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookHasGenres()
    {
        return $this->hasMany(BookHasGenre::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Izdat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIzdat()
    {
        return $this->hasOne(Izdat::className(), ['id' => 'izdat_id']);
    }

    /**
     * Gets query for [[ShopHasBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShopHasBooks()
    {
        return $this->hasMany(ShopHasBooks::className(), ['book_id' => 'id']);
    }
}
