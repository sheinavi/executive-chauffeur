<!-- nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/"><img src="https://executive-chauffeur.com/wp-content/uploads/2013/04/64.ico" alt="executive-chauffeur" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{Request::is('/') ? 'active': ''}}">
                <a class="nav-link" href="/">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bookings
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/bookings-management">Bookings Management</a>
                    <a class="dropdown-item" href="/confirmed-bookings">Confirmed Bookings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/completed-bookings">Completed Bookings</a>

                </div>
            </li>
            <li class="nav-item {{Request::is('/clients') ? 'active': ''}}">
                <a class="nav-link" href="/clients">Clients</a>
            </li>
            <li class="nav-item {{Request::is('/drivers') ? 'active': ''}}">
                <a class="nav-link" href="/drivers">Drivers</a>
            </li>
            <li class="nav-item {{Request::is('/reminder') ? 'active': ''}}">
                <a class="nav-link" href="/reminder">Reminder Settings</a>
            </li>
            <li class="nav-item {{Request::is('/reports') ? 'active': ''}}">
                <a class="nav-link" href="/reports">Reports</a>
            </li>
            <li class="nav-item {{Request::is('/invoice') ? 'active': ''}}">
                <a class="nav-link" href="/invoice">Invoice</a>
            </li>




        </ul>


            <a class="btn btn-outline-success" href="/login">Admin Login</a>&nbsp; | &nbsp;



    </div>
</nav -->

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html"><img src="https://executive-chauffeur.com/wp-content/uploads/2013/04/64.ico" alt="{{config('app.name','Executive Chauffeur')}}" /></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>



    <p class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <a class="btn btn-outline-success" href="/login">Admin Login</a>
    </p>

</nav>