@extends('layouts.default')

@section('title', 'New fuel type')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">CREATE FUEL TYPE</span></h3>

        <br>

        {{-- CREATE FUEL TYPE FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('fuel_types.new.perform')}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name">Fuel type name</label>
                <input type="text" class="form-control form-control-lg" id="name"
                       placeholder="ex. Petrol" autofocus name="name" required value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            <a href="{{url('fuel_types')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
