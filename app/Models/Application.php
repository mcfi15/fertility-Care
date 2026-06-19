<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'application';

    protected $fillable = [
        'job_title',
        'firstname',
        'middlename',
        'lastname',
        'position',
        'email',
        'phone',
        'coverletter',
        'cv',
        'other'
    ];
}
