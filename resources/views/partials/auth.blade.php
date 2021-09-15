@guest
<div class="d-flex">
    <li style="list-style: none;font-size:18px;color:#323232" class="nav-item">
        <a style="margin-top:0px" class=" btn btn-sm btn-outline-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
    <li style="list-style: none;font-size:18px;color:#323232;align-items:center" class="nav-item ml-1">
        <a style="margin-top:0px" class=" btn btn-sm btn-outline-dark"
            href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
</div>
@else
<li style="margin-top:-8px;list-style: none;font-size:18px;color:#323232;width:260px" class="nav-item dropdown">
    <a style="color:#323232" id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i style="font-size:31px" class="fa fa-user-circle" style="color:#343a40"
            aria-label="{{ Auth::user()->name }}"></i>
    </a>

    <div class="dropdown-menu col-md-12" aria-labelledby="navbarDropdown"
        style="z-index:10000;background:transparent;border:none">
        <a class="dropdown-item p-0">
            <div class="col-md-12">
                <div class="card profile-card-3">
                    <div class="background-block">
                        <img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
                            alt="profile-sample1" class="background" />
                    </div>
                    <div class="profile-thumb-block">
                        <img src="{{asset('users/profile.jpg')}}" alt="profile-image" class="profile" />
                    </div>
                    <div class="card-content">
                        <h2> {{ Auth::user()->name }}<small>User</small></h3>
                            <div class="icon-block"><a href="{{ route('home') }}"><i
                                        class="fa fa-shopping-cart"></i></a><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"> <i
                                        class="fa fa-power-off"></i></a><a href="#"> <i
                                        class="fa fa-google-plus"></i></a>
                            </div>
                    </div>
                </div>

            </div>
        </a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</li>

@endguest
