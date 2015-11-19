@extends('app')
@section('content')
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Student Operations</h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation">
                        <form action="/users">
                            <input type="submit" class="btn btn-danger" value="User Profile">
                        </form>
                    </li>
                    <li role="presentation">
                        <form action="/courses">
                            <input type="submit" class="btn btn-danger" value="Courses you are Registered for">
                        </form>
                    </li>
                    <li role="presentation">
                        <form action="/checkins">
                            <input type="submit" class="btn btn-danger" value="Check In">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop

