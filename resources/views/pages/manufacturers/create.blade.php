@extends('layouts.default')

@section('title', 'New manufacturer')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">CREATE MANUFACTURER</span></h3>

        <br>

        {{-- CREATE MANUFACTURER FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('manufacturers.new.perform')}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name">Manufacturer name</label>
                <input type="text" class="form-control form-control-lg" id="name"
                       placeholder="ex. Audi" autofocus name="name" required value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            <a href="{{url('manufacturers')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
