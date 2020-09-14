

<aside id="navMenu" class="box menu is-hidden-mobile">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li><a class="is-active">Dashboard</a></li>
    </ul>
    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        <li><a>Admins</a></li>
        <li><a>Articles</a></li>
        <li><a>Categories</a></li>
    </ul>
    <p class="menu-label">
        Navigation
    </p>
    <ul class="menu-list">
        <li><a href="/">Home</a></li>
    </ul>
    <ul class="menu-list">
        <li>
            <a href="{{route('dashboard')}}">
                Dashboard
            </a>
        </li>
    </ul>


    <ul class="menu-list" >
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="button is-warning">Logout</button>
        </form>
    </ul>
</aside>
