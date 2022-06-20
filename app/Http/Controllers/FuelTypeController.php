<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewFuelTypeRequest;
use App\Http\Requests\NewManufacturerRequest;
use App\Http\Requests\UpdateFuelTypeRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Models\Car;
use App\Models\CarManufacturer;
use App\Models\FuelType;
use Illuminate\Http\Request;

class FuelTypeController extends Controller
{
    //SHOW ALL FUEL TYPES
    public function getAll(){
        $fuelTypes = FuelType::paginate(5);
        return view('pages.fuel_types.all')->with('fuelTypes', $fuelTypes);
    }

    //SHOW CREATE FUEL TYPE FORM
    public function showNew(){
        return view('pages.fuel_types.create');
    }

    //CREATE NEW FUEL TYPE
    public function new(NewFuelTypeRequest $request){
        FuelType::create($request->validated());
        return redirect('/fuel_types');
    }

    //SHOW EDIT FORM CHOSEN FUEL TYPE
    public function editShow($id){
        $fuelType = FuelType::where('id', $id)->first();
        return view('pages.fuel_types.edit')->with('fuelType', $fuelType);
    }

    //EDIT CHOSEN FUEL TYPE
    public function edit($id, UpdateFuelTypeRequest $request){
        $request->validated();
        $fuelType = FuelType::find($id);
        $fuelType->name = $request->name;
        $fuelType->save();
        return redirect('/fuel_types');
    }
    //REMOVE CHOSEN FUEL TYPE
    public function remove($id){
        $car = Car::where('fuel_type_id',"=",$id)->first();
        if($car==null){
            FuelType::where('id', $id)->delete();
            return $this->getAll();
        }

        return redirect()->back()->with('alert', 'Nie mozna usunac rekordu zawierajacego sie w tabeli nadrzednej');
    }
}
