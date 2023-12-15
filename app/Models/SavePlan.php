<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'direction',
        'juz',
        'save_faces',
        'confirm_faces',
        'days',
        'is_same',
    ];
}
