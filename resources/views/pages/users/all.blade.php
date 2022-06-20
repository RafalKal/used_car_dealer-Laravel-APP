@extends('layouts.default')

@section('title', 'Users')

@section('content')

    {{-- ALL USERS TABLE --}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="h-50">
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->roles[0]->name}}</td>
                <td>
                    @if(auth()->user()->id != $user->id)
                        <a class="btn btn-primary" href="{{url('users/role/change/'.$user->id)}}">Change role</a>
                        <a class="btn btn-outline-danger" href="{{url('users/remove/' . $user->id)}}">Remove</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{  $users->links()  }}

@stop
