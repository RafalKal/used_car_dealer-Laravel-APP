<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOrderRequest;
use App\Http\Requests\NewTransmissionRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\UpdateTransmissionRequest;
use App\Models\Car;
use App\Models\OrderHistory;
use App\Models\TransmissionType;
use App\Models\User;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{

    public function getAll(){
        $orders = OrderHistory::paginate(5);
        $users = User::all();
        return view('pages.orders.all')->with(['orders' => $orders, 'users' => $users]);
    }


    //CREATE NEW ORDER
    public function new($id){

        $car = Car::find($id);
        $car->car_status_id = 3;
        $car->save();

        $userId = auth()->user()->id;

        $order = new OrderHistory();
        $order->user_id = $userId;
        $order->car_id = $id;
        $order->date = now();
        $order->save();

        return redirect('/');
    }

    //SHOW CREATE TRANSMISSION TYPE FORM
    public function showNew(){
        return view('pages.orders.create');
    }

    //CREATE NEW TRANSMISSION TYPE
    public function create(NewOrderRequest $request){
        OrderHistory::create($request->validated());
        return redirect('/orders');
    }

    //SHOW EDIT TRANSMISSION TYPE FORM
    public function editShow($id){
        $order = OrderHistory::where('id', $id)->first();
        return view('pages.orders.edit')->with('order', $order);
    }

    //EDIT CHOSEN TRANSMISSION TYPE
    public function edit($id, UpdateOrderRequest $request){
        $request->validated();
        $order = TransmissionType::find($id);
        $order->full_name = $request->full_name;
        $order->short_name = $request->short_name;
        $order->save();
        return redirect('/orders');
    }

    //REMOVE CHOSEN TRANSMISSION TYPE
    public function remove($id){
            OrderHistory::where('id', $id)->delete();
            return $this->getAll();
    }

}
