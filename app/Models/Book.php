<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'genre', 'picture', 'description', 'user_id', 'author_id'];

    public function scopeFilter($query, array $filters) {

        if($filters['tag'] ?? false) {
            $query->where('genre', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('genre', 'like', '%' . request('search') . '%');
        }
    }

    // Relation ManyToOne to User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relation ManyToOne to Author
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
