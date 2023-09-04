<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['ad_id', 'customer_id', 'amount', 'state', 'created_at', 'updated_at'];

    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
