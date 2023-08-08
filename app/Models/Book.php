<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
      'Genre_id',
      'Book_Name',
      'Parallel_name',
      'Caption',
      'Author',
      'Publishing_year',
      'Number_of_pages',
    ];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
