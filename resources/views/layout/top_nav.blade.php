<style>
   .hover-text:hover {
  color: #2642fc;
}

a:hover .hover-icon,
a:hover .hover-text {
  color: #2642fc;
}
</style>

<nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <a class="navbar-minimalize minimalize-styl-2 btn btn-info" href="#"><i class="fa fa-bars"></i></a>
  </div>
  <ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="clear">
          <span class="block m-t-xs text-wrap text-default">
            <strong class="font-bold" >Welcome, {{ Auth::user()->rank }} {{ Auth::user()->full_name }}</strong>
            @if(Auth::check() && Auth::user()->profilePic)
                         <img src="{{ asset('image/' . Auth::user()->profilePic) }}" alt="Profile Image" width="35" height="35" style="border-radius: 50%; object-fit: cover;">
                    @endif
            <span class="caret"></span>
          </span>
        </span>
        
      </a>
      <ul class="dropdown-menu dropdown-user">
<li>
  <a href="{{ route('profile.show') }}">
    <span class="hover-icon"><i class="fa fa-user-circle-o"></i></span> <span class="hover-text">Profile</span>
  </a>
</li>


@if(Auth::user()->user_type === 'ADMIN')
<li >
  <a href="AdminUser" class="hover-text">
  <span class="hover-icon"><i class="fa fa-cog" aria-hidden="true"></i></span> <span class="hover-text"> User Management</span>
  </a>
</li>
@endif
<li >
  <form action="{{ route('logout') }}" method="POST" id="logout" style="margin-left: 20px;">
    @csrf
    <button type="submit" id="btn-logout" style="border: none; background: none;" class="hover-text">
      <i class="fa fa-sign-out"></i> <span >Log out</span>
    </button>
  </form>
</li>
      </ul>
    </li>
  </ul>
</nav>
</body>
</html>
