<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;
    protected $primaryKey='author_id';
    protected $table='author';
    protected $fillable=[
        'name',
        'gender',
        'dob',
    ];
    public function Story(): HasMany{
        return $this->hasMany(Story::class, 'author_id'); // by default , it is author_id to be the foreign key, but I still declare it for make it clear
    }

}
