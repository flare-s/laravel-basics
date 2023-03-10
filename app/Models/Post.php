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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected function scopeFilter($query, array $filters) {
        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . $filters['search'] . '%')
        //     ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $searchValue) {
            $query->where(fn ($query) => 
                $query->where('title', 'like', '%' . $searchValue . '%')
                ->orWhere('body', 'like', '%' . $searchValue . '%')
            );
        });

        $query->when($filters['category'] ?? false, fn($query, $category) => 

            // $query->whereExists(fn($query) =>
            //     $query->from('categories')
            //         ->whereColumn('categories.id', 'posts.category_id')
            //         ->where('categories.slug', $category)
            // ));

            // $query->whereHas('category', function ($query) use ($category) {
            //     $query->where('slug', $category);
            // })

            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) => 

            // $query->whereExists(fn($query) =>
            //     $query->from('categories')
            //         ->whereColumn('categories.id', 'posts.category_id')
            //         ->where('categories.slug', $category)
            // ));

            // $query->whereHas('category', function ($query) use ($category) {
            //     $query->where('slug', $category);
            // })

            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }


    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
