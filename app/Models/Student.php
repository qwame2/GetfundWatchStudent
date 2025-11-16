<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_num',
        'index_num',
        'receipt_num',
        'hall_name',
        'image_path'
    ];

    protected $table = 'students';
}