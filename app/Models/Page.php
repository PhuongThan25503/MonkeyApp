<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'page';
    protected $primaryKey='page_id';
    protected $fillable=[
        'story_id',
        'background',
        'page_num',
    ];
}
