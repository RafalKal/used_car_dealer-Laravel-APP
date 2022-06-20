<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewFuelTypeRequest;
use App\Http\Requests\NewTransmissionRequest;
use App\Http\Requests\UpdateFuelTypeRequest;
use App\Http\Requests\UpdateTransmissionRequest;
use App\Models\Car;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\FuelType;
use App\Models\TransmissionType;
use Illuminate\Http\Request;

class TransmissionTypeController extends Controller
{
    //SHOW ALL TRANSMISSIONS TYPE
    public function getAll(){
        $transmissions = TransmissionType::paginate(5);
        return view('pages.transmissions.all')->with('transmissions', $transmissions);
    }

    //SHOW CREATE TRANSMISSION TYPE FORM
    public function showNew(){
        return view('pages.transmissions.create');
    }

    //CREATE NEW TRANSMISSION TYPE
    public function new(NewTransmissionRequest $request){
        TransmissionType::create($request->validated());
        return redirect('/transmissions');
    }

    //SHOW EDIT TRANSMISSION TYPE FORM
    public function editShow($id){
        $transmission = TransmissionType::where('id', $id)->first();
        return view('pages.transmissions.edit')->with('transmission', $transmission);
    }

    //EDIT CHOSEN TRANSMISSION TYPE
    public function edit($id, UpdateTransmissionRequest $request){
        $request->validated();
        $transmission = TransmissionType::find($id);
        $transmission->full_name = $request->full_name;
        $transmission->short_name = $request->short_name;
        $transmission->save();
        return redirect('/transmissions');
    }

    //REMOVE CHOSEN TRANSMISSION TYPE
    public function remove($id){
        $car = Car::where('transmission_type_id',"=",$id)->first();
        if($car==null){
            TransmissionType::where('id', $id)->delete();
            return $this->getAll();
        }

        return redirect()->back()->with('alert', 'Nie mozna usunac rekordu zawierajacego sie w tabeli nadrzednej');
    }
}
