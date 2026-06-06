<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['name', 'category_id', 'publisher_id', 'author_id', 'series_id', 'release_year', 'description', 'photo'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
