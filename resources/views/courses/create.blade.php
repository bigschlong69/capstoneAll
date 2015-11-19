@extends('app')
@section('content')
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Create a New Course</div>
            <div class="panel-body">
                {!! Form::open(
                    [
                        'route' => 'courses.store',
                        'class' => 'form'
                        ]
                ) !!}

                <div class="form-group">
                    {!!  Form::label('course_name', 'Course Name', ['class'=>'control-label']) !!}
                    {!!  Form::text('course_name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('course_instructor', 'Course Instructor', ['class'=>'control-label']) !!}
                    {!!  Form::select('course_instructor',$instructors, null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('semester_id', 'Semester', ['class'=>'control-label']) !!}
                    {!!  Form::select('semester_id', $semesters, null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('course_time_id', 'Course Times', ['class'=>'control-label']) !!}
                    {!!  Form::select('course_time_id',$course_times, null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('course_location', 'Course Location', ['class'=>'control-label']) !!}
                    {!!  Form::text('course_location',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create New Course',
                        array('class'=>'btn btn-primary'
                    )) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop