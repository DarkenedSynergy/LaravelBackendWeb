<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name'];

    // Relatie met FAQ's
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
