<nav class="navbar navbar-wrapper navbar-default navbar-fade is-fixed-top is-transparent">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <img class="switcher-logo" src="assets/img/logos/logo/bulkit-core.svg" alt="" />
            </a>

            <!-- Sidebar Trigger -->
            <a id="navigation-trigger" class="navbar-item hamburger-btn" href="javascript:void(0);">
                <span class="menu-toggle">
                    <span class="icon-box-toggle">
                        <span class="rotate">
                            <i class="icon-line-top"></i>
                            <i class="icon-line-center"></i>
                            <i class="icon-line-bottom"></i>
                        </span>
                </span>
                </span>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu">
            <div class="navbar-start">
                <a href="/" class="navbar-item has-hover scroll-link">
                    Home
                </a>

                <a href="/explore" class="navbar-item has-hover scroll-link">
                    Explore
                </a>
            </div>

            <div class="navbar-end has-hover">
                @if(!Auth::user())
                <a class="navbar-item" href="login">
                    Login
                </a>
                <div class="navbar-item">
                    <a href="register" class="button button-signup is-bold  primary-btn">Sign Up</a>
                </div>
                @else
                <div class="navbar-item">
                    <a class="button button-signup is-bold  primary-btn" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>                    
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> 
                @endif
                               
            </div>
        </div>
    </div>
</nav>