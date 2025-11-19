<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Bibliothèque Numérique du Bénin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
    @livewireStyles

</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
                <i class="bi bi-book-half fs-3"></i>
                BiblioGest
            </a>


            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="flex  justify-between" id="navbarNav w-full gap-4 ">
                
                <ul class="navbar-nav mx-auto w-full flex align-items-center">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users') ? 'active fw-bold' : '' }}"
                               href="{{ route('users') }}">
                                <i class="bi bi-speedometer2"></i> Membres
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('livres*') ? 'active fw-bold' : '' }}"
                               href="{{ route('livres') }}">
                                <i class="bi bi-bookshelf"></i> Livres
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('emprunts*') ? 'active fw-bold' : '' }}"
                               href="{{ route('emprunts') }}">
                                <i class="bi bi-journal-check"></i> Emprunts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('livres*') ? 'active fw-bold' : '' }}"
                               href="{{ route('genres') }}">
                                <i class=" text-2xl"></i> Genres
                            </a>
                        </li>
                        @can('viewAny', App\Models\User::class)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('users*') ? 'active fw-bold' : '' }}"
                               href="{{ route('users.index') }}">
                                <i class="bi bi-people"></i> Membres
                            </a>
                        </li>
                        @endcan
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-light btn-sm px-3 ms-2" href="{{ route('register') }}">
                                Inscription
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                               data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle fs-5"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <!-- 
                                <li>
                                    <a class="dropdown-item" >
                                        <i class="bi bi-person me-2"> </i> Mon profil
                                    </a>
                                </li> -->
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    {{-- @livewire('auth.Logout') --}}
                                    <livewire:auth.logout/>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    
    <main class="py-4">
        {{$slot}}
        {{-- @yield('content') --}}
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="bi bi-book-half"></i> BiblioGest</h5>
                    <p class="small mb-0">Système de gestion des emprunts de la bibliothèque<br>
                        &copy; {{ date('Y') }} - Tous droits réservés</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="small mb-1">Développé par Kawa Services</p>
                
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>