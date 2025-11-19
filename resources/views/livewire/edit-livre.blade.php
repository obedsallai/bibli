{{-- <div id="accueil" class="list-group-item d-flex justify-content-between align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm mt-5">
                    <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0">Editer : {{ $title }} </h4>
                    </div>
                    
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('livres') }}" novalidate wire:submit='saveBook' >
                            

                            <!--Titre -->
                            <div class="mb-3">
                                <label for="titre" class="form-label">{{ __('Titre') }}</label>
                                <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror"
                                    name="titre" value="{{ old('titre') }}" required autofocus autocomplete="titre" wire:model.defer='title'>

                                @error('titre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        <!--Auteur -->
                            <div class="mb-3">
                                <label for="auteur" class="form-label">{{ __('Auteur') }}</label>
                                <input id="auteur" type="text" class="form-control @error('auteur') is-invalid @enderror"
                                    name="auteur" value="{{ old('auteur') }}" required autofocus autocomplete="auteur" wire:model.defer='author'>

                                @error('auteur')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--Date de publication-->
                            <div class="mb-3">
                                <label for="publication_date" class="form-label">{{ __('Date de publication') }}</label>
                                <input id="publication_date" type="date" class="form-control @error('publication_date') is-invalid @enderror"
                                    name="publication_date" value="{{ old('publication_date') }}" required autofocus autocomplete="publication_date" wire:model.defer='publication_date' >

                                @error('publication_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        <!-- Genre -->
                            <div class="mb-3">
                                <label for="genre_id" class="form-label fw-semibold">
                                    Genre de livre <span class="text-danger">*</span>
                                </label>
                    <select name="genre_id" id="genre_id" 
                            class="form-select @error('genre_id') is-invalid @enderror" 
                            required wire:model.defer='genre_id'>
                            <option value=""> Choisir le genre</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        

                    </select>

        @error('livre_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <!--Copies -->
                            <div class="mb-3">
                                <label for="copies" class="form-label">{{ __(' Nombre de copies') }}</label>
                                <input id="copies" type="number" class="form-control @error('copies') is-invalid @enderror"
                                    name="copies" value="{{ old('copies') }}" required autofocus autocomplete="copies" wire:model.defer='available_copies'>

                                @error('copies')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            @if (count($genres) >0 )
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('Ajouter') }}
                                    </button>
                                </div>
                            @endif


                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> --}}

<div>
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
    <div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Modifier : {{ $title }}</h4>
                </div>

                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form wire:submit="updateBook">
                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" class="form-control" wire:model="title">
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Auteur</label>
                            <input type="text" class="form-control" wire:model="author">
                            @error('author') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Genre</label>
                            <select class="form-select" wire:model="genre_id">
                                <option value="">Choisir...</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                            @error('genre_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Copies disponibles</label>
                            <input type="number" class="form-control" wire:model="available_copies">
                        </div>

                        <div class="mb-3">
                            <label>Date de publication</label>
                            <input type="date" class="form-control" wire:model="publication_date">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Mettre à jour</button>
                            <a href="{{ route('livres') }}" class="btn btn-secondary" wire:navigate>
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
