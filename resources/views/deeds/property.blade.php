<div class="deed deed-property">
    <div class="deed-inner">

        <div class="deed-header @yield('group') @yield('extra')">
            <div class="deed-subtitle">@yield('subtitle')</div>
            <h2 class="deed-title">@yield('title')</h2>
        </div>

        <div class="deed-body">
            @yield('details')
        </div>
        
    </div>
</div>