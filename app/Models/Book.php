<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Specify the new table name
    protected $table = 'book';

    

    // Define fillable attributes
    protected $fillable = ['title', 'author', 'stock'];
}
