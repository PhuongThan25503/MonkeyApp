<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $table = 'type';
    protected $primaryKey = 'type_id';
    protected $fillable = [
      'name'
    ];
    public function Story(): HasMany {
        return $this->hasMany(Type::class, 'type_id'); //for default, it's author_id , but I still write for clearance
    }
}
