<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pov extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'sort_order',
    ];
}
