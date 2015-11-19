<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/dashboard"><img src='\images\checkinplus_logo_800x279.png' height="52" width="150"></a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="/dashboard">DASHBOARD </a></li>
            <li><a href="/users">USERS</a></li>
            <li><a href="/courses">COURSES</a></li>
            @if(Auth::user()->user_role != 1)
            <li><a href="/checkin">CHECKIN
                    @if(Auth::user()->course_checkin() != false)
                        <span class="glyphicon glyphicon-star"></span>
                    @endif</a></li>
            @endif

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <b class="navbar-text"> (Logged in as
                    @if(Auth::user()->user_role == 1)
                        <span class="glyphicon glyphicon-king"></span>
                    @elseif (Auth::user()->user_role == 2)
                        <span class="glyphicon glyphicon-apple"></span>
                    @elseif (Auth::user()->user_role == 3)
                        <span class="glyphicon glyphicon-education"></span>
                    @else
                        <span class="glyphicon glyphicon-globe"></span>
                    @endif

                    {{ Auth::user()->user_name }}
                    )
                </b></li>
            <li><a href="/logout" class="navbar-link">Logout</a></li>
        </ul>
    </div>
</nav>
