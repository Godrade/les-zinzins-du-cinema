<x-admin-layout title="Films">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Recherche</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('search.index') }}" method="GET">
                        <div class="form-group">
                            <label class="form-label">Titre du film</label>
                            <input type="text" class="form-control" name="name" placeholder="Titre du film">
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Rechercher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
