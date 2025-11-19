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


@if ($genres->isEmpty())
    <div class="container">
<div >
    <button wire:click="addGenre">Ajouter un genre</button>
</div>
</div>
@endif






<div id="accueil" class="list-group-item d-flex justify-content-between align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm mt-5">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="mb-0 font-bold text-2xl">Ajouter un nouveau livre</h4>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 w-full">
            <div class="card shadow-sm mt-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0 text-xl font-bold">La liste des livres enregistres</h4>
                </div>

                <ul class="list-group">
    @foreach($livres as $livre)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="flex align-items-center justify-start gap-4">
                <div class="py-2 px-2 bg-grey-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                    <div>
                        <strong>{{ $livre->title }}</strong><br>
                        <small class="text-muted">{{ $livre->author }}</small>
                    </div>

            </div>
            
            <div class="text-end">
                <span class="badge bg-primary rounded-pill">{{ $livre->genre?->name }}</span>
            </div>
           
                <div class="flex items-center  justify-between gap-2">
                    @if ($editeBookId === $livre->id)
   
                        <button wire:click='defineNewName' class="py-2 px-2 rounded-lg bg-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-white">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                            </svg>

                        </button>   

                    @else
                    
                        
                        <button wire:click='moveToEditPage({{$livre->id}})' class="py-2 px-2 rounded-lg bg-blue-600" >
                        
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-white">
                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                            </svg>   
                        </button>

                        
                        
                        
                    @endif
                    
                    <div class="py-2 px-2 rounded-lg bg-red-600" >
                        <button wire:click='deleteBook({{ $livre->id }})' >
                        
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-white">
                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                                </svg>

                            </div>
                        </button>
                    </div>
                </div>
            
        </li>
    @endforeach
</ul>
            </div>
        </div>
    </div>
</div>





</div>