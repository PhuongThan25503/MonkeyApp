<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Text extends Model
{
    use HasFactory;
    protected $table = 'text';
    protected $primaryKey = 'text_id';
    protected $fillable =[
        'text_id',
        'text',
    ];

    public function TextConfig() :HasMany{
        return $this->hasMany(TextConfig::class, 'text_id');
    }

    public function Touch_() :HasMany{
        return $this->hasMany(Touch::class, 'text_id');
    }

    public function Audio() :HasOne{
        return $this->hasOne(Audio::class, 'text_id');
    }

    public function Page() : BelongsTo{
        return $this->belongsTo(Page::class, 'text_id');
    }
}
