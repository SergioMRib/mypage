<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
    @auth
        <div class="navbar-brand">
            <p class="navbar-item">
                Hi, {{ Auth::user()->name }}.
            </p>
            <div class="navbar-burger burger is-hidden-tablet" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    @endauth
</nav>

