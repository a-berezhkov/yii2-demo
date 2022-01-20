<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string $name
 * @property int|null $city_id
 * @property string $adress
 * @property string|null $open_at
 * @property string|null $close_at
 * @property float|null $coord_lat
 * @property float|null $coord_long
 * @property int $shop_desc
 *
 * @property City $city
 * @property ShopHasBooks[] $shopHasBooks
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'adress', 'shop_desc'], 'required'],
            [['city_id', 'shop_desc'], 'integer'],
            [['open_at', 'close_at'], 'safe'],
            [['coord_lat', 'coord_long'], 'number'],
            [['name', 'adress'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
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
            'city_id' => 'City ID',
            'adress' => 'Adress',
            'open_at' => 'Open At',
            'close_at' => 'Close At',
            'coord_lat' => 'Coord Lat',
            'coord_long' => 'Coord Long',
            'shop_desc' => 'Shop Desc',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Gets query for [[ShopHasBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShopHasBooks()
    {
        return $this->hasMany(ShopHasBooks::className(), ['shop_id' => 'id']);
    }
}
