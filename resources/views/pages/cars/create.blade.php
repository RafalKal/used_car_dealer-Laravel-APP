@extends('layouts.default')

@section('title', 'New car')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">CREATE CAR</span></h3>

        <br>

        {{-- CREATE CAR FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('cars.new.perform')}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            {{-- MODEL --}}
            <div class="form-group">
                <label for="car_model_id">Model</label>
                <select class="form-control form-control-lg" id="car_model_id"
                        autofocus name="car_model_id" required>
                    @foreach($models as $modelGroup)
                        <optgroup label="{{$modelGroup[0]->manufacturer->name}}">
                            @foreach($modelGroup as $model)
                                <option value="{{$model->id}}">{{$model->name}}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            {{-- TRANSMISSION TYPE --}}
            <div class="form-group">
                <label for="transmission_type_id">Transmission type</label>
                <select class="form-control form-control-lg" id="transmission_type_id"
                        autofocus name="transmission_type_id" required>
                    @foreach($transmissions as $transmission)
                        <option value="{{$transmission->id}}">{{$transmission->full_name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- FUEL TYPE --}}
            <div class="form-group">
                <label for="fuel_type_id">Fuel type</label>
                <select class="form-control form-control-lg" id="fuel_type_id"
                        autofocus name="fuel_type_id" required>
                    @foreach($fuelTypes as $fuelType)
                        <option value="{{$fuelType->id}}">{{$fuelType->name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- OWNERS COUNT --}}
            <div class="form-group">
                <label for="owners_count">Owners count</label>
                <input type="number" step="1" min="1" value="1" class="form-control form-control-lg" id="owners_count"
                       autofocus name="owners_count" required>
            </div>

            {{-- COURSE --}}
            <div class="form-group">
                <label for="course">Course</label>
                <input type="number" step="1" min="1" placeholder="ex. 120000" class="form-control form-control-lg"
                       id="course"
                       autofocus name="course" required>
            </div>

            {{-- ENGINE --}}
            <div class="form-group">
                <label for="engine">Engine</label>
                <input type="text" placeholder="ex. 1.8 TSI" class="form-control form-control-lg" id="engine"
                       autofocus name="engine" required>
            </div>

            {{-- YEAR OF PRODUCTION --}}
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" step="1" min="1900" max="2022" value="2020" class="form-control form-control-lg"
                       id="year"
                       autofocus name="year" required>
            </div>

            {{-- PRICE --}}
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" placeholder="ex. 10000" class="form-control form-control-lg" id="price"
                       autofocus name="price" required>
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            <a href="{{url('/')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
