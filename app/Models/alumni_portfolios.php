<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumni_portfolios extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'gender',  'dob', 'education',  'skills',  'description', 'profile_picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

