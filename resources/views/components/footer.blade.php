
{{-- Website Carbon Badge --}}
<footer class="footer is-transparent">
    @if ($current === 'index')
        <div class="content has-text-centered">
            <div id="wcb" class="carbonbadge wcb"></div>
            <script src="https://unpkg.com/website-carbon-badges@1.1.1/b.min.js" defer></script>
        </div>
        <div class="content has-text-centered climate-clock">
            <script src="https://climateclock.world/widget-v2.js" async></script>
            <script src="https://climateclock.world/flatten.js" async></script>
            <climate-clock />
        </div>
    @endif
    
</footer>
