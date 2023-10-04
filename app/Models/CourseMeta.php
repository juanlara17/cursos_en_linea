<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMeta extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
