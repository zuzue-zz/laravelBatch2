<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';
    protected $primaryKey = 'id';
    protected $fillable = [
        'leadnumber',
        'firsttname',
        'lastname',
        'gender_id',
        'age',
        'email',
        'country_id',
        'city_id',
        'user_id',
        'converted',
        'student_id',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }

}
