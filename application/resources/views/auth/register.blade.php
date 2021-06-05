@include('layouts.header')

<div class="login-wrapper columns is-gapless">

    <!-- Form section -->
    <div class="column is-7">
        <div class="hero is-fullheight">
            <!-- Header -->
            <div class="hero-heading">
                <div class="auth-logo">
                    <a href="/"><img class="top-logo switcher-logo" src="assets/img/logos/logo/bulkit-core.svg" alt=""></a>
                </div>
            </div>

            <!-- Body -->
            <div class="hero-body">
                <div class="container">
                    <div class="columns">
                        <div class="column"></div>
                        <div class="column is-5">

                            <div class="auth-content">
                                <h2>Hi There.</h2>
                                <p>Please start by creating an account.</p>
                                <a href="login">Have an account? Sign In </a>
                            </div>

                            <!-- Sign up form -->
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div id="signup-form" class="login-form animated preFadeInLeft fadeInLeft">
                                    <div class="field pb-10">
                                        <div class="control has-icons-right required @error('name') has-error @enderror ">
                                            <input id="name"  name="name" class="input is-medium has-shadow" type="text" placeholder="Full Name" value="{{ old('name') }}">
                                            <span class="icon is-medium is-right">
                                                    <i class="sl sl-icon-user"></i>
                                            </span>
                                            @error('name')
                                            <small class="validation-info is-error">{{$message}}</small>  @enderror                                 
                                        </div>    
                                    </div>
                                    <div class="field pb-10">
                                        <div class="control has-icons-right required @error('email') has-error @enderror">
                                            <input id="email" name="email" class="input is-medium has-shadow" type="text" placeholder="Email Address" value="{{ old('email') }}" >
                                            <span class="icon is-medium is-right">
                                                    <i class="sl sl-icon-envelope-open"></i>
                                            </span>                                            
                                            @error('email')
                                                <small class="validation-info is-error">{{$message}}</small>  
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field pb-10">
                                        <div class="control has-icons-right required @error('password') has-error @enderror">
                                            <input id="password" name="password" class="input is-medium has-shadow" type="password" placeholder="Password">
                                            <span class="icon is-medium is-right">
                                                    <i class="sl sl-icon-lock"></i>
                                            </span>
                                            @error('password')
                                                <small class="validation-info is-error">{{$message}}</small>  
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <p class="control login">
                                        <button type="submit" class="button button-cta primary-btn btn-align-lg btn-outlined is-bold is-fullwidth rounded raised no-lh">{{ __('Register') }}</button>
                                    </p>
                                </div>
                            </form>                                                                                    
                        </div>
                        <div class="column"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image section (hidden on mobile) -->
    <div class="column login-column is-5 is-hidden-mobile hero-banner">
        <div class="hero is-fullheight is-theme-primary is-relative">
            <div class="columns has-text-centered">
                <div class="column">
                    <h2 class="title is-2 light-text">
                        Start managing now
                    </h2>
                    <h3 class="subtitle is-5 light-text">
                        Stop struggling with common tasks and focus on the real choke points. Discover a full featured HR management platform.
                    </h3>
                    <div class="mt-30 has-text-centered">
                        <a href="kit4-signup.html" class="button button-cta btn-outlined is-bold light-btn rounded">Get started Free</a>
                    </div>
                </div>
            </div>
            <img class="login-city" src="assets/img/graphics/compositions/city.svg" alt="">
        </div>
    </div>

</div>
@include('layouts.footer')
