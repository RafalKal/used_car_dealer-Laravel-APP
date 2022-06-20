@extends('layouts.default')

@section('title', 'Transmissions')

@section('content')

    <div class="w-100">

        <h3><span class="label label-default">TRANSMISSION TYPES</span></h3>

        <br>

        {{-- NEW TRANSMISSION TYPE FORM --}}
        <a href="{{url('transmissions/new')}}" class="btn btn-outline-success">New transmission</a>

        {{-- ALL TRANSMISSIONS TYPE TABLE --}}
        <table class="table w-100">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Full name</th>
                <th scope="col">Short name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transmissions as $transmission)
                <tr class="h-50">
                    <th scope="row">{{$transmission->id}}</th>
                    <td>{{$transmission->full_name}}</td>
                    <td>{{$transmission->short_name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('transmissions/edit/' . $transmission->id)}}">Edit</a>
                        <a class="btn btn-outline-danger" href="{{url('transmissions/remove/' . $transmission->id)}}">Remove</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
