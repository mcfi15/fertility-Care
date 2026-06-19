<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'small_description',
        'description',
        'closing_date',
        'status',
        'position',
        'location',
        'eligibility',
        'type',
        'slug'
    ];
}
