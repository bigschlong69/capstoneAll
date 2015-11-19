@extends('app')
@section('content')
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Courses You Are Enrolled In</div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <th class="text-center">Course Name</th>
                    @foreach ($data as $course)
                        <tr>
                            <td class="text-center">{{ $course->course_name }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop