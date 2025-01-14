<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Geef de kolommen aan die je wilt kunnen invullen via mass assignment
    protected $fillable = ['name'];

    // Relatie met nieuwsitems (many-to-many)
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tag');
    }
}
