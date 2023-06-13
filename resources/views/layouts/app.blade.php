<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.main', 'Главная') }}</title>
    <title>{{ config('app.users', 'Пользователи') }}</title>
    <title>{{ config('app.doctors', 'Врачи') }}</title>
    <title>{{ config('app.specializations', 'Специализации') }}</title>
    <title>{{ config('app.schedules', 'Расписание') }}</title>
    <title>{{ config('app.patientSchedules', 'Расписание') }}</title>
    <title>{{ config('app.patientAppointment', 'Мои записи на прием') }}</title>
    <title>{{ config('app.doctorSchedules', 'Расписание') }}</title>
    <title>{{ config('app.doctorAppointment', 'Записи ко мне') }}</title>

    {{-- connected bootstrap and js --}}
    {{-- @include('layouts.cdn') --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- connected bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- connected js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.main', 'Главная') }}
                </a>
                {{-- @can('view', auth()->user())
                <a class="navbar-brand" href="{{ route('patient.schedule.index') }}">
                    {{ config('app.patientSchedules', 'Расписание') }}
                </a>
                 @elsecan('view', auth()->user())
                <a class="navbar-brand" href="{{ route('admin.user.index') }}">
                    {{ config('app.users', 'Пользователи') }}
                </a>
                <a class="navbar-brand" href="{{ route('admin.doctor.index') }}">
                    {{ config('app.doctors', 'Врачи') }}
                </a>
                <a class="navbar-brand" href="{{ route('admin.specialization.index') }}">
                    {{ config('app.specializations', 'Специализации') }}
                </a>
                <a class="navbar-brand" href="{{ route('admin.schedule.index') }}">
                    {{ config('app.schedules', 'Расписание') }}
                </a>
                @endcan --}}
            @auth
                @if(auth()->user()->role==='patient')
                    <a class="navbar-brand" href="{{route('patient.schedule.index')}}">
                        {{ config('app.patientSchedules', 'Расписание') }}
                    </a>
                    <a class="navbar-brand" href="{{route('patient.appointment.index')}}">
                        {{ config('app.patientAppointment', 'Мои записи на прием') }}
                    </a>
                @elseif(auth()->user()->role==='doctor')
                    <a class="navbar-brand" href="{{route('doctor.schedule.index')}}">
                        {{ config('app.doctorSchedules', 'Расписание') }}
                    </a>
                    <a class="navbar-brand" href="{{route('doctor.appointment.index')}}">
                        {{ config('app.doctorAppointment', 'Записи ко мне') }}
                    </a>
                @elseif(auth()->user()->role==='admin')
                    <a class="navbar-brand" href="{{route('admin.user.index')}}">
                        {{ config('app.users', 'Пользователи') }}
                    </a>
                    <a class="navbar-brand" href="{{route('admin.doctor.index')}}">
                        {{ config('app.doctors', 'Врачи') }}
                    </a>
                    <a class="navbar-brand" href="{{route('admin.specialization.index')}}">
                        {{ config('app.specializations', 'Специализации') }}
                    </a>
                    <a class="navbar-brand" href="{{route('admin.schedule.index')}}">
                        {{ config('app.schedules', 'Расписание') }}
                    </a>
                @endif
            @endauth



                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- ТЕХНИЧЕСКАЯ ИНФА, УДАЛИТЬ ВПОСЛЕДСТВИИ --}}
                                    {{Auth::user()->role}} {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                                     {{-- <br> --}}
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            <div class="container">
                @yield('content')
            </div>
            {{-- @yield('content') --}}
        </main>
    </div>


    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2023 Company, Inc</p>
      </footer>
</body>


</html>
