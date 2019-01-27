<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_entry".
 *
 * @property int $id_product_entry
 * @property int $id_product
 * @property int $amount
 *
 * @property Product $product
 */
class ProductEntry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_entry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'amount'], 'required'],
            [['id_product', 'amount'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id_product']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product_entry' => 'Id Product Entry',
            'id_product' => 'Product',
            'amount' => 'Amount',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function findProducts()
    {
        $rows = (new \yii\db\Query())
        ->select(['product.id_product', 'product.name'])
        ->from('product')
        ->all();
        return $rows;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }
}
