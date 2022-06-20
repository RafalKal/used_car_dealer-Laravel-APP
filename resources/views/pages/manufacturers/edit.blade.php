@extends('layouts.default')

@section('title', 'Edit manufacturer')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">EDIT CHOSEN MANUFACTURER</span></h3>

        <br>

        {{-- EDIT MANUFACTURER FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('manufacturers.edit.perform', $manufacturer->id)}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="id" value="{{ $manufacturer->id }}"/>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name">Manufacturer name</label>
                <input type="text" class="form-control form-control-lg" id="name"
                       placeholder="ex. Audi" autofocus name="name" required value="{{old('name') ?? $manufacturer->name}}">
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-2">Save</button>
            <a href="{{url('manufacturers')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
