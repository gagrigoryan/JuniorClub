<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
      'info'  => 'array'
    ];

    public function students() {
        return $this->belongsToMany(
            'App\Student',
            'product_student',
            'product_id',
            'student_id'
        );
    }

    public function teacher() {
        return $this->belongsTo('App\Teacher');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
