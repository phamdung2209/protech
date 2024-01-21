<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_proModel extends Model
{
    use HasFactory;
    protected $table = 'order_pro';
    protected $primaryKey = 'id';
    protected $fillable = ['id_order', 'id_product'];
    public $timestamps = true;
}
