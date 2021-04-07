<!-- <nav class="navbar navbar-expand-lg fixed-top navbar-transparent" color-on-scroll="400"> -->
<nav class="navbar navbar-expand-lg fixed-top bg-danger">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/" rel="tooltip" title="Coded by 5dmat Web" data-placement="bottom">
                5dmat Web
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/') }}">
                        Home
                    </a>
                </li>
                @foreach($pages as $page)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('front.page', ['id' => $page->id, 'slug' => trim(str_replace(' ', '_', $page->name))]) }}">
                        {{ $page->name }}
                    </a>
                </li>
                @endforeach
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categories" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categories">
                            @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('front.category', $category) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="skills" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            skills
                        </a>
                        <div class="dropdown-menu" aria-labelledby="skills">
                            @foreach($skills as $skill)
                            <a class="dropdown-item" href="{{ route('front.skill', $skill) }}">{{ $skill->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="tags" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tags
                        </a>
                        <div class="dropdown-menu" aria-labelledby="tags">
                            @foreach($tags as $tag)
                            <a class="dropdown-item" href="{{ route('front.tag', $tag->id) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Login" href="{{ route('login') }}" data-placement="bottom">
                        <i class="fa fa-sign-in"></i>
                        <p>login</p>
                        <!-- <p class="d-lg-none">login</p> -->
                    </a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Register" data-placement="bottom"  href="{{ route('register') }}">
                        <i class="fa fa-sign-in"></i>
                        <p>Register</p>
                    </a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('front.profile', ['id' => auth()->user()->id, 'slug' => slug(auth()->user()->name)]) }}">
                            Profile
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
            <form class="form-inline" action="{{ route('home') }}" method="get">
                <div class="form-group has-white">
                <input type="text" class="form-control" name="search" placeholder="Search">
                </div>
            </form>
        </div>
    </div>
</nav>
