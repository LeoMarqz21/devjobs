<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    //definiendo ese campo de tabla hacer formateado como fecha
    protected $dates = ['last_day_apply'];
    protected $fillable = [
        'salary_id',
        'category_id',
        'user_id',
        'title',
        'company',
        'last_day_apply',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class)->orderBy('created_at', 'DESC');
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
