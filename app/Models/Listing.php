<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'roles',
        'job_type',
        'address',
        'salary',
        'application_close_date',
        'feature_image',
        'slug'
    ];
}
