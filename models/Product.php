<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id_product
 * @property int $id_category
 * @property string $name
 * @property int $stock
 *
 * @property Category $category
 * @property ProductEntry $productEntry
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_category', 'name'], 'required'],
            [['id_category', 'stock'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'id_category' => 'Category',
            'name' => 'Name',
            'stock' => 'Stock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id_category' => 'id_category']);
    } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function findCategories()
    {
        $rows = (new \yii\db\Query())
        ->select(['category.id_category', 'category.name'])
        ->from('category')
        ->all();
        return $rows;
    }
    
    
    public function hasEntries($id_product) {
        
        $data = Yii::$app->db->createCommand("SELECT id_product FROM product_entry WHERE id_product = " . $id_product)->execute();
        if($data) {
            return true;
        }
        return false;
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductEntry()
    {
        return $this->hasOne(ProductEntry::className(), ['id_product' => 'id_product']);
    }
}
