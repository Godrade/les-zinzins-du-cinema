<x-auth-layout title="Confirmer le mot de passe">
    <div class="card my-5">
        <form class="card-body" action="/user/confirm-password" method="POST">
            @csrf
            <div class="d-flex justify-content-center mb-4">
                <a href="#"><img src="{{ asset('assets/images/lzdc-logo-small.png') }}" width="100px" class="img-fluid" alt="img"></a>
            </div>
            <div class="mb-4">
                <h3 class="mb-2"><b>Confirmer le mot de passe</b></h3>
                <p class="text-muted">Entrez votre mot de passe.</p>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mot de passe">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Confirmer le mot de passe</button>
            </div>
        </form>
    </div>
</x-auth-layout>
