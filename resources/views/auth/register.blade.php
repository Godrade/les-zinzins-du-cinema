<x-auth-layout title="Inscription">

    <div class="card my-5">
        <form class="card-body" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="text-center m-b-50">
                <a href="#"><img src="{{ asset('assets/images/lzdc-logo-small.png') }}" alt="img" width="100px"></a>
            </div>

            <div class="form-group mb-3">
                <input required type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Pseudo">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input required type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre adresse email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input required type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Votre mot de passe">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input required type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirmer votre mot de passe">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="d-flex mt-1 justify-content-between">
                <div class="form-check">
                    <input class="form-check-input input-primary" required type="checkbox" id="customCheckc1" checked="">
                    <label class="form-check-label" for="customCheckc1">J'accepte les <a href="#" class="text-primary">Conditions générales</a></label>
                </div>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-4">
                <h6 class="f-w-500 mb-0">Vous avez déjà un compte?</h6>
                <a href="{{ route('login') }}" class="link-primary">Se connecter</a>
            </div>

        </form>
    </div>

</x-auth-layout>
