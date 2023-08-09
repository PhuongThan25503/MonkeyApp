<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = 'story';
    protected $primaryKey ='story_id';
    protected $fillable =[
        'author_id',
        'type_id',
        'name',
        'thumbnail',
        'coin',
        'isActive',
    ];
}
