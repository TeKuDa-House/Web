<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use SoftDeletes;

    protected $fillable = ['seller_id', 'address', 'city', 'postal_code', 'country', 'created_at', 'updated_at'];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
