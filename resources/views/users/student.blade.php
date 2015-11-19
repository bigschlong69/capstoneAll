@extends('app')
@section('content')
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center"> Your Information</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Username: </label>
                        <input type="text" value="{{ $user_name }}" class="form-control-static" disabled/>
                    </div>
                     {!! Form::open(
                    [
                        'route' => ['users.update',$user_id],
                        'class' => 'form',
                        'method' => 'put',

                        ]
                    ) !!}
                         <div class="form-group">
                        <label class="control-label">Email: </label>
                        <input type="email" name="email" value="{{ $email }}" class="form-control-static"/>
                            </div>
                        {!! Form::submit('Update Email',
                        array('class'=>'btn btn-primary'
                        )) !!}
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
@stop