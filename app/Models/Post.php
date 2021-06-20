<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeSortByPublished($query)
    {
        return $query->orderBy('publication_date', 'DESC')->get();
    }
}
