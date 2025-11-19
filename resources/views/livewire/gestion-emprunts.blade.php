<div>



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
    
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm mt-5">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="mb-0 text-2xl">Ajouter un nouvel emprunt</h4>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form method="POST"  novalidate wire:submit='saveEmprunt' >
                            

                        <!-- Genre -->
                            <div class="mb-3">
                                <label for="bibliophile_id" class="form-label fw-semibold">
                                    Les bibliophiles <span class="text-danger">*</span>
                                </label>
                    <select name="bibliophile_id" id="bibliophile_id" 
                            class="form-select @error('bibliophile_id') is-invalid @enderror" 
                            required wire:model.defer='bibliophile_id'>
                            <option value="">Bibliophile</option>
                            @foreach ($bibliophiles as $bibliophile)
                                <option value="{{ $bibliophile->id }}">{{ $bibliophile->name }}</option>
                            @endforeach
                        

                    </select>

        @error('bibliophile_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

                        <!-- Genre -->
                            <div class="mb-3">
                                <label for="book_id" class="form-label fw-semibold">
                                    Les livres <span class="text-danger">*</span>
                                </label>
                    <select name="book_id" id="book_id" 
                            class="form-select @error('book_id') is-invalid @enderror" 
                            required wire:model.defer='book_id'>
                            <option value=""> Choisir le livre</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                    </select>

        @error('livre_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <!--Date de publication-->
                            <div class="mb-3">
                                <label for="borrow_date" class="form-label">{{ __('Date de l\'emprunt') }}</label>
                                <input id="borrow_date" type="date" class="form-control @error('borrow_date') is-invalid @enderror"
                                    name="borrow_date" value="{{ old('borrow_date') }}" required autofocus autocomplete="borrow_date" wire:model.defer='borrow_date' >

                                @error('borrow_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div><!--Date de publication-->
                            

                            @if (!$bibliophiles->isEmpty() && !$books->isEmpty()) 
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('Enregistrer cet emprunt') }}
                                    </button>
                                </div>
                            @endif


                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container w-100">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-12">
                    <div class="card shadow-sm mt-5">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <h4 class="mb-0 text-2xl">Les Emprunts</h4>
                        </div>

                        <ul class="list-group">
                            @foreach($borrowings as $borrowing)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $borrowing->bibliophile->name }}</strong><br>
                                        <small class="text-muted">{{ $borrowing->bibliophile->email }}</small>
                                    </div>
                                    <div class="text-end">
                                        <span class=" badge text-black   rounded px-8 py-2">{{ $borrowing->book->title }}</span>
                                    </div>
                                    <div class="text-end">
                                        @if($borrowing->returned)
                                            <span class="badge bg-blue-500 text-white rounded-pill py-2 px-4">
                                                Retourné
                                            </span>
                                        @else
                                            <span class="badge bg-danger text-white rounded-pill py-2 px-4">
                                                Non retourné
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-end gap-2">
                                        @if (!$borrowing->returned)
                                            <div class="flex align-items-center gap-3 ">
                                                <button class="" wire:click='confirmerRetour({{ $borrowing->id }})'>
                                                    <div class="gap-3 flex align-items-center py-2 px-2  border border-grey-200 rounded bg-green-800 ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                </svg>
                                                            
                                                        
                                                        
                                                        <p class="text-white text-xs">Confirmer Retour</p>
                                                    </div>
                                                </button> 
                                                


                                            
                                                

                                                {{-- <button class="" wire:click=''>
                                                    <div class="py-2 px-2  border border-grey-200 rounded bg-red-800 ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </div>
                                                </button>  --}}
                                                
                                            </div>
                                        @endif
                                        
                                    </div>

                                </li>
                            @endforeach
                        </ul>   
                    </div>
                </div>
            </div>
        {{ $borrowings->links() }}
    </div>
</div>
    

    
    
    

</div>