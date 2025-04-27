<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPhone extends Model
{
    protected $table = 'student_phones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id',
        'phone'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}


