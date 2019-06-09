<!-- START NAV -->
<nav class="navbar is-info">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="../">
                Ocio, Solo Ocio
            </a>
            <span class="navbar-burger burger" data-target="navbarMenu">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-end">
                <a class="navbar-item is-active">
                    Home
                </a>
                <a class="navbar-item" href="{{ action('PlaceController@index') }}">
                    List
                </a>
                <a class="navbar-item" href="/login">
                    Entrar
                </a>
                <!--
                <a class="navbar-item">
                        Features
                    </a>
                <a class="navbar-item">
                        Team
                    </a>
                <a class="navbar-item">
                        Archives
                    </a>
                <a class="navbar-item">
                        Help
                    </a>
                -->
                @if(Auth::check())
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Cuenta
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ action('PlaceController@show',["id" => Auth::id() ]) }}">
                            Mi cuenta
                        </a>
                        @if(Auth::user()->is_admin)
                        <a class="navbar-item">
                            Administrar usuarios
                        </a>
                        @endif
                        <a class="navbar-item">
                            Settings
                        </a>
                        <hr class="navbar-divider">
                        <div class="navbar-item">
                            <a href="/logout">Salir</a>
                        </div>
                    </div>
                </div>

                @endif

            </div>
        </div>
    </div>
</nav>
<!-- END NAV -->
