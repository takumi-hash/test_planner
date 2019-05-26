<header>
        <nav class="navbar navbar-expand-md navbar-light bg-white navbar-extend">
            <div class="container">
                <a class="navbar-brand font-weight-light" href="{{ url('/') }}">
                    <i class="far fa-bookmark"></i>
                    {{ config('app.name', 'Test Planner') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{--
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                        {!! Form::open(['route' => 'books.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                        {!! Form::text('keyword', null, ['class' => 'form-control', 'type' => 'search', 'placeholder' => 'Search Books']) !!}
                        {!! Form::button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  !!}
                        {!! Form::close() !!}
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('timeline') }}">Timeline</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('books.create') }}">Search Books</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Ranking <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('ranking.posts') }}">Posts of the month</a>
                                    <!-- <a class="dropdown-item" href="{{ route('ranking.users') }}">Dokushoka of the month</a> -->
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">My Page</a>
                                    <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">Preferences</a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
                    --}}
                </div>
            </div>
        </nav>
</header>
