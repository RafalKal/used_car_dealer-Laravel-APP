<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'user_id',
        'car_id'
    ];

    public function user(){
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function car(){
        return $this->belongsTo(Car::Class, 'car_id');
    }
}
