@extends('app')
@section('content')
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Create a New User</div>
            <div class="panel-body">
                {!! Form::open(
                    [
                        'route' => 'users.store',
                        'class' => 'form'
                        ]
                ) !!}

                <div class="form-group">
                    {!!  Form::label('user_name', 'User Name:', ['class'=>'control-label']) !!}
                    {!!  Form::text('user_name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('email', 'Email:', ['class'=>'control-label']) !!}
                    {!!  Form::email('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('user_role', 'User Role', ['class'=>'control-label']) !!}
                    {!!  Form::select('user_role', $user_role, null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('password', 'Password', ['class'=>'control-label']) !!}
                    {!!  Form::password('password',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create',
                        array('class'=>'btn btn-primary'
                    )) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop