<div class="min-h-screen py-8 px-4">

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
    
    
    <div class=" row flex align-items-center justify-start">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm mt-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0">{{ __('Enregistrer un Bibliophile') }}</h4>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="POST"   novalidate wire:submit='saveBibliophile'>

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nom complet') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autofocus autocomplete="name" wire:model.defer='name'>

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="username" wire:model.defer='email'>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone number (optional) -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">{{ __('Numéro de téléphone') }} <small class="text-muted">(facultatif)</small></label>
                            <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                                   name="phone_number" value="{{ old('phone_number') }}" placeholder="+229 00 00 00 00" wire:model.defer='phone_number'>

                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('Enregistrer') }}
                            </button>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container w-full">
    <div class="row justify-content-center w-full">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm mt-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0">{{ __('Les Bibliophiles enregistres') }}</h4>
                </div>

                <ul class="list-group">
                    @foreach($bibliophiles as $bibliophile)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $bibliophile->name }}</strong><br>
                                <small class="text-muted">{{ $bibliophile->email }}</small>
                            </div>
                            <div class="text-end">

                                <span class="badge border text-black gap-3 flex align-items-center   border-grey-500 py-2 px-4 rounded">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-grey-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>

                                    {{ $bibliophile->phone_number }}
                                </span>
                            </div>

                            <div class="text-end rounded align-items-center flex px-3 py-2 gap-3">

                                

                                    <button class="bg-blue-700 py-2 px-2 border rounded items-center flex  " wire:click='moveToEditPage({{ $bibliophile->id }})'>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>

                                    </button>
                                    <button class="bg-red-700 px-2 py-2 rounded text-white" wire:click='deleteUser({{ $bibliophile->id }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>
                                    
                               

                                
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

    
</div>
</div>