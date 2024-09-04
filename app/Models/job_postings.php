<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_postings extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_description',
        'job_qualification',
        'job_location',
        'job_name',
        'job_amount',
    ];
}
