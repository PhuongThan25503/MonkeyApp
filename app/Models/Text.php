<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Text extends Model
{
    use HasFactory;
    protected $table = 'text';
    protected $primaryKey = 'text_id';
    protected $fillable =[
        'text',
    ];

    public function TextConfig() :HasMany{
        return $this->hasMany(TextConfig::class, 'text_id');
    }

    public function Touch_() :HasMany{
        return $this->hasMany(Touch::class, 'text_id');
    }

    public function Audio() :HasMany{
        return $this->hasMany(Audio::class, 'text_id');
    }
}
