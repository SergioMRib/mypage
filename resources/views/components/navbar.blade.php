<nav class="navbar is-fixed-top is-transparent" role="navigation" aria-label="main navigation">

    <div id="navbar" class="navbar-menu is-active">
      <div class="navbar-end">
        <p class="is-size-3 natural-font">Contact me</p>
        @if ($current !== 'index')
            <a class="navbar-item" href="/">
                <span class="icon">
                    <i class="fas fa-home fa-2x"></i>
                </span>
            </a>
        @endif

        <a class="navbar-item" href="{{route('contact-me')}}">
            <span class="icon">
                <i class="fas fa-at fa-2x"></i>
            </span>
        </a>

        <a class="navbar-item" href="https://github.com/SergioMRib">
            <span class="icon">
                <i class="fab fa-github fa-2x"></i>
            </span>
        </a>

        <a class="navbar-item" href="https://www.linkedin.com/in/sergribeiro/">
            <span class="icon">
                <i class="fab fa-linkedin fa-2x"></i>
            </span>
        </a>
      </div>
    </div>
</nav>



