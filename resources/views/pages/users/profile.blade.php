@extends('layouts.default')

@section('title', 'Users')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">PROFILE</span></h3>

        <br>

        <div class="d-flex flex-row w-100">
            <div class="d-flex flex-column">
                <div class="username">
                    <span>{{$user->name}}</span>
                    <span>{{$user->surname}}</span>
                </div>
                <span>{{$user->email}}</span>
                <a href="{{url('logout')}}" class="link">Log out</a>
            </div>
            <div class="ms-auto">
                <a class="btn btn-primary" href="{{url('profile/edit/')}}">Edit</a>
                @if($user->roles[0]->name !== 'super-admin')
                    <a class="btn btn-outline-danger" href="{{url('profile/remove/')}}">Remove</a>
                @endif
            </div>
        </div>

        {{-- ORDER HISTORY --}}
        <h3 class="mt-3">Orders history</h3>
        <hr>
        <div class="d-flex flex-row flex-wrap">
            @foreach($user->orders as $order)
                <div class="car-card">
                    <header class="d-flex flex-column">
                        <span class="car-manufacturer">{{$order->car->model->manufacturer->name}}</span>
                        <span class="car-model">{{$order->car->model->name}}</span>
                        <span>{{$order->date}}</span>
                        <hr>
                    </header>
                    <section class="car-description d-flex flex-row gap-2">
                        <span>- {{$order->car->engine}}</span>
                        <span>{{$order->car->fuelType->name}}</span>
                    </section>
                    <section class="d-flex flex-column">
                        <span>- {{$order->car->transmissionType->full_name}}</span>
                        <span class="course">- {{$order->car->course}} km</span>
                    </section>
                </div>
            @endforeach
        </div>

    </div>
@stop
