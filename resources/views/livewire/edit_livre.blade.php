<div id="accueil" class="list-group-item d-flex justify-content-between align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm mt-5">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="mb-0">{{ __('Editer : ') }}</h4>
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

</div>