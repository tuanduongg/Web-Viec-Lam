<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_tittle',
        'city',
        'remote',
        'parttime',
        'language',
        'salary',
        'description',
        'number_applicants',
        'status',
        'user_id',
    ];
    public function getFomatCreatedAtAttribute()
    {
        return date_format($this->created_at,"H:m d/m/Y");
    }
    public function getFomatSalaryAttribute()
    {
        return  number_format($this->salary, 0, '', ',');
    }
}
