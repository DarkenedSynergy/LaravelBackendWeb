<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    protected $fillable = ['category_id', 'question', 'answer'];

    // Relatie met Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

