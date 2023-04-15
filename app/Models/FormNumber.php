<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormNumber extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'formnumbers';

    protected $fillable = [
        'details',
        'phone_number',
        'name',
        'note',
        'address',
        'seen',
    ];
}
