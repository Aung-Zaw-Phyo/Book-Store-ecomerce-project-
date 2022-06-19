<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $with = ['category', 'user'];
    
    public function scopeFilter ($query, $filter) {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name','LIKE', '%'.$search.'%')
                            ->orWhere('author', 'LIKE', '%'.$search.'%');
            });
        });
        $query->when($filter['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        });
    }

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
    
}
