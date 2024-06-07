<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with JobType
    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function applications() {
        return $this->hasMany(JobApplication::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
