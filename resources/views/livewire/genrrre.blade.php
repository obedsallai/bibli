
<div class="row mb-4">
    {{-- <div class="col-md-12">
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">
            &larr; {{ __('Retour à la liste des genres') }}
        </a>
    </div> --}}

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


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm mt-5">
                    <div class="card-header   text-white text-center py-4">
                        <h4 class="mb-0 text-primary">{{ __('Ajouter un nouveau genre') }}</h4>
                    </dgenreiv>

                    <div class="card-body p-4 p-md-5">
                        <form method="POST"  novalidate wire:submit='saveGenre'>


                            <!--Nom du genre-->
                            <div class="mb-3">
                                <label for="name" class="form-label text-primary">{{ __('Nom') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus autocomplete="name" wire:model.defer='name'>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        
        
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Ajouter') }}
                                </button>
                            </div>
                        </form>
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
                    <h4 class="mb-0">{{ __('La liste des genres enregistres') }}</h4>
                </div>

                <ul class="list-group">
            @foreach($genres as $genre)

                <li class="list-group-item d-flex justify-content-between align-items-center">
            @if ($editingGenreId == $genre->id )

                <input type="text" wire:model.defer='genre_nom' class=" w-1/3 form-control @error('genre_nom') is-invalid @enderror" value="{{  $genre->name }}"  >
            @else
                <div>
                    <strong>{{ $genre->name }}</strong><br>
                </div>
            @endif
            

            <div class="text-end">
                <span class="badge bg-primary rounded-pill">{{ $genre->books?->count() }} livre </span>
            </div>

            <div class="flex flex-row gap-4 items-center">
            @if ($editingGenreId === $genre->id)
                <div class="py-2 px-2 border border-grey-400 rounded-lg bg-green-600">
                    <button wire:click='defineNewName'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-white">
                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                </svg>


                </button>
                
                </div>
                {{--  Bouton cancel --}}
                <div class="py-2 px-2 border border-grey-400 rounded-lg bg-green-600">
                    <button  wire:click='cancelGenre'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>

            @else
            <div class="py-2 px-2 border border-grey-400 rounded-lg bg-blue-600">
                <button wire:click='editGenre({{$genre->id}})'>
                    <div >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-white">
                    <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                    </svg>
                    </div>
                </button>

            </div>
                    
                
            @endif
                
            <div class="py-2 px-2 border border-grey-400 rounded-lg bg-red-600" >
                <button wire:click='deleteGenre({{ $genre->id }})' >
                
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
    {{ $genres->links() }}
</ul>
            </div>
        </div>
    </div>
</div>


</div>