<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'image', 'cost', 'cpu', 
                            'gpu', 'ram', 'storage', 'screen_size', 'warranty_period', 'os', 'keyboard', 
                            'pin', 'connector', 'id_category', 'id_brand', 'id_typeProduct'];

    public $timestamps = true;
    public function brands()
    {
        return $this->belongsTo(brandsModel::class, 'id_brand', 'id');
    }

    public function type_product()
    {
        return $this->belongsTo(type_productModel::class, 'id_typeProduct', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(categoriesModel::class, 'id_category', 'id');
    }
    public function cart_pro(){
        return $this->hasMany(cart_proModel::class, "id_product", "id");
    }
}