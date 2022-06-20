@extends('layouts.default')

@section('title', 'Change role')

@section('content')

    <div class="d-flex flex-column w-100">

        <h3><span class="label label-default">CHANGE USER'S ROLE</span></h3>

        <br>

        {{-- EDIT USER (ROLE) FORM --}}
        <form class="w-50 m-auto" method="post" action="{{route('users.role.change.perform', $user->id)}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="id" value="{{ $user->id }}"/>

            {{-- ROLE --}}
            <div class="form-group">
                <label for="role">User role</label>
                <select class="form-control" id="role"
                        autofocus name="role">
                    @foreach($roles as $role)
                        @if($role->name != 'super-admin')
                            @if($user->roles[0]->name == $role->name)
                                <option value="{{$role->name}}" selected>{{$role->name}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
                @if ($errors->has('role'))
                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                @endif
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-primary mt-2">Save</button>
            <a href="{{url('users')}}" type="submit" class="btn btn-outline-danger mt-2">Cancel</a>
        </form>


    </div>

@stop
