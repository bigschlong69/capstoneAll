@extends('app')
@section('content')
    <h1>Checkin</h1>
    {!! Form::open(
        [
            'route' => 'checkins.store',
            'class' => 'form',
            'id' => 'checkin'
            ]
    ) !!}
    @if(isset($courseID))
        {{ App\Checkin::checkinator() }}
        <div class="form-group">
            {!!  Form::hidden('course_id', Auth::User()->course_checkin()->course_id ,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!!  Form::hidden('user_id', Auth::User()->user_id ,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <input type="hidden" name="checkin_longitude" id="checkin_longitude" value="">
        </div>
        <div class="form-group">
            <input type="hidden" name="checkin_latitude" id="checkin_latitude" value="">
        </div>
    <div class="form-group">
        <input type="button" value="Checkin" onclick="getLocation()" class="btn btn-primary">
    </div>
    {!! Form::close() !!}
    @else
        You cannot checkin to any courses right now.
    @endif
        <div class="well vm">
            <div class="row">
                <div class="col-sm-8">
                    <h2>CHECKINS</h2>
                    <div class="col-sm-4 time-numbers">
                        <h3>GEOLOCATION</h3>
                        <div class="col-sm-8">
                            <p id="demo"></p>
                            <script>
                                var x = document.getElementById("demo");

                                function getLocation(){
                                    if(navigator.geolocation){
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                    } else {
                                        x.innerHTML = "Geolocation is not supported.";
                                    }

                                    function showPosition(position){
                                        $('#checkin_longitude').val(position.coords.longitude);
                                        $('#checkin_latitude').val(position.coords.latitude);
                                        x.innerHTML = "Latitude / Longitude: " + position.coords.latitude + " " + position.coords.longitude;

                                        document.getElementById('checkin').submit();
                                    }
                                }
                            </script>

                        </div>
                    </div>

                </div>
            </div>
        </div>
@stop