<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Blogdanov</span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">< Blog ></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Accueil</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.show', ['id' => Auth::id()]) }}">Profil</a></li>
                            <li><a href="{{ route('article.index') }}">Gestion des articles</a></li>
                            @if(Auth()->user()->role)
                            <li><a href="{{ route('category.index') }}">Gestion des catégories</a></li>
                            @endif
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}">Déconnexion</a></li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">S'enregistrer</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>