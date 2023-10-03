<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function Story():BelongsTo{
        // this page belong to a story
        return $this->belongsTo(Story::class, 'story_id');
    }

    public function TextConfig():HasMany{
        return $this->hasMany(TextConfig::class, 'page_id', 'page_id');
    }

    public function Touch_():HasMany{
        return $this->hasMany(Touch::class, 'page_id');
    }
}
