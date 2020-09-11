<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
    @auth
        <div class="navbar-brand">
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start">
                <!-- Authentication Links -->

                <p class="navbar-item">
                    Hi, {{ Auth::user()->name }}.
                </p>

                <a href="{{route('dashboard')}}" class="navbar-item">
                    Dashboard
                </a>

                <div class="navbar-item" >
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button warning">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</nav>



