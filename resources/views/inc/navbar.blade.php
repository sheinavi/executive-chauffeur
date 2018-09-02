<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                <li class="nav-item {{Request::segment(1) == '' ? 'active':''}}">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bookings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/bookings">Bookings Management</a>
                        <a class="dropdown-item" href="/confirmed-bookings">Confirmed Bookings</a>
                        <a class="dropdown-item" href="/completed-bookings">Completed Bookings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/bookings/create">New Booking</a>
                    </div>
                </li>
                <li class="nav-item {{Request::segment(1) == 'clients' ? 'active':''}}">
                    <a class="nav-link" href="/clients">Clients</a>
                </li>
                <li class="nav-item {{Request::segment(1) == 'drivers' ? 'active':''}}">
                    <a class="nav-link" href="/drivers">Drivers</a>
                </li>
                <li class="nav-item {{Request::segment(1) == 'reminders' ? 'active':''}} ">
                    <a class="nav-link" href="/reminders">Reminder Settings</a>
                </li>
                <li class="nav-item {{Request::segment(1) == 'reports' ? 'active':''}}">
                    <a class="nav-link" href="/reports">Reports</a>
                </li>
                <li class="nav-item {{Request::segment(1) == 'invoice' ? 'active':''}}">
                    <a class="nav-link" href="/invoice">Invoice</a>
                </li>
                    @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                <!-- /*register link disabled for now*/
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                -->

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>