@extends('layouts.default')

@section('title', 'New transmission')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">CREATE TRANSMISSION TYPE</span></h3>

        <br>

        {{-- CREATE TRANSMISSION TYPE FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('transmissions.new.perform')}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            {{-- FULL NAME --}}
            <div class="form-group">
                <label for="full_name">Transmission full name</label>
                <input type="text" class="form-control form-control-lg" id="full_name"
                       placeholder="ex. Automatic transmission" autofocus name="full_name" required value="{{old('full_name')}}">
                @if ($errors->has('full_name'))
                    <span class="text-danger text-left">{{ $errors->first('full_name') }}</span>
                @endif
            </div>

            {{-- SHORT NAME --}}
            <div class="form-group">
                <label for="short_name">Transmission short name</label>
                <input type="text" class="form-control form-control-lg" id="short_name"
                       placeholder="ex. AT" autofocus name="short_name" required value="{{old('short_name')}}">
                @if ($errors->has('short_name'))
                    <span class="text-danger text-left">{{ $errors->first('short_name') }}</span>
                @endif
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            <a href="{{url('transmissions')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
