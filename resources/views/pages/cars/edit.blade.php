@extends('layouts.default')

@section('title', 'Edit car')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">EDIT CHOSEN CAR PARAMETERS</span></h3>

        <br>

        {{-- EDIT CAR FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('cars.edit.perform', $car->id)}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            {{-- MODEL --}}
            <div class="form-group">
                <label for="car_model_id">Model</label>
                <select class="form-control form-control-lg" id="car_model_id"
                        autofocus name="car_model_id" required>
                    @foreach($models as $modelGroup)
                        <optgroup label="{{$modelGroup[0]->manufacturer->name}}">
                            @foreach($modelGroup as $model)
                                @if($car->model->id == $model->id)
                                    <option value="{{$model->id}}" selected>{{$model->name}}</option>
                                @else
                                    <option value="{{$model->id}}">{{$model->name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            {{-- TRANSMISSION --}}
            <div class="form-group">
                <label for="transmission_type_id">Transmission type</label>
                <select class="form-control form-control-lg" id="transmission_type_id"
                        autofocus name="transmission_type_id" required>
                    @foreach($transmissions as $transmission)
                        @if($car->transmissionType->id == $transmission->id)
                            <option value="{{$transmission->id}}" selected>{{$transmission->full_name}}</option>
                        @else
                            <option value="{{$transmission->id}}">{{$transmission->full_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- FUEL TYPE --}}
            <div class="form-group">
                <label for="fuel_type_id">Fuel type</label>
                <select class="form-control form-control-lg" id="fuel_type_id"
                        autofocus name="fuel_type_id" required>
                    @foreach($fuelTypes as $fuelType)
                        @if($car->fuelType->id == $fuelType->id)
                            <option value="{{$fuelType->id}}" selected>{{$fuelType->name}}</option>
                        @else
                            <option value="{{$fuelType->id}}">{{$fuelType->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- OWNERS COUNT --}}
            <div class="form-group">
                <label for="owners_count">Owners count</label>
                <input type="number" step="1" min="1" value="{{$car->owners_count}}" class="form-control form-control-lg" id="owners_count"
                       autofocus name="owners_count" required>
            </div>

            {{-- COURSE --}}
            <div class="form-group">
                <label for="course">Course</label>
                <input type="number" step="1" min="1" value="{{$car->course}}" class="form-control form-control-lg"
                       id="course"
                       autofocus name="course" required>
            </div>

            {{-- ENGINE --}}
            <div class="form-group">
                <label for="engine">Engine</label>
                <input type="text" value="{{$car->engine}}" class="form-control form-control-lg" id="engine"
                       autofocus name="engine" required>
            </div>

            {{-- YEAR OF PRODUCTION --}}
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" step="1" min="1900" max="2022" value="{{$car->year}}" class="form-control form-control-lg"
                       id="year"
                       autofocus name="year" required>
            </div>

            {{-- PRICE --}}
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" value="{{$car->price}}" class="form-control form-control-lg" id="price"
                       autofocus name="price" required>
            </div>

            {{-- STATUS --}}
            <div class="form-group">
                <label for="car_status_id">Status</label>
                <select class="form-control form-control-lg" id="car_status_id"
                        autofocus name="car_status_id" required>
                    @foreach($statuses as $status)
                        @if($car->status->id == $status->id)
                            <option value="{{$status->id}}" selected>{{$status->name}}</option>
                        @else
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-primary mt-2">Save</button>
            <a href="{{url('/')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
