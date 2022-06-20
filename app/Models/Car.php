<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Car extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'year',
        'owners_count',
        'course',
        'engine',
        'price',
        'car_status_id',
        'car_model_id',
        'transmission_type_id',
        'fuel_type_id'
    ];

    public function status(){
        return $this->belongsTo(CarStatus::Class, 'car_status_id');
    }

    public function model(){
        return $this->belongsTo(CarModel::Class, 'car_model_id');
    }

    public function transmissionType(){
        return $this->belongsTo(TransmissionType::Class, 'transmission_type_id');
    }

    public function fuelType(){
        return $this->belongsTo(FuelType::class, 'fuel_type_id');
    }

    public function order(){
        return $this->belongsTo(OrderHistory::Class, 'order_id');
    }
}
