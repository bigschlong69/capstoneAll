@extends('app')
@section('content')
    @foreach($user as $users)
        <div class="well vm">
            <div class="row">
                <div class="col-sm-8">
        <h2>{{ $users->user_name }}</h2>
                    <div class="col-sm-4 time-numbers">
                        <h3>{{ $users->user_roles()->first()->user_role_name }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop