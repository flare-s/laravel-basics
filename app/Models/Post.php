<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guareded = [];

    protected $with = ['category', 'author'];

    public function category() {
        return $this->BelongsTo(Category::class);
    }

    public function author() {
        return $this->BelongsTo(User::class, "user_id");
    }

    protected function scopeFilter($query, array $filters) {
        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . $filters['search'] . '%')
        //     ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $searchValue) {
            $query->where('title', 'like', '%' . $searchValue . '%')
            ->orWhere('body', 'like', '%' . $searchValue . '%');
        });
    }


    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
