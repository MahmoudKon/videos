<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Video extends Model
{
    protected $fillable = ['name', 'des', 'meta_des', 'meta_keywords', 'youtube', 'cat_id', 'user_id', 'published', 'image'];

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cat ()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function skills ()
    {
        return $this->BelongsToMany(Skill::class, 'skills_videos');
    }

    public function tags ()
    {
        return $this->BelongsToMany(Tag::class, 'tags_videos');
    }

    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished ()
    {
        return $this->where('published', 1);
    }
}
