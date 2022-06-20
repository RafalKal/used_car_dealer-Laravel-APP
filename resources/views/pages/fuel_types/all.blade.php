@extends('layouts.default')

@section('title', 'Fuel types')

@section('content')

    <div class="w-100">

        <h3><span class="label label-default">FUEL TYPES</span></h3>

        <br>

        {{-- NEW FUEL TYPE BUTTON --}}
        <a href="{{url('fuel_types/new')}}" class="btn btn-outline-success">New fuel type</a>

        {{-- FUEL TYPES TABLE --}}
        <table class="table w-100">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fuelTypes as $fuelType)
                <tr class="h-50">
                    <th scope="row">{{$fuelType->id}}</th>
                    <td>{{$fuelType->name}}</td>
                    <td>
                        {{-- EDIT FUEAL TYPE BUTTON --}}
                        <a class="btn btn-primary" href="{{url('fuel_types/edit/' . $fuelType->id)}}">Edit</a>
                        {{-- REMOVE FUEL TYPE BUTTON --}}
                        <a class="btn btn-outline-danger" href="{{url('fuel_types/remove/' . $fuelType->id)}}">Remove</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{  $fuelTypes->links()  }}

@stop
