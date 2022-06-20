@extends('layouts.default')

@section('title', 'Sign Up')

@section('content')
    <div class="d-flex flex-column w-100">

        {{-- REGISTER FORM --}}
        <form class="w-25 m-auto" method="post" action="{{route('register.perform')}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            {{-- EMAIL --}}
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                       placeholder="Enter email" autofocus name="email" value="{{old('email')}}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small><br>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name"
                       placeholder="Enter name" name="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            {{-- SURNAME --}}
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" class="form-control" id="surname"
                       placeholder="Enter surname" name="surname" value="{{old('surname')}}">
                @if ($errors->has('surname'))
                    <span class="text-danger text-left">{{ $errors->first('surname') }}</span>
                @endif
            </div>

            {{-- PASSWORD --}}
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                       value="{{old('password')}}">
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            {{-- REAPEAT PASSWORD --}}
            <div class="form-group">
                <label for="repeat_password">Repeat password</label>
                <input type="password" class="form-control" id="repeat_password" placeholder="Repeat Password"
                       name="password_confirmation" value="{{old('password_confirmation')}}">
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>

        {{-- OPTIONAL LOGIN BUTTON FOR USERS --}}
        <div class="m-auto mt-2 d-flex">
            <span>Already have an account?</span>
            <a href="{{url('login')}}" class="ms-2 link">Sign In</a>
        </div>
    </div>

@stop
