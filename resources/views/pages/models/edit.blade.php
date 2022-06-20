@extends('layouts.default')

@section('title', 'Edit model')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">EDIT CHOSEN MODEL</span></h3>

        <br>

        {{-- CREATE MODEL FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('models.edit.perform', $model->id)}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="id" value="{{ $model->id }}"/>

            {{-- NAME --}}
            <div class="form-group">
                <label for="name">Model name</label>
                <input type="text" class="form-control form-control-lg" id="name"
                       autofocus name="name" required value="{{old('name') ?? $model->name}}">
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            {{-- MANUFACTURER --}}
            <div class="form-group">
                <label for="car_manufacturer_id">Manufacturer</label>
                <select type="text" class="form-control form-control-lg" id="car_manufacturer_id"
                        autofocus name="car_manufacturer_id" required>
                    @foreach($manufacturers as $manufacturer)
                        @if($manufacturer->id == $model->manufacturer->id)
                            <option value="{{$manufacturer->id}}" selected>{{$manufacturer->name}}</option>
                        @else
                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                        @endif
                    @endforeach
                </select>
                @if ($errors->has('car_manufacturer_id'))
                    <span class="text-danger text-left">{{ $errors->first('car_manufacturer_id') }}</span>
                @endif
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-primary mt-2">Save</button>
            <a href="{{url('models')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
