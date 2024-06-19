@php
    $todayRegistration = \App\ApplicantsLog::whereDate('created_at', today())->count();
    $todayActivity = \App\ActivityLogs::whereDate('created_at', today())->count();
@endphp
<nav class=" navbar-default navbar-static-side" style="background: #001540;" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu" style="background: #001540;">
            <li class="nav-header" style="background-image: url('{{asset('inspinia/css/patterns/header-profile-skin-4.png')}}'); background-size: cover;">
                <div class="dropdown profile-element" align="center">
                    <span>
                    
                    @if(Auth::check() && Auth::user()->profilePic)
                         <img src="{{ asset('image/' . Auth::user()->profilePic) }}" alt="Profile Image" width="100" height="100" style="border-radius: 50%; object-fit: cover;">
                    @endif
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs text-wrap text-default"> <strong class="font-bold">{{Auth::user()->full_name}}</strong></span>
                            
                        </span>
                        <br>
                        <span class="clear">
                            <span class="m-t-xs label label-danger text-wrap">Role: {{Auth::user()->user_type}}</strong></span>
                        </span><b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li>
                                <a href="{{ route('profile.show') }}">
                                    <span class="text-navy text-wrap"><i
                                        class="fa fa-user"></i> Profile</span>
                                </a>
                            </li>
                    </ul>
                </div>
                <div class="logo-element">
                    DLOS
                </div>
            </li>

            <li class="text-wrap" id="data-entry"><a href="welcome"><i class="fa fa-home"></i>Home</a></li>

            <li class="text-wrap" id="data-entry"><a href="applicantDashboard"><i class="fa fa-server"></i>Dashboard</a></li>
            
            <li class="text-wrap" id="data-entry"><a href="ApplicantsData"><i class="fa fa-id-card"></i>Pending Applicants</a></li>
            
            <li class="text-wrap" id="data-entry"><a href="ApprovedApplicants"><i class="fa fa-users"></i> Approved Applicants</a></li>
    
            <li>
            <a href="side-nav"><i class="fa fa-th-large"></i> <span class="nav-label">Recent Activities</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
            <li>
            <a href="recent-activity">
                Registration Logs
                <span class="count badge bg-danger rounded-pill">{{$todayRegistration}}</span>
            </a>
            </li>
            @if(Auth::user()->user_type === 'ADMIN')
            <li> 
            <a href="activity-logs">
                Admin/User Logs
                <span class="badge bg-danger rounded-pill">{{$todayActivity}}</span>
            </a>
        </li>
    
    @endif
</ul>
</li>           
    </div>
</nav>
