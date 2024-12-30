<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    //for the timestamps not automatically in into the database
    public $timestamps = false;

    protected $fillable = ['name', 'phone'];
    
    //for the table name not change to 'anggotas' by default
    public $table = "member";
}
