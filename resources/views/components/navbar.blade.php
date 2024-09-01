<nav class="navbar navbar-expand-lg nav-custom  bg-transparent">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('HomePage')}}"><img class="logo-navbar" src="/layout-images/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse menu-responsive" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3" aria-current="page" href="{{ route('HomePage') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.Articles') }}
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                            <li><a class="dropdown-item"
                                    href="{{ route('article.create') }}">{{ __('ui.Insert_an_article') }}</a></li>
                            {{-- <li>
                                <hr class="dropdown-divider">
                            </li> --}}
                        @endauth
                        <li><a class="dropdown-item" href="{{ route('article.index') }}">{{ __('ui.AllArticles') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.Categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('byCategory', $category) }}">{{ __("ui.$category->name") }}</a></li>
                            {{-- @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif --}}
                        @endforeach
                    </ul>
                </li>
                @auth
                    @if (!Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link px-3" aria-current="page"
                                href="{{ route('GetRevisorPage') }}">{{ __('ui.Become_a_reviewer') }}</a>
                        </li>˙
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 freccetta-translate" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @guest
                            <span class="material-symbols-outlined icone-login-register">translate</span>
                        @endguest
                        @auth
                            <span class="material-symbols-outlined">translate</span>
                        @endauth
                    </a>
                    <ul class="dropdown-menu bg-transparent">
                        <li><x-_locale lang="it" /></li>
                        <li><x-_locale lang="en" /></li>
                        <li><x-_locale lang="de" /></li>
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">
                            <div class="d-flex flex-column user-box">
                                <span class="material-symbols-outlined icone-login-register">person</span>
                                <span class="login-register-text">Login</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('register') }}">
                            <div class="d-flex flex-column user-box">
                                <span class="material-symbols-outlined icone-login-register">person_add</span>
                                <span class="login-register-text">{{ __('ui.Register') }}</span>
                            </div>
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.Hello') }} {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">{{ __('ui.Personal_area') }}</a></li>
                            {{-- <li>
                                <hr class="dropdown-divider">
                            </li> --}}
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="dropdown-item position-relative" aria-current="page"
                                        href="{{ route('revisor.index') }}">
                                        {{ __('ui.Revisor_dashboard') }}
                                        {{-- <span class="position-absolute top-0 start-60 translate-middle badge rounded-pill bg-info"> --}}
                                        <span class="position-absolute badge rounded-pill bg-info badge-position">
                                            {{ \App\Models\Article::toBeRevisedCount() }}
                                        </span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <hr class="dropdown-divider">
                                </li> --}}
                            @endif
                            <li>
                                {{-- <a class="dropdown-item" href="" aria-current="page"
                                    onclick="event.preventDefault();document.querySelector('#form-logout').submit();">Logout</a>
                                <form id="form-logout" class="d-none" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form> --}}
                                <a class="dropdown-item" href="" aria-current="page" data-bs-target="#logoutModal"
                                    data-bs-toggle="modal">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    {{-- MODALE LOGOUT --}}
    <div class="modal modal-bg" tabindex="-1" id="logoutModal">
        <div class="modal-dialog ">
            <div class="modal-content bg-dark text-white rounded-4">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('ui.Confirm') }} LOGOUT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('ui.Confirm_logout') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-5"
                        data-bs-dismiss="modal">{{ __('ui.Close') }}</button>
                    <button type="button" class="btn btn-logout-custom">
                        <a class="text-decoration-none text-white" href="" aria-current="page"
                            onclick="event.preventDefault();document.querySelector('#form-logout').submit();">{{ __('ui.Confirm') }}</a>
                        <form id="form-logout" class="d-none" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- FINE MODALE LOGOUT --}}
</nav>
