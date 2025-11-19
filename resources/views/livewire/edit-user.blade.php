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

    <center class="text-2xl text-grey-700"> Changer les informations du bibliophile </center>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm mt-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0 font-extrabold text-xl">{{ $name }} </h4>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="PUT"   novalidate wire:submit='updateBibliophile'>

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

                        <div class="flex align-items gap-3">

                            <div class="px-4 py-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <p>Modifier</p>
                                </button>
                            </div>
                            
                                <div class="px-4 py-2 ">
                                    <button  class="btn bg-red-600  btn-lg">
                                        <a href="{{  route('dashboard')}}"><p class="text-white">Annuler</p></a>
                                        
                                    </button>
                                </div>
                            
                        </div>
                        

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

