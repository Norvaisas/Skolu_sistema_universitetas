<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{

    protected $fillable = [
        'begin_date',
        'end_date',
        'module_id'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function applications(){
        return $this->hasMany(Application::class, 'evaluation_id');
    }
}

