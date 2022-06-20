@extends('layouts.default')

@section('title', 'Manufacturers')

@section('content')

    <div class="w-100">

        <h3><span class="label label-default">MANUFACTURERS</span></h3>

        <br>

        {{-- NEW MANUFACTURER BUTTON --}}
        <a href="{{url('manufacturers/new')}}" class="btn btn-outline-success">New manufacturer</a>

        {{-- ALL MANUFACTURERS TABLE --}}
        <table class="table w-100">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($manufacturers as $manufacturer)
                <tr class="h-50">
                    <th scope="row">{{$manufacturer->id}}</th>
                    <td>{{$manufacturer->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('manufacturers/edit/' . $manufacturer->id)}}">Edit</a>
                        <a class="btn btn-outline-danger" href="{{url('manufacturers/remove/' . $manufacturer->id)}}">Remove</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{  $manufacturers->links()  }}

@stop
