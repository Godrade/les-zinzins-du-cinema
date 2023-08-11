<x-auth-layout title="Reinitialiser le mot de passe">
    <div class="card my-5">
        <form class="card-body" action="{{route('password.reset')}}" method="POST">
            @csrf
            <a href="#"><img src="{{ asset('assets/images/lzdc-logo-small.png') }}" width="100px" class="mb-4 img-fluid" alt="img"></a>
            <div class="mb-4">
                <h3 class="mb-2"><b>Reinitialiser le mot de passe</b></h3>
                <p class="text-muted">Entrez votre nouveau mot de passe ci-dessous.</p>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe">
            </div>

            <input type="hidden" name="token" value="{{ request('token') }}">
            <input type="hidden" name="email" value="{{ request('email') }}">

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Reinitialiser le mot de passe</button>
            </div>
        </form>
    </div>
</x-auth-layout>
