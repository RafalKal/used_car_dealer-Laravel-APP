@extends('layouts.default')

@section('title', 'Orders')

@section('content')

    <div class="w-100">

        <h3><span class="label label-default">ORDERS</span></h3>

        <br>

{{--        --}}{{-- NEW ORDER TYPE FORM --}}
{{--        <a href="{{url('orders/new')}}" class="btn btn-outline-success">New order</a>--}}

{{--        --}}{{-- ALL ORDERS TABLE --}}
{{--        <table class="table w-100">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col">Id</th>--}}
{{--                <th scope="col">Date</th>--}}
{{--                <th scope="col">First Name</th>--}}
{{--                <th scope="col">Surname</th>--}}
{{--                <th scope="col">Car</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($orders as $order)--}}
{{--                <tr class="h-50">--}}
{{--                    <th scope="row">{{$order->id}}</th>--}}
{{--                    <td>{{$order->date}}</td>--}}
{{--                    <td>{{$order->user->name}}</td>--}}
{{--                    <td>{{$order->car->model->manufacturer->name . " " . $order->car->model->name}}</td>--}}
{{--                    <td>--}}
{{--                        <a class="btn btn-primary" href="{{url('order/edit/' . $order->id)}}">Edit</a>--}}
{{--                        <a class="btn btn-outline-danger" href="{{url('order/remove/' . $order->id)}}">Remove</a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

        {{-- ALL AVAILABLE CARS --}}
        <div class="d-flex flex-row flex-wrap gap-lg-2">
            @foreach($orders as $order)
                <div class="car-card">
                    <header class="d-flex flex-column">
                        <span class="car-manufacturer">{{$order->car->model->manufacturer->name}}</span>
                        <span class="car-model">{{$order->car->model->name}}</span>
                        <span class="car-model year"> production date: {{$order->car->year}} </span>
                        <span class="order-date"> order date: {{$order->date}} </span>
                        <span class="car-model">User ID: {{$order->user_id}}</span>
                        <hr>
                    </header>
                    <section class="car-description d-flex flex-row gap-2">
                        <span>- {{$order->car->engine}}</span>
                        <span>{{$order->car->fuelType->name}}</span>
                    </section>
                    <section class="d-flex flex-column">
                        <span class="course">- {{$order->car->course}} km</span>
                    </section>
                    <hr>
                    <span class="car-price price">{{$order->car->price}} $</span>

                </div>
            @endforeach
        </div>
    </div>

    {{  $orders->links()  }}

    <script>
        let prices = document.getElementsByClassName('price');
        for (let price of prices) {
            price.innerHTML = (price.innerHTML).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }


        let courses = document.getElementsByClassName('course');
        for (let course of courses) {
            course.innerHTML = (course.innerHTML).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }

        let years = document.getElementsByClassName('year');
        for (let year of years) {
            let date = new Date(year.innerHTML);
            year.innerHTML = date.getFullYear().toString();
        }

    </script>



@stop
