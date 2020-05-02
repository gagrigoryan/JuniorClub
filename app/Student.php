<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'age',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function products() {
        return $this->belongsToMany(
            'App\Product',
            'product_student',
            'student_id',
            'product_id'
        );
    }

}
