
<div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm mt-5">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h4 class="mb-0 text-2xl font-bold">Connexion</h4>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="POST"  novalidate wire:submit="login">

                        <!--Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus autocomplete="email" wire:model.defer="email">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password" wire:model.defer="password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('Se connecter') }}
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
                    <div >
                        <a href="{{ route('password.request') }}" class="text-blue-700"> Mot de passe oublie ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>