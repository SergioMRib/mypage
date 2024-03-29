{{-- styles in custom.css --}}

<div class="social-icons is-transparent">
    <div class="grid">
        @if ($current === 'index')
            <p class="float-appeal is-size-3 natural-font">Contact me</p>
            
        @else
            <a href="/">
                <span class="icon">
                    <i class="fas fa-home fa-2x"></i>
                </span>
            </a>
        @endif
        

        <a class="social-icon" href="{{route('contact-me')}}">
            <span class="icon">
                <i class="fas fa-at fa-2x"></i>
            </span>
        </a>

        <a href="https://github.com/SergioMRib" target="_blank" rel="noopener noreferrer">
            <span class="icon">
                <i class="fab fa-github fa-2x"></i>
            </span>
        </a>

        <a href="https://www.linkedin.com/in/sergribeiro/" target="_blank" rel="noopener noreferrer">
            <span class="icon">
                <i class="fab fa-linkedin fa-2x"></i>
            </span>
        </a>
    </div>
</div>



