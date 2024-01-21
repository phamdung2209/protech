<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_proModel extends Model
{
    use HasFactory;
    protected $table = "cart_pro";
    protected $primaryKey = "id";
    protected $fillable = ['id_cart', 'id_product'];
    public function cart(){
        return $this->belongsTo(cartModel::class, 'id', 'id_cart');
    }
    public function product(){
        return $this->belongsTo(productsModel::class, 'id', 'id_cart');
    }
}
