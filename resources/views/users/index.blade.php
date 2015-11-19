@extends('app')
@section('content')
    <h4>Master User List</h4>
    @foreach($user as $users)
        <div class="well vm">
            <div class="row">
                <div class="col-sm-8">
        <h2>{{ $users->user_name }}</h2>
                    <div class="col-sm-16 time-numbers">
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#">{{ $users->user_roles()->first()->user_role_name }}</a></li>
                            <li role="presentation"><a href="#">Student <span class="badge">{{ $users->roster_spots->count() }}</a></span></li>
                            <li role="presentation"><a href="#">Instructor <span class="badge">{{ $users->courses_taught->count() }}</a></span></li>
                        </ul>
                    </div><br>

                    @if($users->courses_taught->count() > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Courses Instructed</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills" role="tablist">
                                @foreach($users->courses_taught as $instructed)
                                    <li role="presentation"><a href="/courses/{{ $instructed->getID() }}">{{ $instructed->getName() }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    @if($users->roster_spots->count() > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Courses Enrolled</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills" role="tablist">
                                @foreach($users->roster_spots as $enrolled)
                                    @if(get_class($enrolled->course) == 'App\Course')
                                    <li role="presentation"><a href="/courses/{{ $enrolled->course->getID() }}">{{ $enrolled->course->getName() }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif


                    <ul class="nav nav-pills" role="tablist">
                        <li>
                     <form action="/users/{{$users->user_id}}/edit">
                        <input type="submit" class="btn btn-danger text-center" value="Edit">
                     </form></li>
                        <li>
                   <form action="/users/{{$users->user_id}}" method="POST">
                        {!! method_field('DELETE') !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger text-center" value="Deactivate">
                    </form></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
@stop