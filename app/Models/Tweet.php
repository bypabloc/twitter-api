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
        'created_by',
        'updated_by',
    ];
}
