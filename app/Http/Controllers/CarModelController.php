<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewManufacturerRequest;
use App\Http\Requests\NewModelRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Models\Car;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\TransmissionType;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    //SHOW ALL MODELS
    public function getAll(){
        $models = CarModel::paginate(5);
        return view('pages.models.all')->with('models', $models);
    }

    //SHOW CREATE MODEL FORM
    public function showNew(){
        $manufacturers = CarManufacturer::all();
        return view('pages.models.create', [
            'manufacturers' => $manufacturers
        ]);
    }

    //CREATE NEW MODEL
    public function new(NewModelRequest $request){
        CarModel::create($request->validated());
        return redirect('/models');
    }

    //SHOW EDIT CHOSEN MODEL FORM
    public function editShow($id){
        $model = CarModel::where('id', $id)->first();
        $manufacturers = CarManufacturer::all();
        return view('pages.models.edit', [
            'model' => $model,
            'manufacturers' => $manufacturers
        ]);
    }

    //EDIT CHOSEN MODEL
    public function edit($id, NewModelRequest $request){
        $request->validated();
        $model = CarModel::find($id);
        $model->name = $request->name;
        $model->car_manufacturer_id = $request->car_manufacturer_id;
        $model->save();
        return redirect('/models');
    }

    //REMOVE CHOSEN MODEL
    public function remove($id){
        $car = Car::where('car_model_id',"=",$id)->first();
        if($car==null){
            CarModel::where('id', $id)->delete();
            return $this->getAll();
        }

        return redirect()->back()->with('alert', 'Nie mozna usunac rekordu zawierajacego sie w tabeli nadrzednej');
    }
}
