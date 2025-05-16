<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    

    public function tasks():HasMany{

        return $this->hasMany(Tarea::class);
    }
}
