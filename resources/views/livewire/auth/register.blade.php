
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm mt-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0">{{ __('Créer un compte') }}</h4>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('register') }}"  novalidate wire:submit='register'>
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

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password" wire:model.defer='password'>

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password" wire:model.defer='password_confirmation'> 
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('S\'inscrire') }}
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <p class="mb-0">
                                {{ __('Déjà un compte ?') }}
                                <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">
                                    {{ __('Se connecter') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

