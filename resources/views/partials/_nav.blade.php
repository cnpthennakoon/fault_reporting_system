<nav class="nav has-shadow ">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item">
                <p class="subtitle">Fault Reporting System</p>
            </a>
            <a href="/" class="nav-item is-tab is-hidden-mobile is-active">Home</a>
        </div>

        <div class="nav-right nav-menu">

            @if(Auth::check())
                <a href="{{ route('logout') }}" class="nav-item is-tab">Logout</a>
            @else
                    <a href="{{ route('login') }}" class="nav-item is-tab">Login</a>
            @endif

        </div>
    </div>
</nav>

