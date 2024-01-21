<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giftcodeModel extends Model
{
    use HasFactory;

    protected $table = 'giftcode';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'detail', 'expired'];

    public function account() {
        return $this->hasMany(accountModel::class, 'id_giftcode', 'id');
    }
}
