<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Touch extends Model
{
    use HasFactory;
    protected $table = 'touch';
    protected $primaryKey = 'touch_id';

    protected $fillable = [
        'page_id',
        'text_id',
        'data',
    ];

    public function Page():BelongsTo{
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function Text():BelongsTo{
        return $this->belongsTo(Text::class, 'text_id');
    }
}
