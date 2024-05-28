<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    
    // Define the user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the job relationship if needed
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
