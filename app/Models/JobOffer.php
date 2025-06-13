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

    /**
     * Get the category associated with the job offer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category, $this>
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the salary for the job offer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Salary, $this>
     */
    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    /**
     * Get the recruiter for the job offer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, $this>
     */
    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the candidates for the job offer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User, $this>
     */
    public function candidates()
    {
        return $this->belongsToMany(User::class, 'job_applications')
                    ->withTimestamps();
    }
}
