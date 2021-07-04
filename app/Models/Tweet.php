<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $table = 'tweets';
    protected $primaryKey  = 'id';

    protected $fillable = [
        'text',
        'user_id',
    ];

    public function createdBy()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
