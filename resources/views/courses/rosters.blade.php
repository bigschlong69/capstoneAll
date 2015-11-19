@extends('app')
@section('content')
    <div class="col-lg-7">
    <div class="panel panel-default">
        <div class="panel-heading">Add a Student to a Course</div>
        <div class="panel-body">
            {!! Form::open(
                [
                    'route' => 'rosters.store',
                    'class' => 'form'
                    ]
            ) !!}

            <div class="form-group">
                {!!  Form::label('course_id', 'Course: ', ['class'=>'control-label']) !!}
                {!!  Form::select('course_id', $course, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!!  Form::label('user_id', 'User To Add: ', ['class'=>'control-label']) !!}
                {!!  Form::select('user_id', $users, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add To Course',
                    array('class'=>'btn btn-primary'
                )) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@stop