@extends('layouts.default')

@section('title', 'Edit fuel type')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">EDIT CHOSEN FUEL TYPE</span></h3>

        <br>

        {{-- EDIT FUEL TYPE FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('fuel_types.edit.perform', $fuelType->id)}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="id" value="{{ $fuelType->id }}"/>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name">Fuel type name</label>
                <input type="text" class="form-control form-control-lg" id="name"
                       placeholder="ex. Petrol" autofocus name="name" required value="{{old('name') ?? $fuelType->name}}">
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-2">Save</button>
            <a href="{{url('fuel_types')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
