<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'title',
        'company',
        'due_date',
        'description',
        'image',
        'published',
        'user_id',
        'salary_id',
        'category_id',
    ];

    protected $casts = ['due_date' => 'date'];
}
