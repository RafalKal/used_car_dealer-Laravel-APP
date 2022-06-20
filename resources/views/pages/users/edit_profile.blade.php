@extends('layouts.default')

@section('title', 'Edit profile')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">EDIT PROFILE PARAMETERS</span></h3>

        <br>

        {{-- EDIT PROFILE FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('user.profile.edit.perform', $user->id)}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="id" value="{{ $user->id }}"/>

            {{-- EMAIL --}}
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email"
                       placeholder="Enter email" autofocus name="email" value="{{old('email') ?? $user->email}}">
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name"
                       placeholder="Enter name" name="name" value="{{old('name') ?? $user->name}}">
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            {{-- SURNAME --}}
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" class="form-control" id="surname"
                       placeholder="Enter surname" name="surname" value="{{old('surname') ?? $user->surname}}">
                @if ($errors->has('surname'))
                    <span class="text-danger text-left">{{ $errors->first('surname') }}</span>
                @endif
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-primary mt-2">Save</button>
            <a href="{{url('profile')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
