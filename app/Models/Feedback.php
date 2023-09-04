<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['user_id', 'ad_id', 'appreciation', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
}
