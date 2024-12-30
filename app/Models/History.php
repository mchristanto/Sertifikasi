<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history'; // Specify the correct table name

    protected $fillable = [
        'tgl_pinjam',   // Borrow date
        'tgl_kembali',  // Return date
        'status',       // Status (borrowed/returned)
        'book_id',      // Foreign key for Book
        'member_id',    // Foreign key for Member
    ];

    // Define relationship with the Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    // Define relationship with the Book model
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
