<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'review_faces',
        'days',
    ];

    public function juzs()
    {
        return $this->belongsToMany(Juz::class);
    }
}
