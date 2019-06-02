<header>
        <nav class="navbar navbar-expand-md navbar-light bg-white navbar-extend">
            <div class="container">
                <a class="navbar-brand font-weight-light" href="{{ url('/') }}">
                    <!-- i class="far fa-bookmark"></i -->
                    {{ config('app.name', 'AB Test Planner') }}
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
                    --}}
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">このサイトについて</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
</header>
