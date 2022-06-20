<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\User;
use Illuminate\Http\Request;

class CarManufacturerController extends Controller
{
    //SHOW ALL MANUFACTURERS
    public function getAll(){
        $manufacturers = CarManufacturer::paginate(5);
        return view('pages.manufacturers.all')->with('manufacturers', $manufacturers);
    }

    //SHOW CREATE MANUFACTURER FORM
    public function showNew(){
        return view('pages.manufacturers.create');
    }

    //CREATE NEW MANUFACTURER
    public function new(NewManufacturerRequest $request){
        CarManufacturer::create($request->validated());
        return redirect('/manufacturers');
    }

    //SHOW EDIT CHOSEN MANUFACTURER FORM
    public function editShow($id){
        $manufacturer = CarManufacturer::where('id', $id)->first();
        return view('pages.manufacturers.edit')->with('manufacturer', $manufacturer);
    }

    //EDIT CHOSEN MANUFACTURER
    public function edit($id, UpdateManufacturerRequest $request){
        $request->validated();
        $manufacturer = CarManufacturer::find($id);
        $manufacturer->name = $request->name;
        $manufacturer->save();
        return redirect('/manufacturers');
    }

    //REMOVE CHOSEN MANUFACTURER
    public function remove($id){
        $model = CarModel::where('car_manufacturer_id',"=",$id)->first();
        if($model==null){
            CarManufacturer::where('id', $id)->delete();
            return $this->getAll();
        }

        return redirect()->back()->with('alert', 'Nie mozna usunac rekordu zawierajacego sie w tabeli nadrzednej');
    }

}
