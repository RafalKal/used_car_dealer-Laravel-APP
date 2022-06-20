@extends('layouts.default')

@section('title', 'Models')

@section('content')

    <div class="w-100">

        <h3><span class="label label-default">MODELS</span></h3>

        <br>

        {{-- CREATE MODEL BUTTON --}}
        <a href="{{url('models/new')}}" class="btn btn-outline-success">New model</a>

        {{-- ALL MODELS TABLE --}}
        <table class="table w-100">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Manufacturer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr class="h-50">
                    <th scope="row">{{$model->id}}</th>
                    <td>{{$model->name}}</td>
                    <td>{{$model->manufacturer->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('models/edit/' . $model->id)}}">Edit</a>
                        <a class="btn btn-outline-danger" href="{{url('models/remove/' . $model->id)}}">Remove</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{  $models->links()  }}

@stop
