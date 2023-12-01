<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(CourseImage::class, 'course_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'course_id', 'id');
    }
}
