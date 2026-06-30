<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail_path',
        'tech_stack',
        'live_url',
        'github_url',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];
}
