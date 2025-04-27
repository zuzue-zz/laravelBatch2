<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymenttype extends Model
{
    protected $table = 'paymenttypes';
    protected $primaryKey = 'id';
    protected $fillable =[
        'name',
        'slug',
        'status_id',
        'user_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
