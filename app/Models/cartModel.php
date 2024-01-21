<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartModel extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $primaryKey = "id";
    protected $fillable = ['quantity', 'id_user'];
    public $timestamps = true;
    public function cart_pro()
    {
        return $this->hasMany(cart_proModel::class, "id_cart", "id");
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'id_user');
    }


}