
<aside id="navMenu" class="box menu is-hidden-mobile">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a @if ($current == "dashboard") class="is-active" @endif
                href="{{route('dashboard')}}"
            >Dashboard</a>
        </li>
    </ul>
    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        <li>
            <a @if ($current =="admins") class="is-active" @endif
                href="{{route('admins.index')}}">Admins</a>
        </li>
        <li>
            <a @if ($current =="projects") class="is-active" @endif
                href="{{route('projects.index')}}">Projects</a>
        </li>
        <li>
            <a @if ($current =="categories") class="is-active" @endif
                href="{{route('categories.index')}}">Categories</a>
        </li>
        <li>
            <a @if ($current =="tags") class="is-active" @endif
                href="{{route('tags.index')}}">Tags</a>
        </li>
    </ul>
    <p class="menu-label">
        Navigation
    </p>
    <ul class="menu-list">
        <li><a href="/">Home</a></li>
        <li>
            <a href="{{route('dashboard')}}">
                Dashboard
            </a>
        </li>
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button is-warning">Logout</button>
            </form>
        </li>
    </ul>
</aside>
