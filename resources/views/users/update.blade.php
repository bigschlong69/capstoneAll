@extends('app')
@section('content')
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading text-center"><b>Update User {{ $user->user_name}}</b></div>
            <div class="panel-body">

                {!! Form::open(
                    [
                        'route' => ['users.update',$user->user_id],
                        'class' => 'form',
                        'method' => 'put',

                        ]
                ) !!}

                <!--<fieldset class="form-group">-->
                <!--    {!!  Form::label('email', 'Email:', ['class'=>'control-label']) !!}-->
                <!--    {!!  Form::email('email',$user->email,['class'=>'form-control']) !!}-->
                <!--</fieldset>-->
                <fieldset class="form-group">
                    {!!  Form::label('user_role', 'User Role: ', ['class'=>'control-label']) !!}
                    {!!  Form::select('user_role', $user_roles , null, ['class'=>'form-control']) !!}
                </fieldset>
                <fieldset class="form-group">
                    {!! Form::submit('Update user',
                        array('class'=>'btn btn-primary'
                    )) !!}
                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop