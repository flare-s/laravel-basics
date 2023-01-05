<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guareded = [];

    public function category() {
        return $this->BelongsTo(Category::class);
    }


    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
