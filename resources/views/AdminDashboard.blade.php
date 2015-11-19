@extends('app')

@section('content')
    <div class="col-sm-16 time-numbers">
        <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active">
                    <form action="">
                        <input type="submit" class="btn btn-danger" value="Edit Account: {{ Auth::user()->user_name }}">
                    </form></li>
            <li role="presentation"><a href="#">Student <span class="badge">{{ Auth::user()->roster_spots->count() }}</a></span></li>
            <li role="presentation"><a href="#">Instructor <span class="badge">{{ Auth::user()->courses_taught->count() }}</a></span></li>
        </ul>
    </div><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Admin User Operations</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation">
                    <form action="/users/create">
                        <input type="submit" class="btn btn-danger" value="New User">
                    </form>
                </li>
                <li role="presentation">
                    <form action="/users">
                        <input type="submit" class="btn btn-danger" value="User Management">
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Admin Course Operations</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation">
                    <form action="/courses/create">
                        <input type="submit" class="btn btn-danger" value="New Course">
                    </form>
                </li>
                <li role="presentation">
                    <form action="/courses">
                        <input type="submit" class="btn btn-danger" value="Course Management">
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Admin Checkin Operations</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation">
                    Coming soon.
                </li>
            </ul>
        </div>
    </div>

@stop

