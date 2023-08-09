<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'book_id'; // for default , primary is "id"

    protected $table = 'book'; // for default , table is 'books'
    /*
     * updated_at and created_at are default timestamp fields that are automatically managed by Eloquent, Laravel’s ORM. When you create a new model instance and
     *  save it to the database using the save method, Eloquent will automatically set the created_at and updated_at fields to the current date and time.
     */
    public $timestamps = false;
    // The attributes that are mass assignable
    protected $fillable = [
        'id',
        'name',
        'content',
        'image',
        'date',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'date' => 'datetime',
    ];

}
