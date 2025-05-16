<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'due_date',
        'project_id'
    ];

    public function project():BelongsTo{

        return $this->belongsTo(Proyecto::class);
    }
}
