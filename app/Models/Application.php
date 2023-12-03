<?php

// app/Models/Application.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $fillable = [
        'user_id',
        'status_id',
        'evaluation_id',
        'subject_at_matter',
        'bank_statement',
        'iban',
        'debt_slip'
    ];

    // Define the relationships if needed
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');

    }
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'evaluation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

