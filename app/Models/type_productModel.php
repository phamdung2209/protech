<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_productModel extends Model
{
    use HasFactory;

    protected $table = 'type_product';
    protected $primaryKey = 'id';
    protected $fillable = ['type','description'];

    public function products(){
        return $this->hasMany(productsModel::class, 'id_typeProduct');
    }
}
