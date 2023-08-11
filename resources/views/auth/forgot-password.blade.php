<x-auth-layout title="Mot de passe oublié">
    <div class="card my-5">
	@if (session('status'))
            <div class="alert alert-success mb-3" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form class="card-body" action="{{ route('password.email') }}" method="POST">
            @csrf
            <a href="#"><img src="{{ asset('assets/images/lzdc-logo-small.png') }}" width="100px" class="mb-4 img-fluid" alt="img"></a>
            <div class="d-flex justify-content-between align-items-end mb-4">
                <h3 class="mb-0"><b>Mot de passe oublié?</b></h3>
                <a href="{{ route('login') }}" class="link-primary">Se connecter</a>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
            </div>
            <p class="mt-4 text-sm">Si vous ne recevez pas d'e-mail, veuillez vérifier votre dossier de courrier indésirable.</p>
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary">Envoyer le lien de réinitialisation</button>
            </div>
        </form>
    </div>
</x-auth-layout>
