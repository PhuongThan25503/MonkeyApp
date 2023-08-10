<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Audio extends Model
{
    use HasFactory;
    protected $table = 'audio';
    protected $primaryKey = 'audio_id';
    protected $fillable = [
        'audio',
        'text_id',
    ];

    public function Text():BelongsTo{
        return $this->belongsTo(Text::class, 'audio_id');
    }
}
