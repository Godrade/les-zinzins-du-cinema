<x-auth-layout title="Connexion">
    <div class="card my-5">
        <form class="card-body" action="{{ route("login") }}" method="POST">
            @csrf
            <div class="text-center m-b-50">
                <a href="#"><img src="{{ asset('assets/images/lzdc-logo-small.png') }}" alt="img" width="100px"></a>
            </div>
            <div class="form-group mb-3">
                <input required type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email">
            </div>
            <div class="form-group mb-3">
                <input required type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
            </div>
            <div class="d-flex mt-1 justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="remember" name="remember" checked="">
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>
                <a href="{{ route('password.email') }}" class="text-secondary f-w-400 mb-0">Mot de passe oublié?</a>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Connexion</button>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-4">
                <h6 class="f-w-500 mb-0">Vous n'avez pas de compte?</h6>
                <a href="{{ route('register') }}" class="link-primary">S'inscrire</a>
            </div>
        </form>
    </div>
</x-auth-layout>
