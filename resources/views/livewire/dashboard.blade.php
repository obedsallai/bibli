
    <div>
        {{-- Because she competes with no one, no one can compete with her. --}}
        {{-- resources/views/dashboard.blade.php --}}


        @if (session('success'))

       
            <div class="bg-green-800 border border-green-400 text-green-800 px-6 py-4 rounded-lg shadow-md felex items-center justify-between">

                <button type="button" onclick=" this.parentElement.remove()" class="text-green-600 hover:text-green-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <span class="text-white">{{ session('success') }}</span>
            </div>
            


    @endif


    <div class="row g-4">
        <!-- Titre + bienvenue -->
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">
                        <i class="bi bi-speedometer2 text-blue-700 text-2xl">
                        Tableau de bord</i>
                    </h2>
                    <p class="text-muted mb-0">Bienvenue, <strong>{{ auth()->user()->name }}</strong> !</p>
                </div>
                <div class="text-end">
                    <small class="text-muted">
                        {{ now()->translatedFormat('l d F Y') }}
                    </small>
                </div>
            </div>
        </div>

        <!-- Cartes rapides d'accès (les plus utilisées) -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('livres') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow-lg transition">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-bookshelf text-primary" style="font-size: 3.5rem;"></i>
                        <h4 class="mt-3 mb-1 text-dark">Livres</h4>
                        <p class="text-muted mb-0">Gérer le catalogue</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-4">
            <a href="{{ route('emprunts') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow-lg transition">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-journal-check text-success" style="font-size: 3.5rem;"></i>
                        <h4 class="mt-3 mb-1 text-dark">Emprunts</h4>
                        <p class="text-muted mb-0">Suivre les prêts & retours</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-4">
            <a href="{{ route('genres') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 hover-shadow-lg transition">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-tags-fill text-info" style="font-size: 3.5rem;"></i>
                        <h4 class="mt-3 mb-1 text-dark">Genres</h4>
                        <p class="text-muted mb-0">Catégories de livres</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Statistiques rapides (optionnel mais très apprécié) -->
        @if(auth()->user()->can('viewAny', App\Models\User::class) || true)
        <div class="col-12 mt-4">
            <div class="row g-4">
                
                    <div class="col-md-3">
                        <a href="{{ route('livres') }}"></a>
                            <div class="card border-0 bg-primary text-white shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-book fs-2 me-3"></i>
                                    <div>
                                        <h5 class="mb-0">{{ $livres->count()}}</h5>
                                        <small>Livres au total</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                

                <div class="col-md-3">
                    <a href="{{ route('emprunts') }}">
                        <div class="card border-0 bg-success text-white shadow-sm">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi bi-arrow-repeat fs-2 me-3"></i>
                                <div>
                                    <h5 class="mb-0">{{ $emprunts->where('returned_at', null)->count() }}</h5>
                                    <small>Emprunts en cours</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                </div>
                <div class="col-md-3">
                    <a href="{{ route('emprunts') }}">
                        <div class="card border-0 bg-warning text-white shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle fs-2 me-3"></i>
                            <div>
                                <h5 class="mb-0">{{ $emprunts->whereNull('return_date')->count() }}</h5>
                                <small>En retard</small>
                            </div>
                        </div>
                    </a>
                </div>

                    
                    
                </div>
                

                    <div class="col-md-3">
                        <a href="{{ route('users') }}"></a>
                            <div class="card border-0 bg-info text-white shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-people fs-2 me-3"></i>
                                    <div>
                                        <h5 class="mb-0">{{ \App\Models\User::count() }}</h5>
                                        <small>Membres inscrits</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                
                
            </div>
        </div>
        @endif

        <!-- Derniers emprunts (petite preview) -->
        <div class="col-12 mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0">
                        <i class="bi bi-clock-history text-primary"></i>
                        Derniers emprunts
                    </h5>
                </div>
                <div class="card-body">
                    {{-- @php
                        $recent = \App\Models\Emprunt:with(['user', 'livre'])
                                    ->latest()
                                    ->take(5)
                                    ->get();
                    @endphp --}}

                    {{-- @if($recent->count())
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Membre</th>
                                    <th>Livre</th>
                                    <th>Date emprunt</th>
                                    <th>À rendre le</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent as $emprunt)
                                <tr>
                                    <td>{{ $emprunt->user->name }}</td>
                                    <td>{{ $emprunt->livre->titre }}</td>
                                    <td>{{ $emprunt->borrowed_at->format('d/m/Y') }}</td>
                                    <td>{{ $emprunt->due_date->format('d/m/Y') }}</td>
                                    <td>
                                        @if($emprunt->returned_at)
                                            <span class="badge bg-success">Rendu</span>
                                        @elseif($emprunt->due_date->isPast())
                                            <span class="badge bg-danger">En retard</span>
                                        @else
                                            <span class="badge bg-warning text-dark">En cours</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <p class="text-muted text-center py-4">Aucun emprunt pour le moment.</p>
                    @endif --}}

                    <div class="text-end mt-3">
                        <a href="{{ route('emprunts') }}" class="btn btn-outline-primary btn-sm">
                            Voir tous les emprunts →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-shadow-lg {
            transition: all 0.3s ease;
        }
        .hover-shadow-lg:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        }
        .transition { transition: all 0.3s ease; }
    </style>

    </div>

