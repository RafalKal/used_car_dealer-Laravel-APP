@extends('layouts.default')

@section('title', 'Home')

@section('content')

    <div>

{{--        'year',--}}
{{--        'owners_count',--}}
{{--        'course',--}}
{{--        'engine',--}}
{{--        'price',--}}
{{--        'car_status_id',--}}
{{--        'car_model_id',--}}
{{--        'transmission_type_id',--}}
{{--        'fuel_type_id'--}}

        <h3><span class="label label-default">AVAILABLE CARS</span></h3>

        <br>

        {{-- FEATURE (NEW CAR BUTTON) FOR ADMIN --}}
        @can('admin')
            <a href="{{url('cars/new')}}" class="btn btn-outline-success mb-2">New car</a>
        @endcan

        {{-- ALL AVAILABLE CARS --}}
        <div class="d-flex flex-row flex-wrap gap-lg-2">
            @foreach($cars as $car)
                <div class="car-card">
                    <header class="d-flex flex-column">
                        <span class="car-manufacturer">{{$car->model->manufacturer->name}}</span>
                        <span class="car-model">{{$car->model->name}}</span>
                        <span class="car-model year">{{$car->year}}</span>
                        @can('admin')
                            <span>{{$car->status->name}}</span>
                        @endcan
                        <hr>
                    </header>
                    <section class="car-description d-flex flex-row gap-2">
                        <span>- {{$car->engine}}</span>
                        <span>{{$car->fuelType->name}}</span>
                    </section>
                    <section class="d-flex flex-column">
                        <span>- {{$car->transmissionType->full_name}}</span>
                        <span class="course">- {{$car->course}} km</span>
                        <span>- {{$car->owners_count}} owners</span>
                    </section>
                    <hr>
                    <span class="car-price price">{{$car->price}} $</span>

                    {{-- ORDER BUTTON --}}
                    @if(auth()->user() !== null)
                        <a class="btn btn-outline-warning w-100 mt-2" href="{{url('order/new/' . $car->id)}}">Order</a>
                        {{-- FEATURES (EDIT, REMOVE) FOR ADMIN  --}}
                        @can('admin')
                            <a class="btn btn-primary w-100 mt-2" href="{{url('cars/edit/' . $car->id)}}">Edit</a>
                            <a class="btn btn-danger w-100 mt-2" href="{{url('cars/remove/' . $car->id)}}">Remove</a>
                        @endcan
                    @endif

                </div>
            @endforeach
        </div>
    </div>
    {{  $cars->links()  }}

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
