@extends('app')
@section('content')
    @foreach($course as $courses)
        <div class="well vm">
            <div class="row">
                <div class="col-sm-8">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ $courses->course_name }} -
                                    @if (get_class($courses->semester)=='App\Semester')
                                    {{ $courses->semester->getSemester() }} : {{ $courses->times->getTimes() }} {{ $courses->times->isToday() }}
                                    @endif
                                </h3>
                            </div>
                            <div class="panel-body">
                                <ul class="nav nav-pills" role="tablist">
                                    @if (get_class($courses->instructor)=='App\User')
                                        <li role="presentation">Instructor: <a href="/users/{{ $courses->instructor->getID() }}">{{ $courses->instructor->getName() }}</a></li>
                                    @else
                                        <li role="presentation"><a href="#">No Instructor Currently Assigned. </a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <h3>{{ $courses->course_semester_id }}</h3>
                    </div>
                    <div class="col-sm-4 time-numbers">
                        <form action="/rosters/{{$courses->course_id}}/edit">
                            <input type="submit" class="btn btn-danger text-center" value="Add To Roster">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop