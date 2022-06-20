@extends('layouts.default')

@section('title', 'Sign In')

@section('content')

    <div class="d-flex flex-column w-100">

        {{-- LOGIN FORM --}}
        <form class="w-25 m-auto" method="post" action="{{route('login.perform')}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            @include('layouts.partials.messages')

            {{-- EMAIL --}}
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Enter email" autofocus name="email" required value="{{old('email')}}">
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            {{-- PASSWORD --}}
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                       name="password" required>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>

        {{-- OPTIONAL SIGN UP BUTTON FOR GUEST --}}
        <div class="m-auto mt-2 d-flex">
            <span>Dont have an account yet?</span>
            <a href="{{url('register')}}" class="ms-2 link">Sign Up</a>
        </div>
    </div>

@stop
