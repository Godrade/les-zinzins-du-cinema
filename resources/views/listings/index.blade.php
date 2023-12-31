<x-admin-layout title="Films">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Liste des listes</h5>
                    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#createListe">
                        Créer une liste
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th class="d-none d-md-table-cell">Description</th>
                                <th class="text-center">Nombre de films</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listings as $list)
                                <tr>
                                    <td><span class="badge" style="background-color: {{ $list->color }}">{{ $list->title }}</span></td>
                                    <td class="d-none d-md-table-cell">{{ $list->description }}</td>
                                    <td class="text-center">{{ $list->movies->count() }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('listings.show', $list) }}" class="btn btn-sm btn-primary">Voir</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createListe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer une liste de films</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="create" method="POST" action="{{ route('listings.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nom de la liste:</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Couleur:</label>
                            <input type="color" class="form-control" name="color" style="height: 50px">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" form="create" class="btn btn-primary">Créer</button>
                </div>
            </div>
        </div>
    </div>


</x-admin-layout>
