{{-- resources/views/dashboard/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Tableau de bord - BiblioGest')

@section('content')
<div class="container py-4">
    <!-- Titre + Bienvenue -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-primary fw-bold">
            <i class="bi bi-speedometer2 me-2"></i>
            Tableau de bord
        </h1>
        <div class="text-muted">
            Bienvenue, <strong>{{ auth()->user()->name }}</strong>
            <span class="mx-2">|</span>
            {{ now('Africa/Porto-Novo')->translatedFormat('d F Y') }}
        </div>
    </div>

    <div class="row g-4">

        <!-- Carte : Livres total -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-start border-primary border-4 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 bg-primary bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-bookshelf text-primary fs-1"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1">{{ $totalLivres ?? 0 }}</h5>
                        <p class="mb-0 text-muted small">Livres au total</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('livres.index') }}" class="small text-primary fw-bold">
                        Voir tous → 
                    </a>
                </div>
            </div>
        </div>

        <!-- Carte : Emprunts en cours -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-start border-success border-4 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 bg-success bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-journal-check text-success fs-1"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1">{{ $empruntsEnCours ?? 0 }}</h5>
                        <p class="mb-0 text-muted small">Emprunts en cours</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('emprunts.index') }}" class="small text-success fw-bold">
                        Gérer les emprunts →
                    </a>
                </div>
            </div>
        </div>

        <!-- Carte : En retard (alerte rouge) -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-start border-danger border-4 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 bg-danger bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-exclamation-triangle-fill text-danger fs-1"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1">{{ $empruntsEnRetard ?? 0 }}</h5>
                        <p class="mb-0 text-muted small">Emprunts en retard</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    @if(($empruntsEnRetard ?? 0) > 0)
                        <a href="{{ route('emprunts.index') }}?filter=retard" class="small text-danger fw-bold">
                            Voir les retardataires →
                        </a>
                    @else
                        <span class="small text-success fw-bold">Aucun retard</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Carte : Livres disponibles -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-start border-info border-4 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 bg-info bg-opacity-10 rounded-3 p-3">
                        <i class="bi bi-check2-circle text-info fs-1"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1">{{ $livresDisponibles ?? 0 }}</h5>
                        <p class="mb-0 text-muted small">Livres disponibles</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{ route('livres.index') }}?disponible=1" class="small text-info fw-bold">
                        Voir les disponibles →
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Section raccourcis rapides -->
    <div class="mt-5">
        <h4 class="mb-3 text-primary">
            <i class="bi bi-lightning-charge me-2"></i>
            Actions rapides
        </h4>
        <div class="row g-3">
            <div class="col-md-4 col-lg-3">
                <a href="{{ route('livres.create') }}" class="btn btn-outline-primary w-100 py-3">
                    <i class="bi bi-plus-circle fs-4"></i><br>
                    Ajouter un livre
                </a>
            </div>
            <div class="col-md-4 col-lg-3">
                <a href="{{ route('emprunts.create') }}" class="btn btn-outline-success w-100 py-3">
                    <i class="bi bi-journal-plus fs-4"></i><br>
                    Nouvel emprunt
                </a>
            </div>
            <div class="col-md-4 col-lg-3">
                <a href="{{ route('emprunts.index') }}?status=returned_today" class="btn btn-outline-warning w-100 py-3">
                    <i class="bi bi-arrow-repeat fs-4"></i><br>
                    Retours du jour
                </a>
            </div>
        </div>
    </div>

    <!-- Derniers emprunts (optionnel) -->
    @if(isset($derniersEmprunts) && $derniersEmprunts->count())
    <div class="mt-5">
        <h4 class="mb-3 text-primary">
            <i class="bi bi-clock-history me-2"></i>
            Derniers emprunts
        </h4>
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Membre</th>
                                <th>Livre</th>
                                <th>Date emprunt</th>
                                <th>Date retour prévue</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($derniersEmprunts as $emprunt)
                            <tr>
                                <td>{{ $emprunt->membre->name }}</td>
                                <td>{{ $emprunt->livre->titre }}</td>
                                <td>{{ $emprunt->date_emprunt->format('d/m/Y') }}</td>
                                <td>{{ $emprunt->date_retour_prevee->format('d/m/Y') }}</td>
                                <td>
                                    @if($emprunt->date_retour_effective)
                                        <span class="badge bg-success">Retourné</span>
                                    @elseif($emprunt->date_retour_prevee->isPast())
                                        <span class="badge bg-danger">En retard</span>
                                    @else
                                        <span class="badge bg-warning">En cours</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection