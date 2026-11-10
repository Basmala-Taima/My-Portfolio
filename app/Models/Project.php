<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'slug', 'short_description', 'description', 'category', 'tech_stack', 'image', 'github_url', 'demo_url', 'is_featured', 'is_published', 'sort_order'];
    protected $casts = ['tech_stack' => 'array', 'is_featured' => 'boolean', 'is_published' => 'boolean'];
}
