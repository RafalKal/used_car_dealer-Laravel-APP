<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\CarStatus;
use App\Models\FuelType;
use App\Models\TransmissionType;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{
    //SHOW HOMEPAGE VIEW
    public function index()
    {
        if(auth()->user() != null && auth()->user()->roles[0]->name !== 'user'){
            $cars = Car::paginate(4);
        }else{

            $cars = Car::where('car_status_id', '=' ,'1')->paginate(4);
        }

        return view('pages.home', [
            'cars' => $cars
        ]);
    }

    //SHOW 'CREATE CAR' PAGE VIEW
    public function showNew()
    {
        $models = CarModel::all()->groupBy('car_manufacturer_id');
        $transmissions = TransmissionType::all();
        $fuelTypes = FuelType::all();

        return view('pages.cars.create', [
            'models' => $models,
            'transmissions' => $transmissions,
            'fuelTypes' => $fuelTypes
        ]);
    }

    //CREATE CAR
    public function new(NewCarRequest $request)
    {
        $r = $request->validated();

        $r['year'] = Date::createFromFormat('Y', $r['year']);
        $r['car_status_id'] = 1;
        Car::create($r);
        return redirect('/');
    }

    //SHOW 'EDIT CAR' PAGE VIEW
    public function showEdit($id)
    {
        $car = Car::find($id);
        $car->year = date('Y', strtotime($car->year));
        $models = CarModel::all()->groupBy('car_manufacturer_id');
        $transmissions = TransmissionType::all();
        $fuelTypes = FuelType::all();
        $statuses = CarStatus::all();

        return view('pages.cars.edit', [
            'car' => $car,
            'models' => $models,
            'transmissions' => $transmissions,
            'fuelTypes' => $fuelTypes,
            'statuses' => $statuses
        ]);
    }

    //EDIT CHOSEN CAR
    public function edit($id, UpdateCarRequest $request){
        $r = $request->validated();
        $r['year'] = Date::createFromFormat('Y', $r['year']);
        $car = Car::find($id);
        $car->year = $r['year'];
        $car->owners_count = $r['owners_count'];
        $car->course = $r['course'];
        $car->engine = $r['engine'];
        $car->price = $r['price'];
        $car->car_status_id = $r['car_status_id'];
        $car->car_model_id = $r['car_model_id'];
        $car->transmission_type_id = $r['transmission_type_id'];
        $car->fuel_type_id = $r['fuel_type_id'];
        $car->save();
        return redirect('/');
    }

    //REMOVE CHOSEN CAR
    public function remove($id){
        Car::where('id', $id)->delete();
        return redirect('/');
    }
}
