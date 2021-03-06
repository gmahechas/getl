<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- @auth --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('macroproject.index') }}">Portafolios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('project.index') }}">Proyectos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('chapter.index') }}">Lotes de Trabajo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('activity.index') }}">Actividades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contract.index') }}">Contratos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('invoice.index') }}">Facturas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('invoice_status.index') }}">Estados Facturas</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INFORMES</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{ route('indicators.index') }}">Indicadores (Español)</a>
                                    <a class="nav-link" href="{{ route('indicators.index_french') }}">Indicateurs (Français)</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link" href="{{ route('indicators_by_months') }}">Indicadores por Meses (Español)</a>
                                    <a class="nav-link" href="{{ route('indicators_by_months_french') }}">Indicateurs par mois (Français)</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link" href="{{ route('avg_invoice_status') }}">Promedio Estados Facturas (Español)</a>
                                    <a class="nav-link" href="{{ route('avg_invoice_status_french') }}">Traitement des factures par statut (Français)</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link" href="{{ route('responsable_report') }}">Facturas por Responsable</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link" href="{{ route('count_invoice_status') }}">Numero Facturas por Estado</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link" href="{{ route('cap_report') }}">Informe CAP</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('import.index') }}">IMPORTAR</a>
                            </li>
                        {{-- @endauth --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
